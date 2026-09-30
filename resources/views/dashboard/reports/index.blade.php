@extends('layouts.dashboard')
@section('title', 'Laporan Bisnis & Rekap')

@section('content')

<div class="space-y-8">

    <!-- HEADER & EXPORT FORM BAR -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Laporan Bisnis & Performa</h2>
            <p class="text-xs text-slate-500 mt-1">Rekapitulasi keuangan, piutang berjalan, transaksi, dan performa layanan</p>
        </div>
    </div>

    <!-- DATE RANGE FILTER FORM -->
    <form method="GET" class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-sm flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div class="flex flex-col sm:flex-row items-end gap-4 flex-1">
            <div class="w-full sm:w-auto flex-1">
                <label class="block text-xs font-bold text-slate-500 mb-1.5">Dari Tanggal</label>
                <input type="date" name="from" value="{{ request('from') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-xs font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>

            <div class="w-full sm:w-auto flex-1">
                <label class="block text-xs font-bold text-slate-500 mb-1.5">Sampai Tanggal</label>
                <input type="date" name="to" value="{{ request('to') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-xs font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>

            <button type="submit" class="w-full sm:w-auto px-5 py-2 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-bold text-xs shadow-md transition">
                Terapkan Filter
            </button>
        </div>

        <a href="{{ route('reports.export.excel', request()->only('from', 'to')) }}"
           class="inline-flex items-center justify-center gap-2 px-5 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-md transition shrink-0">
            <span class="material-symbols-outlined text-[18px]">table_chart</span>
            <span>Export Rekap Excel (.xlsx)</span>
        </a>
    </form>

    <!-- EXECUTIVE KPI OVERVIEW GRID -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
        
        <!-- KLIEN UNIK -->
        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm">
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Jumlah Klien Unik</p>
            <p class="text-2xl font-extrabold text-slate-900 mt-1">{{ $uniqueClients }}</p>
            <p class="text-[11px] text-slate-400 mt-1">Klien dalam periode ini</p>
        </div>

        <!-- TOTAL TRANSAKSI -->
        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm">
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Transaksi</p>
            <p class="text-2xl font-extrabold text-slate-900 mt-1">{{ $totalTransactions }}</p>
            <p class="text-[11px] text-slate-400 mt-1">Pembayaran terverifikasi</p>
        </div>

        <!-- ORDER LUNAS -->
        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm">
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Order Lunas</p>
            <p class="text-2xl font-extrabold text-sky-600 mt-1">{{ $lunasOrdersCount }}</p>
            <p class="text-[11px] text-slate-400 mt-1">Order selesai dibayar</p>
        </div>

        <!-- PENDAPATAN -->
        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm">
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Pendapatan</p>
            <p class="text-lg font-extrabold text-emerald-600 mt-1">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
            @if($revenueChange !== null)
                <p class="text-[10px] font-bold mt-1 {{ $revenueChange >= 0 ? 'text-emerald-600' : 'text-rose-600' }}">
                    {{ $revenueChange >= 0 ? '▲' : '▼' }} {{ abs($revenueChange) }}% vs periode sebelumnya
                </p>
            @else
                <p class="text-[11px] text-slate-400 mt-1">Periode aktif</p>
            @endif
        </div>

        <!-- TOTAL PIUTANG -->
        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm">
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Piutang</p>
            <p class="text-lg font-extrabold text-rose-600 mt-1">Rp {{ number_format($totalPiutang, 0, ',', '.') }}</p>
            <p class="text-[11px] text-slate-400 mt-1">Belum dilunasi klien</p>
        </div>

    </div>

    <!-- SECTIONS TABLES GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- LAPORAN TRANSAKSI -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm space-y-4">
            <h3 class="font-bold text-base text-slate-900 border-b border-slate-100 pb-3">Laporan Transaksi Masuk</h3>

            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left border-collapse text-xs">
                    <thead class="bg-slate-50 border-b border-slate-100 font-bold uppercase text-[10px] text-slate-400">
                        <tr>
                            <th class="py-2.5 px-3">Tanggal</th>
                            <th class="py-2.5 px-3">Klien</th>
                            <th class="py-2.5 px-3">Metode</th>
                            <th class="py-2.5 px-3 text-right">Nominal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium">
                        @forelse($payments as $p)
                            <tr class="hover:bg-slate-50">
                                <td class="py-2.5 px-3 whitespace-nowrap">{{ \Carbon\Carbon::parse($p->paid_at)->format('d/m/Y') }}</td>
                                <td class="py-2.5 px-3 font-bold text-slate-900">{{ $p->order->nama }}</td>
                                <td class="py-2.5 px-3 uppercase text-[11px] font-bold text-slate-500">{{ $p->method }}</td>
                                <td class="py-2.5 px-3 text-right font-bold text-emerald-600">Rp {{ number_format($p->amount, 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center py-6 text-slate-400">Tidak ada data transaksi</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- LAPORAN PIUTANG PELANGGAN -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm space-y-4">
            <h3 class="font-bold text-base text-slate-900 border-b border-slate-100 pb-3">Laporan Piutang Pelanggan</h3>

            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left border-collapse text-xs">
                    <thead class="bg-slate-50 border-b border-slate-100 font-bold uppercase text-[10px] text-slate-400">
                        <tr>
                            <th class="py-2.5 px-3">Klien</th>
                            <th class="py-2.5 px-3">Layanan</th>
                            <th class="py-2.5 px-3 text-right">Sisa Tagihan</th>
                            <th class="py-2.5 px-3 text-center">Terlambat</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium">
                        @forelse($piutangDetail as $p)
                            <tr class="hover:bg-slate-50">
                                <td class="py-2.5 px-3 font-bold text-slate-900">{{ $p['nama'] }}</td>
                                <td class="py-2.5 px-3 text-slate-600">{{ $p['layanan'] }}</td>
                                <td class="py-2.5 px-3 text-right font-bold text-rose-600">Rp {{ number_format($p['sisa'], 0, ',', '.') }}</td>
                                <td class="py-2.5 px-3 text-center font-bold text-amber-600">{{ $p['hari'] > 0 ? $p['hari'] . ' hari' : '—' }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center py-6 text-slate-400">Tidak ada piutang berjalan</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- TOP SERVICES & TOP CLIENTS -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- TRANSAKSI PER LAYANAN -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm space-y-4">
            <h3 class="font-bold text-base text-slate-900 border-b border-slate-100 pb-3">Omset Per Layanan</h3>
            <div class="space-y-3 text-xs">
                @forelse($serviceSummary as $s)
                    <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-100">
                        <span class="font-bold text-slate-800">{{ $s['layanan'] }}</span>
                        <strong class="text-slate-900 font-extrabold">Rp {{ number_format($s['total'], 0, ',', '.') }}</strong>
                    </div>
                @empty
                    <p class="text-slate-400 text-center py-4">Tidak ada data</p>
                @endforelse
            </div>
        </div>

        <!-- KLIEN TERATAS -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm space-y-4">
            <h3 class="font-bold text-base text-slate-900 border-b border-slate-100 pb-3">Klien Kontribusi Terbesar</h3>
            <div class="space-y-3 text-xs">
                @forelse($topClients as $c)
                    <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-100">
                        <span class="font-bold text-slate-800">{{ $c['nama'] }}</span>
                        <strong class="text-emerald-600 font-extrabold">Rp {{ number_format($c['total'], 0, ',', '.') }}</strong>
                    </div>
                @empty
                    <p class="text-slate-400 text-center py-4">Tidak ada data</p>
                @endforelse
            </div>
        </div>

    </div>

</div>

@endsection