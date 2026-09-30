@extends('layouts.dashboard')
@section('title', 'Beranda Dashboard')

@section('content')

<div class="space-y-8">

    <!-- HERO WELCOME BANNER -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-blue-900 via-brand-700 to-blue-800 p-6 sm:p-8 text-white shadow-xl shadow-brand-900/10">
        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-white/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-2">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-xs font-semibold">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Ringkasan Kondisi Bisnis Realtime</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                    Selamat Datang, {{ $user->name ?? 'Admin' }} 👋
                </h1>
                <p class="text-sm text-blue-100/90 max-w-xl">
                    Pantau kinerja pendapatan, status proyek, dan piutang pelanggan secara efisien hari ini — {{ now()->translatedFormat('l, d F Y') }}
                </p>
            </div>

            <div class="flex items-center gap-3 shrink-0">
                <a href="{{ route('payments.index') }}" class="px-4 py-2.5 rounded-xl bg-white text-brand-700 font-bold text-xs hover:bg-slate-100 transition shadow-lg flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">add_card</span>
                    <span>Catat Pembayaran</span>
                </a>
                <a href="{{ route('reports.index') }}" class="px-4 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/20 text-white font-bold text-xs transition flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">download</span>
                    <span>Laporan</span>
                </a>
            </div>
        </div>
    </div>

    <!-- 4 HERO KPI METRIC CARDS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

        <!-- 1. PENDAPATAN BULAN INI -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Pendapatan Bulan Ini</span>
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <span class="material-symbols-outlined text-[22px]">payments</span>
                </div>
            </div>
            <h3 class="text-2xl font-extrabold text-slate-900 tracking-tight">
                Rp {{ number_format($monthlyRevenue, 0, ',', '.') }}
            </h3>
            <div class="mt-3 flex items-center gap-1.5 text-xs text-emerald-600 font-bold">
                <span class="material-symbols-outlined text-[16px]">trending_up</span>
                <span>Transaksi Terverifikasi</span>
            </div>
        </div>

        <!-- 2. PESANAN AKTIF -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Pesanan Aktif</span>
                <div class="w-10 h-10 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center">
                    <span class="material-symbols-outlined text-[22px]">pending_actions</span>
                </div>
            </div>
            <h3 class="text-2xl font-extrabold text-slate-900 tracking-tight">
                {{ $activeOrders }} <span class="text-xs font-normal text-slate-400">proyek</span>
            </h3>
            <div class="mt-3 flex items-center gap-1.5 text-xs text-sky-600 font-bold">
                <span class="material-symbols-outlined text-[16px]">sync</span>
                <span>Dalam Pengerjaan</span>
            </div>
        </div>

        <!-- 3. TOTAL PIUTANG -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Piutang</span>
                <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center">
                    <span class="material-symbols-outlined text-[22px]">error_med</span>
                </div>
            </div>
            <h3 class="text-2xl font-extrabold text-rose-600 tracking-tight">
                Rp {{ number_format($totalPiutang, 0, ',', '.') }}
            </h3>
            <div class="mt-3 flex items-center gap-1.5 text-xs text-rose-600 font-bold">
                <span class="material-symbols-outlined text-[16px]">warning</span>
                <span>Belum Dilunasi Klien</span>
            </div>
        </div>

        <!-- 4. ORDER LUNAS -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Order Lunas</span>
                <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                    <span class="material-symbols-outlined text-[22px]">task_alt</span>
                </div>
            </div>
            <h3 class="text-2xl font-extrabold text-slate-900 tracking-tight">
                {{ $lunasOrdersCount }} <span class="text-xs font-normal text-slate-400">order</span>
            </h3>
            <div class="mt-3 flex items-center gap-1.5 text-xs text-indigo-600 font-bold">
                <span class="material-symbols-outlined text-[16px]">check_circle</span>
                <span>Pembayaran Selesai</span>
            </div>
        </div>

    </div>

    <!-- ALERT BARS FOR URGENT ORDERS -->
    @if($urgentOrders->count())
        <div class="rounded-2xl bg-amber-50/80 border border-amber-200/80 p-5 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-amber-600 text-[22px]">campaign</span>
                    <h3 class="font-bold text-sm text-amber-950">Perlu Perhatian Segera (Tenggat Mendesak)</h3>
                </div>
                <a href="{{ route('calendar.timeline') }}" class="text-xs font-bold text-amber-700 hover:text-amber-900">Lihat Timeline →</a>
            </div>

            <div class="space-y-2">
                @foreach($urgentOrders as $u)
                    @php
                        $deadline = \Carbon\Carbon::parse($u->deadline)->startOfDay();
                        $today = now()->startOfDay();
                        $lateDays = $today->gt($deadline) ? $deadline->diffInDays($today) : 0;
                    @endphp

                    <div class="flex items-center justify-between bg-white rounded-xl p-3.5 border border-amber-200/60 shadow-2xs">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl flex items-center justify-center font-bold text-xs {{ $lateDays > 0 ? 'bg-rose-100 text-rose-700' : 'bg-amber-100 text-amber-700' }}">
                                {{ $lateDays > 0 ? '!' : '⏰' }}
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-900">{{ $u->nama }} — {{ $u->layanan }}</p>
                                <p class="text-[11px] text-slate-500">Tenggat: {{ $deadline->translatedFormat('d F Y') }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            @if($lateDays > 0)
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-rose-100 text-rose-700 border border-rose-200">Terlambat {{ $lateDays }} hari</span>
                            @else
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-amber-100 text-amber-700 border border-amber-200">Deadline ≤ 3 hari</span>
                            @endif
                            <a href="{{ route('orders.show', $u->id) }}" class="px-3 py-1.5 rounded-lg bg-slate-100 text-slate-700 hover:bg-slate-200 text-xs font-bold transition">Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- PERFORMANCE CHARTS GRID (2 COLUMNS) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        <!-- LINE CHART: PENDAPATAN HARIAN -->
        <div class="lg:col-span-8 bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="font-bold text-base text-slate-900">Grafik Pendapatan Transaksi</h3>
                    <p class="text-xs text-slate-400">Tren akumulasi pembayaran masuk dari waktu ke waktu</p>
                </div>
                <div class="flex items-center gap-2">
                    <button onclick="showLine()" id="btnLine" class="px-3 py-1.5 text-xs font-bold rounded-lg bg-brand-50 text-brand-600 border border-brand-200">Garis</button>
                    <button onclick="showPie()" id="btnPie" class="px-3 py-1.5 text-xs font-bold rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200">Pie Layanan</button>
                </div>
            </div>

            <div class="relative h-72 w-full">
                <canvas id="lineChart" class="w-full h-full"></canvas>
                <div id="pieWrapper" class="hidden absolute inset-0 flex items-center justify-center">
                    <canvas id="pieChart" class="w-56 h-56"></canvas>
                </div>
            </div>
        </div>

        <!-- QUICK SUMMARY CARD -->
        <div class="lg:col-span-4 bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex flex-col justify-between space-y-6">
            <div>
                <h3 class="font-bold text-base text-slate-900 mb-1">Status Operasional</h3>
                <p class="text-xs text-slate-400">Ringkasan status proyek & pembayaran</p>

                <div class="mt-6 space-y-4">
                    <div class="flex items-center justify-between p-3.5 rounded-xl bg-slate-50 border border-slate-100">
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 rounded-full bg-amber-500"></div>
                            <span class="text-xs font-bold text-slate-700">Order Hari Ini</span>
                        </div>
                        <span class="text-sm font-extrabold text-slate-900">{{ $todayOrders }}</span>
                    </div>

                    <div class="flex items-center justify-between p-3.5 rounded-xl bg-slate-50 border border-slate-100">
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 rounded-full bg-rose-500"></div>
                            <span class="text-xs font-bold text-slate-700">Order Terlambat</span>
                        </div>
                        <span class="text-sm font-extrabold text-rose-600">{{ $lateOrders }}</span>
                    </div>

                    <div class="flex items-center justify-between p-3.5 rounded-xl bg-slate-50 border border-slate-100">
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                            <span class="text-xs font-bold text-slate-700">Total Transaksi</span>
                        </div>
                        <span class="text-sm font-extrabold text-slate-900">{{ $totalTransactions }}</span>
                    </div>
                </div>
            </div>

            <div class="p-4 rounded-xl bg-gradient-to-tr from-brand-50 to-indigo-50 border border-brand-100 text-center">
                <p class="text-xs font-bold text-brand-900">Perlu Bantuan Operasional?</p>
                <p class="text-[11px] text-slate-500 mt-1">Unduh Laporan Bisnis format Excel untuk rekap lengkap.</p>
                <a href="{{ route('reports.index') }}" class="mt-3 inline-block px-4 py-2 rounded-xl bg-brand-600 text-white font-bold text-xs hover:bg-brand-700 transition">Ke Laporan →</a>
            </div>
        </div>

    </div>

    <!-- OPERATIONAL LISTS GRID (2 COLUMNS) -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- PESANAN TERBARU -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm">
            <div class="flex items-center justify-between mb-5">
                <h3 class="font-bold text-base text-slate-900">Pesanan Masuk Terbaru</h3>
                <a href="{{ route('orders.index') }}" class="text-xs font-bold text-brand-600 hover:text-brand-700">Lihat Semua →</a>
            </div>

            <div class="divide-y divide-slate-100">
                @forelse($recentOrders as $o)
                    @php
                        $initials = collect(explode(' ', $o->nama))->map(fn($w) => strtoupper(substr($w, 0, 1)))->take(2)->implode('');
                    @endphp
                    <div class="py-3.5 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-brand-100 text-brand-700 font-bold text-xs flex items-center justify-center">
                                {{ $initials }}
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-900">{{ $o->nama }}</p>
                                <p class="text-[11px] text-slate-400">{{ $o->layanan }}</p>
                            </div>
                        </div>

                        <a href="{{ route('orders.show', $o->id) }}" class="px-3 py-1.5 rounded-lg bg-brand-50 text-brand-600 hover:bg-brand-100 text-xs font-bold transition">Detail</a>
                    </div>
                @empty
                    <div class="py-8 text-center text-slate-400">
                        <span class="material-symbols-outlined text-[32px] block mb-1">inbox</span>
                        <p class="text-xs">Belum ada pesanan terbaru</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- PROYEK AKTIF & TIMELINE -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm">
            <div class="flex items-center justify-between mb-5">
                <h3 class="font-bold text-base text-slate-900">Proyek Aktif Berjalan</h3>
                <a href="{{ route('calendar.timeline') }}" class="text-xs font-bold text-brand-600 hover:text-brand-700">Lihat Timeline →</a>
            </div>

            <div class="space-y-3">
                @forelse($activeProjects as $p)
                    @php
                        $deadline = \Carbon\Carbon::parse($p->deadline);
                        $isLate = now()->startOfDay()->gt($deadline->startOfDay()) && $p->status !== 'selesai';
                        $statusClass = match ($p->status) {
                            'pending' => 'bg-amber-100 text-amber-700',
                            'proses' => 'bg-sky-100 text-sky-700',
                            'selesai' => 'bg-emerald-100 text-emerald-700',
                            default => 'bg-slate-100 text-slate-700',
                        };
                    @endphp

                    <div class="p-3.5 rounded-xl border border-slate-200/60 bg-slate-50/50">
                        <div class="flex items-center justify-between mb-1.5">
                            <p class="text-xs font-bold text-slate-900">{{ $p->layanan }} — {{ $p->nama ?? 'Client' }}</p>
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold {{ $statusClass }}">
                                {{ ucfirst($p->status) }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between text-[11px] text-slate-500">
                            <span>Deadline: <strong class="{{ $isLate ? 'text-rose-600 font-bold' : 'text-slate-700' }}">{{ $deadline->translatedFormat('d F Y') }}</strong></span>
                            @if($isLate)
                                <span class="text-rose-600 font-bold">(Terlambat)</span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="py-8 text-center text-slate-400">
                        <span class="material-symbols-outlined text-[32px] block mb-1">view_timeline</span>
                        <p class="text-xs">Tidak ada proyek aktif saat ini</p>
                    </div>
                @endforelse
            </div>
        </div>

    </div>

</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctxLine = document.getElementById('lineChart').getContext('2d');
    const gradient = ctxLine.createLinearGradient(0, 0, 0, 300);
    gradient.addColorStop(0, 'rgba(99, 102, 241, 0.35)');
    gradient.addColorStop(1, 'rgba(99, 102, 241, 0.0)');

    const lineChart = new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: {!! json_encode($chartLine->pluck('date')) !!},
            datasets: [{
                label: 'Pendapatan (Rp)',
                data: {!! json_encode($chartLine->pluck('total')) !!},
                borderColor: '#4f46e5',
                borderWidth: 3,
                backgroundColor: gradient,
                fill: true,
                tension: 0.4,
                pointRadius: 4,
                pointBackgroundColor: '#4f46e5'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: { grid: { display: false } },
                y: { grid: { color: '#f1f5f9' } }
            }
        }
    });

    const pieChart = new Chart(document.getElementById('pieChart'), {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($pieLabels) !!},
            datasets: [{
                data: {!! json_encode($pieValues) !!},
                backgroundColor: ['#4f46e5', '#10b981', '#f59e0b', '#ef4444', '#06b6d4']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    function showLine() {
        document.getElementById('lineChart').style.display = 'block';
        document.getElementById('pieWrapper').style.display = 'none';
        document.getElementById('btnLine').className = 'px-3 py-1.5 text-xs font-bold rounded-lg bg-brand-50 text-brand-600 border border-brand-200';
        document.getElementById('btnPie').className = 'px-3 py-1.5 text-xs font-bold rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200';
    }

    function showPie() {
        document.getElementById('lineChart').style.display = 'none';
        document.getElementById('pieWrapper').style.display = 'flex';
        document.getElementById('btnPie').className = 'px-3 py-1.5 text-xs font-bold rounded-lg bg-brand-50 text-brand-600 border border-brand-200';
        document.getElementById('btnLine').className = 'px-3 py-1.5 text-xs font-bold rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200';
    }
</script>
@endpush