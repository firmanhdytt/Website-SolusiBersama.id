<?php

namespace App\Http\Controllers;

class ClientController extends Controller
{
    public function index()
    {
        $clients = \DB::table('orders')
            ->select(
                'email',
                \DB::raw('MAX(nama) as nama'),
                \DB::raw('MAX(telepon) as telepon'),
                \DB::raw('COUNT(*) as total_orders'),
                \DB::raw("SUM(status IN ('pending','proses')) as active_orders"),
                \DB::raw('MIN(deadline) as nearest_deadline')
            )
            ->groupBy('email') // ⬅️ KUNCI UTAMA (ANTI DOBEL)
            ->orderBy('nearest_deadline')
            ->get();

        return view('dashboard.clients.index', compact('clients'));
    }

    public function show($email)
    {
        $orders = \DB::table('orders')
            ->where('email', $email)
            ->orderByDesc('created_at')
            ->get();

        abort_if($orders->isEmpty(), 404);

        $client = (object) [
            'nama' => $orders->first()->nama,
            'email' => $email,
            'telepon' => $orders->first()->telepon,

            'total_orders' => $orders->count(),
            'active_orders' => $orders->whereIn('status', ['pending', 'proses'])->count(),
            'done_orders' => $orders->where('status', 'selesai')->count(),
            'cancelled_orders' => $orders->where('status', 'batal')->count(),
        ];

        return view('dashboard.clients.show', compact('client', 'orders'));
    }
}
