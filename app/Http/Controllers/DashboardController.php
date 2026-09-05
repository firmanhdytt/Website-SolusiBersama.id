<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $today = Carbon::today();

        /* =========================
           KPI UTAMA
        ========================= */

        $todayOrders = Order::whereDate('created_at', $today)->count();

        $activeOrders = Order::whereIn('status', ['pending', 'proses'])->count();

        $totalTransactions = Payment::count();

        $lunasOrdersCount = Order::where('status_pembayaran', 'lunas')->count();

        $monthlyRevenue = Payment::whereBetween('paid_at', [
            now()->startOfMonth(),
            now()->endOfMonth()
        ])->sum('amount');

        /* =========================
           PIUTANG
        ========================= */

        $ordersWithPiutang = Order::whereIn('status_pembayaran', ['belum', 'dp'])->get();

        $totalPiutang = $ordersWithPiutang->sum(
            fn ($o) => $o->remainingPayment()
        );

        /* =========================
           KPI MASALAH
        ========================= */

        $lateOrders = Order::whereIn('status', ['pending', 'proses'])
            ->whereNotNull('deadline')
            ->whereDate('deadline', '<', now())
            ->count();

        $nearDeadlineOrders = Order::whereIn('status', ['pending', 'proses'])
            ->whereNotNull('deadline')
            ->whereBetween('deadline', [now(), now()->addDays(3)])
            ->count();

        /* =========================
           URGENT ORDERS (LIST)
        ========================= */

        $urgentOrders = Order::whereIn('status', ['pending', 'proses'])
            ->whereNotNull('deadline')
            ->whereDate('deadline', '<=', now()->addDays(3))
            ->orderBy('deadline')
            ->limit(5)
            ->get()
            ->map(function ($o) {
                $deadline = Carbon::parse($o->deadline)->startOfDay();
                $today    = now()->startOfDay();

                $o->late_days = $today->gt($deadline)
                    ? $deadline->diffInDays($today)
                    : 0;

                return $o;
            });

        /* =========================
           LIST DATA
        ========================= */

        $recentOrders = Order::latest()
            ->select('id', 'nama', 'layanan')
            ->limit(5)
            ->get();

        $activeProjects = Order::whereIn('status', ['pending', 'proses'])
            ->select('id', 'nama', 'layanan', 'status', 'deadline')
            ->orderBy('deadline')
            ->limit(5)
            ->get();

        /* =========================
           GRAFIK LINE
        ========================= */

        $chartLine = Payment::selectRaw('DATE(paid_at) as date, SUM(amount) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $pieData = Payment::selectRaw('orders.layanan, SUM(payments.amount) as total')
    ->join('orders', 'orders.id', '=', 'payments.order_id')
    ->groupBy('orders.layanan')
    ->get();

$pieLabels = $pieData->pluck('layanan');
$pieValues = $pieData->pluck('total');


        /* =========================
           RETURN VIEW
        ========================= */

        return view('dashboard.index', compact(
    'user',
    'todayOrders',
    'activeOrders',
    'lateOrders',
    'nearDeadlineOrders',
    'totalTransactions',
    'lunasOrdersCount',
    'monthlyRevenue',
    'totalPiutang',
    'urgentOrders',
    'recentOrders',
    'activeProjects',
    'chartLine',
    'pieLabels',
    'pieValues'
));

    }
}
