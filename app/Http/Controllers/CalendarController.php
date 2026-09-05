<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;

class CalendarController extends Controller
{
    /**
     * Halaman Timeline
     */
    public function timeline()
    {
        $total = Order::whereNotNull('deadline')->count();

        $ongoing = Order::whereNotNull('deadline')
            ->whereIn('status', ['pending', 'proses'])
            ->count();

        $done = Order::where('status', 'selesai')->count();

        $deadlineDekat = Order::whereNotNull('deadline')
            ->where('status', '!=', 'selesai')
            ->whereDate('deadline', '<=', Carbon::now()->addDays(3))
            ->count();

        $today = Carbon::today();

        $timelineList = Order::whereNotNull('deadline')
            ->orderByRaw("
            CASE
                WHEN status = 'selesai' THEN 3
                WHEN deadline < ? THEN 2
                ELSE 1
            END
        ", [$today])
            ->orderBy('deadline', 'asc')
            ->get();

        return view('dashboard.calendar.timeline', compact(
            'total',
            'ongoing',
            'deadlineDekat',
            'done',
            'timelineList'
        ));
    }

    /**
     * Ambil data orders untuk kalender
     */
    public function events()
    {
        $orders = Order::whereNotNull('deadline')->get();

        $events = $orders->map(function ($order) {

            $color = match ($order->status) {
                'pending' => '#facc15',
                'proses' => '#2563eb',
                'selesai' => '#16a34a',
                'batal' => '#dc2626',
                default => '#6b7280',
            };

            return [
                'title' => $order->layanan ?? $order->service ?? 'Pesanan',
                'start' => $order->deadline,
                'backgroundColor' => $color,
                'borderColor' => $color,

                'extendedProps' => [
                    'client' => $order->nama ?? $order->name ?? '-',
                    'status' => $order->status,
                    'deadline' => $order->deadline,
                    'progress' => match ($order->status) {
                        'pending' => 20,
                        'proses' => 60,
                        'selesai' => 100,
                        default => 0,
                    },
                ],
            ];
        });

        return response()->json($events);
    }
}
