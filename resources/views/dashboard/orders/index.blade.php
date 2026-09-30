@extends('layouts.dashboard')
@section('title', 'Manajemen Pesanan')

@section('content')

<div class="space-y-6">

    <!-- HEADER & QUICK SUMMARY -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Manajemen Pesanan</h2>
            <p class="text-xs text-slate-500 mt-1">Kelola seluruh pesanan masuk, status pengerjaan, dan detail klien</p>
        </div>
    </div>

    <!-- QUICK STATS CARDS BAR -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Order</p>
                <p class="text-2xl font-extrabold text-slate-900 mt-1">{{ $orders->count() }}</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center">
                <span class="material-symbols-outlined text-[20px]">orders</span>
            </div>
        </div>

        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Pending</p>
                <p class="text-2xl font-extrabold text-amber-600 mt-1">{{ $orders->where('status', 'pending')->count() }}</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                <span class="material-symbols-outlined text-[20px]">hourglass_empty</span>
            </div>
        </div>

        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Proses</p>
                <p class="text-2xl font-extrabold text-sky-600 mt-1">{{ $orders->where('status', 'proses')->count() }}</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center">
                <span class="material-symbols-outlined text-[20px]">sync</span>
            </div>
        </div>

        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Selesai</p>
                <p class="text-2xl font-extrabold text-emerald-600 mt-1">{{ $orders->where('status', 'selesai')->count() }}</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <span class="material-symbols-outlined text-[20px]">check_circle</span>
            </div>
        </div>
    </div>

    <!-- TOOLBAR & STATUS TABS -->
    <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
        
        <!-- SEARCH BOX -->
        <div class="relative flex-1 max-w-md">
            <span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]">search</span>
            <input type="text" id="searchInput" placeholder="Cari nama pemesan, email, atau layanan..."
                   class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:bg-white transition">
        </div>

        <!-- STATUS FILTER DROPDOWN -->
        <div class="flex items-center gap-3">
            <span class="text-xs font-bold text-slate-400 whitespace-nowrap">Filter Status:</span>
            <select id="statusFilter" class="bg-slate-50 border border-slate-200 text-xs font-bold text-slate-700 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">
                <option value="">Semua Status</option>
                <option value="pending">Pending</option>
                <option value="proses">Proses</option>
                <option value="selesai">Selesai</option>
                <option value="batal">Batal</option>
            </select>
        </div>

    </div>

    <!-- ORDERS DATA TABLE -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left border-collapse" id="ordersTable">
                <thead class="bg-slate-50/80 border-b border-slate-100 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                    <tr>
                        <th class="px-6 py-4">Pemesan / Klien</th>
                        <th class="px-6 py-4">Layanan</th>
                        <th class="px-6 py-4">Tanggal Order</th>
                        <th class="px-6 py-4">Budget</th>
                        <th class="px-6 py-4">Status Pesanan</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100 text-xs font-medium">
                    @foreach ($orders as $order)
                        @php
                            $initials = collect(explode(' ', $order->nama))->map(fn($w) => strtoupper(substr($w, 0, 1)))->take(2)->implode('');
                            $statusClass = match ($order->status) {
                                'pending' => 'bg-amber-50 text-amber-700 border-amber-200',
                                'proses' => 'bg-sky-50 text-sky-700 border-sky-200',
                                'selesai' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                'batal' => 'bg-rose-50 text-rose-700 border-rose-200',
                                default => 'bg-slate-50 text-slate-700 border-slate-200',
                            };
                            $dotClass = match ($order->status) {
                                'pending' => 'bg-amber-500',
                                'proses' => 'bg-sky-500',
                                'selesai' => 'bg-emerald-500',
                                'batal' => 'bg-rose-500',
                                default => 'bg-slate-400',
                            };
                        @endphp

                        <tr class="hover:bg-slate-50/80 transition" data-status="{{ $order->status }}">
                            
                            <!-- PEMESAN / KLIEN -->
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

                            <!-- LAYANAN -->
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 font-semibold text-[11px]">
                                    {{ $order->layanan }}
                                </span>
                            </td>

                            <!-- TANGGAL ORDER -->
                            <td class="px-6 py-4 text-slate-600">
                                {{ $order->created_at->translatedFormat('d F Y') }}
                            </td>

                            <!-- BUDGET -->
                            <td class="px-6 py-4 font-bold text-slate-900">
                                Rp {{ number_format($order->budget, 0, ',', '.') }}
                            </td>

                            <!-- STATUS PESANAN -->
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full border text-[11px] font-bold {{ $statusClass }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $dotClass }}"></span>
                                    <span>{{ ucfirst($order->status) }}</span>
                                </span>
                            </td>

                            <!-- AKSI -->
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('orders.show', $order->id) }}"
                                   class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl bg-brand-50 text-brand-600 hover:bg-brand-100 font-bold text-xs transition">
                                    <span>Detail</span>
                                    <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    <tr id="emptyRow" class="{{ $orders->isEmpty() ? '' : 'hidden' }}">
                        <td colspan="6" class="text-center py-12 text-slate-400">
                            <span class="material-symbols-outlined text-[40px] block mb-2 text-slate-300">search_off</span>
                            <p class="text-xs font-semibold">Tidak ada data pesanan yang sesuai filter</p>
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
    const rows = document.querySelectorAll('#ordersTable tbody tr:not(#emptyRow)');
    const emptyRow = document.getElementById('emptyRow');

    function filterTable() {
        const search = searchInput.value.toLowerCase();
        const status = statusFilter.value;
        let visibleCount = 0;

        rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            const rowStatus = row.dataset.status;

            const matchSearch = text.includes(search);
            const matchStatus = !status || rowStatus === status;

            if (matchSearch && matchStatus) {
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
