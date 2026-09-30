@extends('layouts.dashboard')
@section('title', 'Detail Profil Klien')

@section('content')

<div class="max-w-5xl mx-auto space-y-8">

    <!-- HEADER BAR -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Detail Profil Klien</h2>
            <p class="text-xs text-slate-500 mt-1">Histori lengkap transaksi dan proyek pesanan klien</p>
        </div>

        <a href="{{ route('clients.index') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-slate-200 bg-white text-slate-700 text-xs font-bold hover:bg-slate-50 transition">
            <span class="material-symbols-outlined text-[18px]">arrow_back</span>
            <span>Kembali ke Direktori</span>
        </a>
    </div>

    <!-- CLIENT PROFILE OVERVIEW CARD -->
    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200/80 shadow-sm flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
        <div class="flex items-center gap-4">
            @php $initials = collect(explode(' ', $client->nama))->map(fn($w) => strtoupper(substr($w, 0, 1)))->take(2)->implode(''); @endphp
            <div class="w-16 h-16 rounded-2xl bg-brand-100 text-brand-700 font-extrabold text-xl flex items-center justify-center shrink-0 border border-brand-200">
                {{ $initials }}
            </div>

            <div>
                <h3 class="text-xl font-extrabold text-slate-900 tracking-tight">{{ $client->nama }}</h3>
                <p class="text-xs text-slate-400 mt-0.5">{{ $client->email }} · {{ $client->telepon ?? 'Tidak Ada Nomor Telepon' }}</p>
                <div class="mt-2 flex items-center gap-2">
                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                        {{ $client->active_orders > 0 ? 'Klien Aktif' : 'Klien Dormant' }}
                    </span>
                </div>
            </div>
        </div>

        @if($client->telepon)
            @php $waNum = preg_replace('/[^0-9]/', '', $client->telepon); @endphp
            <a href="https://wa.me/{{ $waNum }}" target="_blank"
               class="px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-md transition flex items-center gap-2">
                <span class="material-symbols-outlined text-[18px]">chat</span>
                <span>Hubungi via WhatsApp</span>
            </a>
        @endif
    </div>

    <!-- CLIENT METRICS GRID -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm">
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Proyek</p>
            <p class="text-2xl font-extrabold text-slate-900 mt-1">{{ $client->total_orders }}</p>
        </div>

        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm">
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Proyek Aktif</p>
            <p class="text-2xl font-extrabold text-sky-600 mt-1">{{ $client->active_orders }}</p>
        </div>

        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm">
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Proyek Selesai</p>
            <p class="text-2xl font-extrabold text-emerald-600 mt-1">{{ $client->done_orders }}</p>
        </div>

        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm">
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Batal</p>
            <p class="text-2xl font-extrabold text-rose-600 mt-1">{{ $client->cancelled_orders }}</p>
        </div>
    </div>

    <!-- CLIENT ORDER HISTORY TABLE -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden space-y-4">
        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
            <h3 class="font-bold text-base text-slate-900">Histori Pesanan Klien</h3>
        </div>

        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50/80 border-b border-slate-100 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                    <tr>
                        <th class="px-6 py-4">Layanan</th>
                        <th class="px-6 py-4">Deadline Target</th>
                        <th class="px-6 py-4">Status Proyek</th>
                        <th class="px-6 py-4">Status Tagihan</th>
                        <th class="px-6 py-4">Tanggal Order</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100 text-xs font-medium">
                    @foreach ($orders as $order)
                        @php
                            $statusClass = match ($order->status) {
                                'pending' => 'bg-amber-50 text-amber-700 border-amber-200',
                                'proses' => 'bg-sky-50 text-sky-700 border-sky-200',
                                'selesai' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                'batal' => 'bg-rose-50 text-rose-700 border-rose-200',
                                default => 'bg-slate-50 text-slate-700 border-slate-200',
                            };

                            $payStatusClass = match ($order->status_pembayaran) {
                                'lunas' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                'dp' => 'bg-sky-50 text-sky-700 border-sky-200',
                                default => 'bg-amber-50 text-amber-700 border-amber-200',
                            };
                        @endphp

                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="px-6 py-4 font-bold text-slate-900">
                                {{ $order->layanan }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $order->deadline ? \Carbon\Carbon::parse($order->deadline)->translatedFormat('d F Y') : '-' }}
                            </td>

                            <td class="px-6 py-4">
                                <span class="px-2.5 py-0.5 rounded-full border text-[11px] font-bold {{ $statusClass }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                <span class="px-2.5 py-0.5 rounded-full border text-[11px] font-bold {{ $payStatusClass }}">
                                    {{ ucfirst($order->status_pembayaran) }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-slate-500">
                                {{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('d F Y') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
