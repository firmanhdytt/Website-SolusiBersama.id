@extends('layouts.dashboard')
@section('title', 'Dashboard')

@section('content')

    <div class="space-y-12">

        {{-- ================= HEADER ================= --}}
        <div>
            <h2 class="text-3xl font-bold">
                Selamat Datang, {{ $user->name ?? 'Admin' }} 👋
            </h2>
            <p class="text-gray-500">
                Ringkasan kondisi bisnis hari ini – {{ now()->translatedFormat('l, d F Y') }}
            </p>
        </div>

        {{-- ================= KPI ================= --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">

            {{-- Pesanan Hari Ini --}}
            <div class="bg-white rounded-xl shadow p-4">
                <p class="text-xs text-gray-500">Pesanan Hari Ini</p>
                <p class="text-2xl font-bold mt-2">{{ $todayOrders }}</p>
            </div>

            {{-- Pesanan Aktif --}}
            <div class="bg-white rounded-xl shadow p-4">
                <p class="text-xs text-gray-500">Pesanan Aktif</p>
                <p class="text-2xl font-bold mt-2 text-blue-600">{{ $activeOrders }}</p>
            </div>

            {{-- Order Terlambat --}}
            <div class="bg-white rounded-xl shadow p-4">
                <p class="text-xs text-gray-500">Order Terlambat</p>
                <p class="text-2xl font-bold mt-2 text-red-600">
                    {{ $lateOrders }}
                </p>
            </div>

            {{-- Deadline ≤ 3 Hari --}}
            <div class="bg-white rounded-xl shadow p-4">
                <p class="text-xs text-gray-500">Deadline ≤ 3 Hari</p>
                <p class="text-2xl font-bold mt-2 text-yellow-600">
                    {{ $nearDeadlineOrders }}
                </p>
            </div>

            {{-- Total Transaksi --}}
            <div class="bg-white rounded-xl shadow p-4">
                <p class="text-xs text-gray-500">Total Transaksi</p>
                <p class="text-2xl font-bold mt-2">{{ $totalTransactions }}</p>
            </div>

            {{-- Order Lunas --}}
            <div class="bg-white rounded-xl shadow p-4">
                <p class="text-xs text-gray-500">Order Lunas</p>
                <p class="text-2xl font-bold mt-2 text-green-600">
                    {{ $lunasOrdersCount }}
                </p>
            </div>

            {{-- Pendapatan Bulan Ini --}}
            <div class="bg-white rounded-xl shadow p-4">
                <p class="text-xs text-gray-500">Pendapatan Bulan Ini</p>
                <p class="text-lg font-bold mt-2 text-green-600">
                    Rp {{ number_format($monthlyRevenue, 0, ',', '.') }}
                </p>
            </div>

            {{-- Total Piutang --}}
            <div class="bg-white rounded-xl shadow p-4">
                <p class="text-xs text-gray-500">Total Piutang</p>
                <p class="text-lg font-bold mt-2 text-red-600">
                    Rp {{ number_format($totalPiutang, 0, ',', '.') }}
                </p>
            </div>

        </div>



        {{-- ================= ALERT ================= --}}
        @if($urgentOrders->count())
            <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-5">
                <h3 class="font-semibold text-yellow-800 mb-3 flex items-center gap-2">
                    Perlu Perhatian
                </h3>

                <ul class="space-y-2 text-sm text-gray-700">
                    @foreach($urgentOrders as $u)
                        @php
                            $deadline = \Carbon\Carbon::parse($u->deadline)->startOfDay();
                            $today = now()->startOfDay();

                            $lateDays = $today->gt($deadline)
                                ? $deadline->diffInDays($today)
                                : 0;
                        @endphp

                        <li class="flex items-center justify-between bg-white rounded-lg px-4 py-3 border">
                            <div>
                                <p class="font-medium">
                                    {{ $u->nama }} – {{ $u->layanan }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    Deadline: {{ $deadline->translatedFormat('d F Y') }}
                                </p>
                            </div>

                            @if($lateDays > 0)
                                <span
                                    class="text-xs font-medium px-3 py-1 rounded-full
                                                                                                                     bg-red-100 text-red-700">
                                    Terlambat {{ $lateDays }} hari
                                </span>
                            @else
                                <span
                                    class="text-xs font-medium px-3 py-1 rounded-full
                                                                                                                     bg-yellow-100 text-yellow-700">
                                    Deadline hari ini
                                </span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- ================= GRID UTAMA ================= --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            {{-- ================= PESANAN TERBARU ================= --}}
            <div class="bg-white rounded-2xl shadow p-6">
                <div class="flex justify-between items-center mb-5">
                    <h3 class="font-semibold text-gray-800">Pesanan Terbaru</h3>
                    <a href="{{ route('orders.index') }}" class="text-sm text-indigo-600 hover:underline">
                        Lihat semua
                    </a>
                </div>

                <div class="space-y-3">
                    @forelse($recentOrders as $o)
                        <div class="flex justify-between items-center p-3 rounded-xl
                                                            hover:bg-gray-50 transition border">
                            <div>
                                <p class="font-medium text-gray-800">
                                    {{ $o->nama }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    {{ $o->layanan }}
                                </p>
                            </div>

                            <a href="{{ route('orders.show', $o->id) }}" class="text-sm px-4 py-1.5 rounded-lg
                                                              bg-indigo-100 text-indigo-700
                                                              hover:bg-indigo-200 transition">
                                Detail
                            </a>
                        </div>
                    @empty
                        <p class="text-gray-400 text-center py-8">
                            Belum ada pesanan
                        </p>
                    @endforelse
                </div>
            </div>

            {{-- ================= PROYEK AKTIF ================= --}}
            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="font-semibold text-gray-800 mb-5">Proyek Aktif</h3>

                <div class="space-y-3">
                    @forelse($activeProjects as $p)
                        @php
                            $deadline = \Carbon\Carbon::parse($p->deadline);
                            $isLate = now()->startOfDay()->gt($deadline->startOfDay())
                                && $p->status !== 'selesai';
                        @endphp

                        <div class="p-3 rounded-xl border hover:bg-gray-50 transition">
                            <div class="flex justify-between items-center mb-1">
                                <p class="font-medium text-gray-800">
                                    {{ $p->layanan }}
                                </p>

                                <span
                                    class="text-xs px-3 py-1 rounded-full
                                                            {{ $p->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                                            {{ $p->status === 'proses' ? 'bg-blue-100 text-blue-700' : '' }}
                                                            {{ $p->status === 'selesai' ? 'bg-green-100 text-green-700' : '' }}">
                                    {{ ucfirst($p->status) }}
                                </span>
                            </div>

                            <p class="text-sm {{ $isLate ? 'text-red-600 font-medium' : 'text-gray-500' }}">
                                Deadline: {{ $deadline->translatedFormat('d F Y') }}
                                @if($isLate)
                                    <span class="ml-1">(Terlambat)</span>
                                @endif
                            </p>
                        </div>
                    @empty
                        <p class="text-gray-400 text-center py-8">
                            Tidak ada proyek aktif
                        </p>
                    @endforelse
                </div>
            </div>

        </div>


        {{-- ================= GRAFIK ================= --}}
        <div class="bg-white rounded-2xl shadow p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-semibold">Grafik Pendapatan</h3>
                <div class="flex gap-2">
                    <button onclick="showLine()" class="px-3 py-1 text-sm rounded bg-indigo-100">
                        Line
                    </button>
                    <button onclick="showPie()" class="px-3 py-1 text-sm rounded bg-emerald-100">
                        Pie
                    </button>
                </div>
            </div>

            <div class="relative h-[320px]">
                <canvas id="lineChart" class="w-full h-full"></canvas>

                <div id="pieWrapper" class="hidden absolute inset-0 flex items-center justify-center">
                    <canvas id="pieChart" class="w-[260px] h-[260px]"></canvas>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const lineChart = new Chart(document.getElementById('lineChart'), {
            type: 'line',
            data: {
                labels: {!! json_encode($chartLine->pluck('date')) !!},
                datasets: [{
                    data: {!! json_encode($chartLine->pluck('total')) !!},
                    borderColor: '#4f46e5',
                    backgroundColor: 'rgba(79,70,229,.15)',
                    fill: true,
                    tension: .35
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });

        const pieChart = new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: {
                labels: {!! json_encode($pieLabels) !!},
                datasets: [{
                    data: {!! json_encode($pieValues) !!},
                    backgroundColor: ['#4f46e5', '#16a34a', '#facc15', '#dc2626', '#0ea5e9']
                }]
            }
        });


        function showLine() {
            document.getElementById('lineChart').style.display = 'block';
            document.getElementById('pieWrapper').style.display = 'none';
        }

        function showPie() {
            document.getElementById('lineChart').style.display = 'none';
            document.getElementById('pieWrapper').style.display = 'flex';
        }
    </script>
@endpush