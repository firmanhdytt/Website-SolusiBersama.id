@extends('layouts.dashboard')
@section('title', 'Laporan')

@section('content')

    <div class="space-y-10">

        {{-- ================= HEADER ================= --}}
        <div>
            <h2 class="text-3xl font-bold mb-1">Laporan Bisnis</h2>
            <p class="text-gray-500">
                Rekap data transaksi, piutang, dan order klien
            </p>
        </div>

        {{-- ================= FILTER ================= --}}
        <form method="GET" class="bg-white rounded-2xl shadow p-5 flex flex-col md:flex-row md:items-end gap-4">

            {{-- Filter tanggal --}}
            <div class="flex flex-col sm:flex-row gap-4 flex-1">
                <div>
                    <label class="text-sm text-gray-500">Dari</label>
                    <input type="date" name="from" value="{{ request('from') }}" class="border rounded-lg px-3 py-2 w-full">
                </div>

                <div>
                    <label class="text-sm text-gray-500">Sampai</label>
                    <input type="date" name="to" value="{{ request('to') }}" class="border rounded-lg px-3 py-2 w-full">
                </div>

                <div class="flex items-end">
                    <button class="px-5 py-2 bg-indigo-600 text-white rounded-lg">
                        Terapkan
                    </button>
                </div>
            </div>

            {{-- Tombol Export (ujung kanan) --}}
            <div class="md:ml-auto">
                <a href="{{ route('reports.export.excel', request()->only('from', 'to')) }}" class="inline-flex items-center px-5 py-2 bg-green-600 text-white
                                  rounded-lg text-sm hover:bg-green-700">
                    Export Excel
                </a>
            </div>

        </form>


        {{-- ================= KPI LAPORAN ================= --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">

            {{-- Jumlah Klien --}}
            <div class="bg-white rounded-xl shadow p-4">
                <p class="text-xs text-gray-500">Jumlah Klien</p>
                <p class="text-2xl font-bold mt-2">
                    {{ $uniqueClients }}
                </p>
                <p class="text-xs text-gray-400 mt-1">
                    Klien unik periode ini
                </p>
            </div>

            {{-- Total Transaksi --}}
            <div class="bg-white rounded-xl shadow p-4">
                <p class="text-xs text-gray-500">Total Transaksi</p>
                <p class="text-2xl font-bold mt-2">
                    {{ $totalTransactions }}
                </p>
                <p class="text-xs text-gray-400 mt-1">
                    Jumlah pembayaran masuk
                </p>
            </div>

            {{-- Order Lunas --}}
            <div class="bg-white rounded-xl shadow p-4">
                <p class="text-xs text-gray-500">Order Lunas</p>
                <p class="text-2xl font-bold mt-2 text-blue-600">
                    {{ $lunasOrdersCount }}
                </p>
                <p class="text-xs text-gray-400 mt-1">
                    Order selesai dibayar
                </p>
            </div>

            {{-- Pendapatan --}}
            <div class="bg-white rounded-xl shadow p-4">
                <p class="text-xs text-gray-500">Pendapatan</p>
                <p class="text-xl font-bold mt-2 text-green-600">
                    Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                </p>

                {{-- Persentase --}}
                @if($revenueChange !== null)
                    <p class="text-xs mt-1
                                        {{ $revenueChange >= 0 ? 'text-green-600' : 'text-red-600' }}">
                        {{ $revenueChange >= 0 ? '▲' : '▼' }}
                        {{ abs($revenueChange) }}%
                        dibanding periode sebelumnya
                    </p>
                @else
                    <p class="text-xs text-gray-400 mt-1">
                        Tidak ada data pembanding
                    </p>
                @endif
            </div>

            {{-- Total Piutang --}}
            <div class="bg-white rounded-xl shadow p-4">
                <p class="text-xs text-gray-500">Total Piutang</p>
                <p class="text-xl font-bold mt-2 text-red-600">
                    Rp {{ number_format($totalPiutang, 0, ',', '.') }}
                </p>
                <p class="text-xs text-gray-400 mt-1">
                    Belum dibayarkan
                </p>
            </div>

        </div>



        {{-- ================= LAPORAN TRANSAKSI ================= --}}
        <div class="bg-white rounded-2xl shadow p-6">
            <h3 class="font-semibold mb-4">Laporan Transaksi</h3>

            {{-- SCROLL WRAPPER --}}
            <div class="overflow-x-auto">
                <table class="min-w-[700px] w-full text-sm">
                    <thead class="border-b text-gray-500">
                        <tr>
                            <th class="text-left py-2">Tanggal</th>
                            <th class="text-left">Klien</th>
                            <th class="text-left">Layanan</th>
                            <th class="text-left">Metode</th>
                            <th class="text-right">Nominal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($payments as $p)
                            <tr>
                                <td class="py-3 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($p->paid_at)->format('d/m/Y') }}
                                </td>
                                <td class="whitespace-nowrap">
                                    {{ $p->order->nama }}
                                </td>
                                <td class="whitespace-nowrap">
                                    {{ $p->order->layanan }}
                                </td>
                                <td class="uppercase whitespace-nowrap">
                                    {{ $p->method }}
                                </td>
                                <td class="text-right text-green-600 font-medium whitespace-nowrap">
                                    Rp {{ number_format($p->amount, 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-6 text-gray-400">
                                    Tidak ada transaksi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>


        {{-- ================= LAPORAN PIUTANG ================= --}}
        <div class="bg-white rounded-2xl shadow p-6">
            <h3 class="font-semibold mb-4">Laporan Piutang</h3>

            <div class="overflow-x-auto">
                <table class="min-w-[700px] w-full text-sm">
                    <thead class="border-b text-gray-500">
                        <tr>
                            <th class="text-left py-2">Klien</th>
                            <th class="text-left">Layanan</th>
                            <th class="text-left">Sisa</th>
                            <th class="text-center">Telat</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($piutangDetail as $p)
                            <tr>
                                <td class="py-3 whitespace-nowrap">
                                    <div class="font-medium">{{ $p['nama'] }}</div>
                                    <div class="text-xs text-gray-500">{{ $p['email'] }}</div>
                                </td>
                                <td class="whitespace-nowrap">
                                    {{ $p['layanan'] }}
                                </td>
                                <td class="text-red-600 font-semibold whitespace-nowrap">
                                    Rp {{ number_format($p['sisa'], 0, ',', '.') }}
                                </td>
                                <td class="text-center whitespace-nowrap">
                                    {{ $p['hari'] > 0 ? $p['hari'] . ' hari' : '—' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-6 text-gray-400">
                                    Tidak ada piutang
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>


        {{-- ================= LAPORAN ORDER ================= --}}
        <div class="bg-white rounded-2xl shadow p-6">
            <h3 class="font-semibold mb-4">Laporan Order</h3>

            <div class="overflow-x-auto">
                <table class="min-w-[700px] w-full text-sm">
                    <thead class="border-b text-gray-500">
                        <tr>
                            <th class="text-left py-2">Klien</th>
                            <th class="text-left">Layanan</th>
                            <th class="text-left">Status</th>
                            <th class="text-left">Deadline</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($orders as $o)
                                        <tr>
                                            <td class="py-3 whitespace-nowrap">
                                                {{ $o->nama }}
                                            </td>
                                            <td class="whitespace-nowrap">
                                                {{ $o->layanan }}
                                            </td>
                                            <td class="capitalize whitespace-nowrap">
                                                {{ $o->status }}
                                            </td>
                                            <td class="whitespace-nowrap">
                                                {{ $o->deadline
                            ? \Carbon\Carbon::parse($o->deadline)->translatedFormat('d F Y')
                            : '-' }}
                                            </td>
                                        </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-6 text-gray-400">
                                    Tidak ada data order
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- ================= PER LAYANAN ================= --}}
            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="font-semibold mb-4">Transaksi per Layanan</h3>

                <ul class="text-sm space-y-2">
                    @forelse($serviceSummary as $s)
                        <li class="flex justify-between">
                            <span class="text-gray-700">{{ $s['layanan'] }}</span>
                            <span class="font-medium">
                                Rp {{ number_format($s['total'], 0, ',', '.') }}
                            </span>
                        </li>
                    @empty
                        <li class="text-gray-400">Tidak ada data</li>
                    @endforelse
                </ul>
            </div>

            {{-- ================= KLIEN TERATAS ================= --}}
            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="font-semibold mb-4">Klien Teratas</h3>

                <ul class="text-sm space-y-2">
                    @forelse($topClients as $c)
                        <li class="flex justify-between">
                            <span class="text-gray-700">{{ $c['nama'] }}</span>
                            <span class="font-medium">
                                Rp {{ number_format($c['total'], 0, ',', '.') }}
                            </span>
                        </li>
                    @empty
                        <li class="text-gray-400">Tidak ada data</li>
                    @endforelse
                </ul>
            </div>

        </div>


    </div>

@endsection