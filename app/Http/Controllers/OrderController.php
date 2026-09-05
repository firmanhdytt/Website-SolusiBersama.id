<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /* =====================================================
       LANDING PAGE - KIRIM PESANAN
    ===================================================== */
    public function send(Request $request)
    {
        $validated = $request->validate([
            'order-name'         => 'required|string|max:255',
            'order-email'        => 'required|email',
            'order-phone'        => 'required|string|max:30',
            'order-service'      => 'required|string|max:255',
            'order-requirements' => 'required|string',
            'order-budget'       => 'required|string|max:100',
            'order-deadline'     => 'required|date',
        ]);

        Order::create([
            'nama'              => $validated['order-name'],
            'email'             => $validated['order-email'],
            'telepon'           => $validated['order-phone'],
            'layanan'           => $validated['order-service'],
            'pesan'             => $validated['order-requirements'],
            'budget'            => (int) $validated['order-budget'],
            'deadline'          => $validated['order-deadline'],
            'status'            => 'pending',
            'status_pembayaran' => 'belum',
        ]);

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

}
