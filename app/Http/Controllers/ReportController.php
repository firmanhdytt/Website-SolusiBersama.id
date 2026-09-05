<?php

namespace App\Http\Controllers;

use App\Exports\BusinessReportExport;
use App\Models\Order;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        /* =========================
           PERIODE
        ========================= */
        $from = $request->from
            ? Carbon::parse($request->from)->startOfDay()
            : now()->startOfMonth();

        $to = $request->to
            ? Carbon::parse($request->to)->endOfDay()
            : now()->endOfMonth();

        /* =========================
           DATA UTAMA
        ========================= */

        // Orders
        $orders = Order::with('payments')
            ->whereBetween('created_at', [$from, $to])
            ->orderByDesc('created_at')
            ->get();

        // Payments
        $payments = Payment::with('order')
            ->whereBetween('paid_at', [$from, $to])
            ->orderByDesc('paid_at')
            ->get();

        /* =========================
           KPI UTAMA
        ========================= */

        $totalTransactions = $payments->count();
        $totalRevenue      = (int) $payments->sum('amount');

        $lunasOrdersCount = $orders
            ->where('status_pembayaran', 'lunas')
            ->count();

        // Klien unik
        $uniqueClients = $payments
            ->pluck('order.email')
            ->filter()
            ->unique()
            ->count();

        /* =========================
           PIUTANG
        ========================= */

        $unpaidOrders = $orders->filter(
            fn ($o) => $o->remainingPayment() > 0
        );

        $totalPiutang = (int) $unpaidOrders->sum(
            fn ($o) => $o->remainingPayment()
        );

        $piutangDetail = $unpaidOrders->map(function ($o) {
            $deadline = $o->deadline ? Carbon::parse($o->deadline) : null;

            $lateDays = $deadline && now()->gt($deadline)
                ? $deadline->diffInDays(now())
                : 0;

            return [
                'nama'    => $o->nama,
                'email'   => $o->email,
                'layanan' => $o->layanan,
                'sisa'    => (int) $o->remainingPayment(),
                'hari'    => (int) $lateDays,
            ];
        });

        /* =========================
           PERBANDINGAN PENDAPATAN
           (vs periode sebelumnya)
        ========================= */

        $rangeDays = $from->diffInDays($to) + 1;

        $prevFrom = $from->copy()->subDays($rangeDays);
        $prevTo   = $from->copy()->subDay();

        $prevRevenue = Payment::whereBetween('paid_at', [$prevFrom, $prevTo])
            ->sum('amount');

        $revenueChange = null;
        if ($prevRevenue > 0) {
            $revenueChange = round(
                (($totalRevenue - $prevRevenue) / $prevRevenue) * 100,
                1
            );
        }

        /* =========================
           TRANSAKSI PER LAYANAN
        ========================= */

        $serviceSummary = $payments
            ->groupBy(fn ($p) => $p->order?->layanan ?? 'Lainnya')
            ->map(fn ($row, $layanan) => [
                'layanan' => $layanan,
                'total'   => (int) $row->sum('amount'),
            ])
            ->sortByDesc('total')
            ->values();

        /* =========================
           KLIEN TERATAS
        ========================= */

        $topClients = $payments
            ->groupBy(fn ($p) => $p->order?->email ?? '-')
            ->map(function ($row) {
                return [
                    'nama'  => $row->first()->order?->nama ?? '-',
                    'total' => (int) $row->sum('amount'),
                ];
            })
            ->sortByDesc('total')
            ->take(5)
            ->values();

        /* =========================
           RETURN VIEW
        ========================= */

        return view('dashboard.reports.index', compact(
            'orders',
            'payments',

            // KPI
            'uniqueClients',
            'totalTransactions',
            'lunasOrdersCount',
            'totalRevenue',
            'revenueChange',
            'totalPiutang',

            // detail
            'piutangDetail',
            'serviceSummary',
            'topClients'
        ));
    }

    /* =========================
       EXPORT EXCEL
    ========================= */
    public function exportExcel(Request $request)
    {
        $from = $request->from
            ? Carbon::parse($request->from)->startOfDay()
            : now()->startOfMonth();

        $to = $request->to
            ? Carbon::parse($request->to)->endOfDay()
            : now()->endOfMonth();

        return Excel::download(
            new BusinessReportExport($from, $to),
            'Laporan-Bisnis-' . $from->format('d-m-Y') . '.xlsx'
        );
    }
}
