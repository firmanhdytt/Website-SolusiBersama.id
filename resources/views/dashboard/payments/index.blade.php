@extends('layouts.dashboard')
@section('title', 'Manajemen Pembayaran')

@section('content')

<div class="space-y-6">

    <!-- HEADER & EXPORT -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Manajemen Pembayaran</h2>
            <p class="text-xs text-slate-500 mt-1">Ringkasan transaksi, pembayaran DP, pelunasan, dan piutang pesanan</p>
        </div>

        <a href="{{ route('payments.export') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-md transition">
            <span class="material-symbols-outlined text-[18px]">download</span>
            <span>Export Rekap Pembayaran (PDF)</span>
        </a>
    </div>

    <!-- SUMMARY METRIC CARDS -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Pesanan</p>
                <p class="text-2xl font-extrabold text-slate-900 mt-1">{{ $orders->count() }}</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center">
                <span class="material-symbols-outlined text-[20px]">receipt_long</span>
            </div>
        </div>

        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Belum Bayar</p>
                <p class="text-2xl font-extrabold text-amber-600 mt-1">{{ $orders->where('status_pembayaran', 'belum')->count() }}</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                <span class="material-symbols-outlined text-[20px]">pending</span>
            </div>
        </div>

        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Cicilan DP</p>
                <p class="text-2xl font-extrabold text-sky-600 mt-1">{{ $orders->where('status_pembayaran', 'dp')->count() }}</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center">
                <span class="material-symbols-outlined text-[20px]">payments</span>
            </div>
        </div>

        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Sudah Lunas</p>
                <p class="text-2xl font-extrabold text-emerald-600 mt-1">{{ $orders->where('status_pembayaran', 'lunas')->count() }}</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <span class="material-symbols-outlined text-[20px]">verified</span>
            </div>
        </div>
    </div>

    <!-- SEARCH & FILTER TOOLBAR -->
    <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
        
        <div class="relative flex-1 max-w-md">
            <span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]">search</span>
            <input type="text" id="searchInput" placeholder="Cari pemesan, email, layanan..."
                   class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:bg-white transition">
        </div>

        <div class="flex items-center gap-3">
            <span class="text-xs font-bold text-slate-400 whitespace-nowrap">Filter Pembayaran:</span>
            <select id="statusFilter" class="bg-slate-50 border border-slate-200 text-xs font-bold text-slate-700 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">
                <option value="all">Semua Status</option>
                <option value="belum">Belum Bayar</option>
                <option value="dp">DP</option>
                <option value="lunas">Lunas</option>
            </select>
        </div>

    </div>

    <!-- PAYMENTS DATA TABLE -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left border-collapse" id="paymentTable">
                <thead class="bg-slate-50/80 border-b border-slate-100 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                    <tr>
                        <th class="px-6 py-4">Klien / Pemesan</th>
                        <th class="px-6 py-4">Total Tagihan</th>
                        <th class="px-6 py-4">Sudah Dibayar</th>
                        <th class="px-6 py-4">Sisa Tagihan</th>
                        <th class="px-6 py-4">Status Tagihan</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100 text-xs font-medium">
                    @foreach($orders as $order)
                        @php
                            $paid = $order->totalPaid();
                            $remaining = $order->remainingPayment();
                            $initials = collect(explode(' ', $order->nama))->map(fn($w) => strtoupper(substr($w, 0, 1)))->take(2)->implode('');
                            $statusClass = match ($order->status_pembayaran) {
                                'belum' => 'bg-amber-50 text-amber-700 border-amber-200',
                                'dp' => 'bg-sky-50 text-sky-700 border-sky-200',
                                'lunas' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                default => 'bg-slate-50 text-slate-700 border-slate-200',
                            };
                            $dotClass = match ($order->status_pembayaran) {
                                'belum' => 'bg-amber-500',
                                'dp' => 'bg-sky-500',
                                'lunas' => 'bg-emerald-500',
                                default => 'bg-slate-400',
                            };
                        @endphp

                        <tr class="payment-row hover:bg-slate-50/80 transition"
                            data-status="{{ $order->status_pembayaran }}"
                            data-search="{{ strtolower($order->nama . ' ' . $order->email . ' ' . $order->layanan) }}">

                            <!-- KLIEN -->
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-brand-100 text-brand-700 font-bold text-xs flex items-center justify-center shrink-0">
                                        {{ $initials }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-900 text-xs">{{ $order->nama }}</p>
                                        <p class="text-[11px] text-slate-400">{{ $order->email }}</p>
                                    </div>
                                </div>
                            </td>

                            <!-- TOTAL TAGIHAN -->
                            <td class="px-6 py-4 font-bold text-slate-900">
                                Rp {{ number_format($order->budget, 0, ',', '.') }}
                            </td>

                            <!-- SUDAH DIBAYAR -->
                            <td class="px-6 py-4 font-bold text-emerald-600">
                                Rp {{ number_format($paid, 0, ',', '.') }}
                            </td>

                            <!-- SISA TAGIHAN -->
                            <td class="px-6 py-4 font-bold {{ $remaining > 0 ? 'text-rose-600' : 'text-slate-400' }}">
                                Rp {{ number_format($remaining, 0, ',', '.') }}
                            </td>

                            <!-- STATUS TAGIHAN -->
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full border text-[11px] font-bold {{ $statusClass }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $dotClass }}"></span>
                                    <span>{{ ucfirst($order->status_pembayaran) }}</span>
                                </span>
                            </td>

                            <!-- AKSI -->
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('payments.show', $order->id) }}"
                                   class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl bg-brand-50 text-brand-600 hover:bg-brand-100 font-bold text-xs transition">
                                    <span>Detail Pembayaran</span>
                                    <span class="material-symbols-outlined text-[16px]">payments</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    <tr id="emptyRow" class="{{ $orders->isEmpty() ? '' : 'hidden' }}">
                        <td colspan="6" class="text-center py-12 text-slate-400">
                            <span class="material-symbols-outlined text-[40px] block mb-2 text-slate-300">account_balance_wallet</span>
                            <p class="text-xs font-semibold">Tidak ada transaksi pembayaran yang sesuai</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection

@push('scripts')
<script>
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');
    const rows = document.querySelectorAll('.payment-row');
    const emptyRow = document.getElementById('emptyRow');

    function filterTable() {
        let visibleCount = 0;
        const keyword = searchInput.value.toLowerCase();
        const status = statusFilter.value;

        rows.forEach(row => {
            const rowText = row.dataset.search;
            const rowStatus = row.dataset.status;

            const matchText = rowText.includes(keyword);
            const matchStatus = status === 'all' || rowStatus === status;

            if (matchText && matchStatus) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        emptyRow.classList.toggle('hidden', visibleCount > 0);
    }

    searchInput.addEventListener('input', filterTable);
    statusFilter.addEventListener('change', filterTable);
</script>
@endpush