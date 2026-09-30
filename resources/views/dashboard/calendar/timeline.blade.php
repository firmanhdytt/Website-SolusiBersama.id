@extends('layouts.dashboard')
@section('title', 'Timeline & Kalender Proyek')

@section('content')

<div class="space-y-8" x-data="{ modalOpen: false, modalTitle: '', modalClient: '', modalDeadline: '', modalStatus: '', modalProgress: 0 }">

    <!-- HEADER & METRICS BAR -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Timeline & Kalender Proyek</h2>
            <p class="text-xs text-slate-500 mt-1">Jadwal tenggat waktu (deadline), progress pengerjaan, dan calendar pengerjaan proyek</p>
        </div>
    </div>

    <!-- STATS CARDS -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Proyek</p>
                <p class="text-2xl font-extrabold text-slate-900 mt-1">{{ $total }}</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center">
                <span class="material-symbols-outlined text-[20px]">calendar_view_month</span>
            </div>
        </div>

        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Sedang Proses</p>
                <p class="text-2xl font-extrabold text-sky-600 mt-1">{{ $ongoing }}</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center">
                <span class="material-symbols-outlined text-[20px]">sync</span>
            </div>
        </div>

        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Deadline Dekat</p>
                <p class="text-2xl font-extrabold text-amber-600 mt-1">{{ $deadlineDekat }}</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                <span class="material-symbols-outlined text-[20px]">alarm</span>
            </div>
        </div>

        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Selesai</p>
                <p class="text-2xl font-extrabold text-emerald-600 mt-1">{{ $done }}</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <span class="material-symbols-outlined text-[20px]">task_alt</span>
            </div>
        </div>
    </div>

    <!-- FULLCALENDAR BOARD -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm space-y-4">
        <!-- CDN FULLCALENDAR -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css">
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>

        <style>
            .fc .fc-toolbar-title { font-size: 16px !important; font-weight: 800; color: #0f172a; }
            .fc .fc-button-primary { background-color: #4f46e5 !important; border-color: #4f46e5 !important; font-size: 12px; font-weight: 700; border-radius: 10px !important; }
            .fc .fc-day-today { background-color: #eef2ff !important; }
            .fc-daygrid-event { border-radius: 8px !important; padding: 2px 4px !important; font-size: 11px !important; font-weight: 700; }
        </style>

        <div id="project-calendar"></div>
    </div>

    <!-- DEADLINE MATRIX LIST -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm space-y-4">
        <h3 class="font-bold text-base text-slate-900 border-b border-slate-100 pb-3">Daftar Urutan Deadline Proyek</h3>

        <div class="divide-y divide-slate-100">
            @forelse ($timelineList as $item)
                @php
                    $deadline = \Carbon\Carbon::parse($item->deadline);
                    $isLate = $deadline->isPast() && $item->status !== 'selesai';
                    $isNear = !$isLate && $deadline->diffInDays(now()) <= 3;

                    $statusClass = match ($item->status) {
                        'pending' => 'bg-amber-50 text-amber-700 border-amber-200',
                        'proses' => 'bg-sky-50 text-sky-700 border-sky-200',
                        'selesai' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                        default => 'bg-slate-50 text-slate-700 border-slate-200',
                    };
                @endphp

                <div class="py-4 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center font-bold text-xs {{ $isLate ? 'bg-rose-100 text-rose-700' : ($isNear ? 'bg-amber-100 text-amber-700' : 'bg-brand-50 text-brand-700') }}">
                            <span class="material-symbols-outlined text-[20px]">{{ $isLate ? 'warning' : 'calendar_today' }}</span>
                        </div>
                        <div>
                            <p class="font-bold text-slate-900 text-sm">{{ $item->layanan }}</p>
                            <p class="text-xs text-slate-500">Klien: {{ $item->nama }} ({{ $item->email }})</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-6">
                        <div class="text-xs text-right">
                            <span class="text-slate-400 block text-[10px]">Tenggat Waktu</span>
                            <span class="font-bold {{ $isLate ? 'text-rose-600' : ($isNear ? 'text-amber-600' : 'text-slate-800') }}">
                                {{ $deadline->translatedFormat('d F Y') }}
                            </span>
                        </div>

                        <span class="px-3 py-1 rounded-full border text-xs font-bold {{ $statusClass }}">
                            {{ ucfirst($item->status) }}
                        </span>

                        <a href="{{ route('orders.show', $item->id) }}" class="px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs transition">
                            Detail
                        </a>
                    </div>
                </div>
            @empty
                <div class="py-8 text-center text-slate-400">
                    <span class="material-symbols-outlined text-[36px] block mb-1">event_available</span>
                    <p class="text-xs">Belum ada proyek dengan jadwal deadline</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- MODAL DETAIL EVENT KALENDER -->
    <div x-show="modalOpen" 
         @click.away="modalOpen = false"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm" x-cloak>
        <div class="bg-white rounded-2xl shadow-2xl p-6 max-w-md w-full space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h4 class="font-bold text-sm text-slate-900">Detail Jadwal Proyek</h4>
                <button @click="modalOpen = false" class="text-slate-400 hover:text-slate-700">&times;</button>
            </div>

            <div class="space-y-3 text-xs">
                <div>
                    <span class="text-slate-400 font-bold block text-[10px]">NAMA PROYEK</span>
                    <span x-text="modalTitle" class="font-bold text-sm text-slate-900"></span>
                </div>

                <div>
                    <span class="text-slate-400 font-bold block text-[10px]">KLIEN PEMESAN</span>
                    <span x-text="modalClient" class="font-semibold text-slate-800"></span>
                </div>

                <div>
                    <span class="text-slate-400 font-bold block text-[10px]">DEADLINE TARGET</span>
                    <span x-text="modalDeadline" class="font-bold text-brand-600"></span>
                </div>

                <div>
                    <span class="text-slate-400 font-bold block text-[10px] mb-1">ESTIMASI PROGRESS</span>
                    <div class="w-full bg-slate-100 rounded-full h-2">
                        <div class="bg-brand-600 h-2 rounded-full transition-all duration-300" :style="'width: ' + modalProgress + '%'"></div>
                    </div>
                </div>

                <div>
                    <span class="text-slate-400 font-bold block text-[10px]">STATUS</span>
                    <span x-text="modalStatus" class="inline-block px-2.5 py-0.5 rounded-full bg-brand-50 text-brand-700 font-bold text-[11px] uppercase"></span>
                </div>
            </div>

            <div class="flex justify-end pt-2 border-t border-slate-100">
                <button @click="modalOpen = false" class="px-4 py-2 rounded-xl bg-slate-100 text-slate-700 font-bold text-xs hover:bg-slate-200">Tutup</button>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('project-calendar');

        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'id',
            height: 'auto',
            dayMaxEvents: 3,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: ''
            },
            events: {
                url: "{{ route('calendar.events') }}",
                method: 'GET',
            },
            eventClick: function (info) {
                const event = info.event;
                const root = document.querySelector('[x-data]');
                
                if (root && root.__x) {
                    const data = root.__x.$data;
                    data.modalTitle = event.title;
                    data.modalClient = event.extendedProps.client ?? '-';
                    data.modalDeadline = formatDate(event.start);
                    data.modalProgress = event.extendedProps.progress ?? 0;
                    data.modalStatus = event.extendedProps.status ?? '-';
                    data.modalOpen = true;
                }
            }
        });

        calendar.render();
    });

    function formatDate(date) {
        return new Intl.DateTimeFormat('id-ID', {
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        }).format(date);
    }
</script>
@endpush