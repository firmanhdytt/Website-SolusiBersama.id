<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /* =====================================================
       LANDING PAGE - KIRIM PESANAN
    ===================================================== */
    public function send(Request $request)
    {
        $validated = $request->validate([
            'order-name'         => 'required|string|max:255',
            'order-email'        => 'required|email|max:255',
            'order-phone'        => 'required|string|max:30',
            'order-service'      => 'required|string|max:255',
            'order-requirements' => 'required|string',
            'order-budget'       => 'required|string|max:100',
            'order-deadline'     => 'required|date',
        ]);

        // Bersihkan string budget (hilangkan 'Rp', titik, koma, spasi)
        $rawBudget = preg_replace('/[^0-9]/', '', $validated['order-budget']);
        $budget = $rawBudget !== '' ? (int) $rawBudget : 0;

        $order = Order::create([
            'nama'              => $validated['order-name'],
            'email'             => $validated['order-email'],
            'telepon'           => $validated['order-phone'],
            'layanan'           => $validated['order-service'],
            'pesan'             => $validated['order-requirements'],
            'budget'            => $budget,
            'deadline'          => $validated['order-deadline'],
            'status'            => 'pending',
            'status_pembayaran' => 'belum',
        ]);

        // Kirim email notifikasi ke admin
        try {
            Mail::to("firmanhidayat1780@gmail.com")->send(new OrderMail($order));
        } catch (\Exception $e) {
            Log::error("Email order gagal dikirim: " . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Pesanan berhasil dikirim',
        ]);
    }

    /* =====================================================
       DASHBOARD ADMIN
    ===================================================== */

    // LIST PESANAN
    public function index()
    {
        $orders = Order::latest()->get();
        return view('dashboard.orders.index', compact('orders'));
    }

    // DETAIL PESANAN
    public function show(Order $order)
    {
        return view('dashboard.orders.show', compact('order'));
    }

    /* =====================================================
       UPDATE STATUS PESANAN (AJAX)
    ===================================================== */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,proses,selesai,batal',
        ]);

        // Jika status sama, tidak perlu update
        if ($order->status === $request->status) {
            return response()->json([
                'success' => true,
                'message' => 'Status tidak berubah',
                'status'  => ucfirst($order->status),
            ]);
        }

        $order->update([
            'status' => $request->status,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Status pesanan berhasil diperbarui',
            'status'  => ucfirst($order->status),
        ]);
    }

    /* =====================================================
       UPDATE STATUS PEMBAYARAN ORDER (AJAX)
    ===================================================== */
    public function updatePayment(Request $request, Order $order)
    {
        $request->validate([
            'status_pembayaran' => 'required|in:belum,dp,lunas',
        ]);

        $order->update([
            'status_pembayaran' => $request->status_pembayaran,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Status pembayaran berhasil diperbarui',
            'status_pembayaran' => ucfirst($order->status_pembayaran),
        ]);
    }

    /* =====================================================
       UPDATE DEADLINE ORDER (AJAX)
    ===================================================== */
    public function updateDeadline(Request $request, Order $order)
    {
        $request->validate([
            'deadline' => 'required|date',
        ]);

        $order->update([
            'deadline' => $request->deadline,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Tenggat waktu berhasil diperbarui',
            'deadline' => \Carbon\Carbon::parse($order->deadline)->translatedFormat('d F Y'),
        ]);
    }
}
