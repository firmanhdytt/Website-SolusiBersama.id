<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function index()
    {
        $orders = Order::with('payments')->latest()->get();
        return view('dashboard.payments.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('payments');
        return view('dashboard.payments.show', compact('order'));
    }

    /**
     * ===============================
     * STORE PAYMENT (AJAX)
     * ===============================
     */
    public function store(Request $request, Order $order)
    {
        // ❗ WAJIB AJAX
        if (!$request->ajax()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid request'
            ], 400);
        }

        // ❌ SUDAH LUNAS
        if ($order->paymentStatus() === 'lunas') {
            return response()->json([
                'success' => false,
                'message' => 'Pembayaran sudah lunas.'
            ], 422);
        }

        $validator = Validator::make($request->all(), [
            'method' => 'required|in:transfer,cash,qris,ewallet',
            'amount' => 'required|numeric|min:1',
            'proof'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        $remaining = $order->remainingPayment();

        // ❌ NOMINAL KELEBIHAN
        if ($request->amount > $remaining) {
            return response()->json([
                'success' => false,
                'message' => 'Nominal melebihi sisa tagihan.'
            ], 422);
        }

        // UPLOAD BUKTI
        $filename = null;
        if ($request->hasFile('proof')) {
            $file = $request->file('proof');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/payments'), $filename);
        }

        // SIMPAN PAYMENT
        $payment = Payment::create([
            'order_id' => $order->id,
            'method'   => $request->input('method'),
            'amount'   => (int) $request->input('amount'),
            'proof'    => $filename,
            'paid_at'  => now(),
        ]);

        // UPDATE STATUS ORDER
        if ($order->remainingPayment() <= 0) {
            $order->update(['status_pembayaran' => 'lunas']);
        } else {
            $order->update(['status_pembayaran' => 'dp']);
        }

        // RELOAD RELASI TERBARU
        $order->load('payments');

        return response()->json([
            'success' => true,
            'message' => 'Pembayaran berhasil disimpan.',
            'data' => [
                'total_paid' => $order->totalPaid(),
                'remaining'  => $order->remainingPayment(),
                'status'     => $order->status_pembayaran,
                'payment'    => [
                    'amount' => number_format($payment->amount, 0, ',', '.'),
                    'method' => strtoupper($payment->method),
                    'date'   => $payment->paid_at->translatedFormat('d F Y H:i'),
                    'proof'  => $payment->proof
                        ? asset('uploads/payments/' . $payment->proof)
                        : null
                ]
            ]
        ]);
    }

    /**
     * ===============================
     * EXPORT ALL PAYMENTS (REKAP ORDER)
     * ===============================
     */
    public function export()
    {
        $orders = Order::with('payments')->latest()->get();

        $pdf = Pdf::loadView('dashboard.payments.export', compact('orders'))
            ->setPaper('A4', 'landscape');

        return $pdf->download(
            'laporan-pembayaran-' . now()->format('Y-m-d_H-i') . '.pdf'
        );
    }

    /**
     * ===============================
     * EXPORT DETAIL PAYMENT
     * ===============================
     */
    public function exportDetail(Order $order)
    {
        $order->load('payments');

        $pdf = Pdf::loadView('dashboard.payments.export-detail', compact('order'))
            ->setPaper('A4', 'portrait');

        return $pdf->download(
            'pembayaran-' . str_replace(' ', '-', strtolower($order->nama)) . '.pdf'
        );
    }
}
