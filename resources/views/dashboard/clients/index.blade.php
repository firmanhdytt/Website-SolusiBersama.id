@extends('layouts.dashboard')
@section('title', 'Data Klien & Direktori')

@section('content')

<div class="space-y-6">

    <!-- HEADER BAR -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Direktori Data Klien</h2>
            <p class="text-xs text-slate-500 mt-1">Daftar kontak klien unik berdasarkan email beserta histori pesanan</p>
        </div>
    </div>

    <!-- TOOLBAR SEARCH & SORT -->
    <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
        
        <!-- SEARCH -->
        <div class="relative flex-1 max-w-md">
            <span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]">search</span>
            <input type="text" id="searchClient" placeholder="Cari nama atau email klien..."
                   class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:bg-white transition">
        </div>

        <div class="flex items-center gap-3">
            <!-- FILTER STATUS -->
            <select id="filterStatus" class="bg-slate-50 border border-slate-200 text-xs font-bold text-slate-700 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">
                <option value="">Semua Status</option>
                <option value="active">Active (Ada Proyek)</option>
                <option value="dormant">Dormant (Selesai)</option>
            </select>

            <!-- SORT -->
            <select id="sortClient" class="bg-slate-50 border border-slate-200 text-xs font-bold text-slate-700 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">
                <option value="deadline">Deadline Terdekat</option>
                <option value="total">Total Proyek Terbanyak</option>
            </select>
        </div>

    </div>

    <!-- CLIENT CARDS GRID (3 COLUMNS) -->
    <div id="clientGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach ($clients as $client)
            @php
                $initials = collect(explode(' ', $client->nama))->map(fn($w) => strtoupper(substr($w, 0, 1)))->take(2)->implode('');
                $isActive = $client->active_orders > 0;
                $waNum = preg_replace('/[^0-9]/', '', $client->telepon ?? '');
            @endphp

            <div class="client-card bg-white rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-300 p-5 flex flex-col justify-between"
                 data-name="{{ strtolower($client->nama) }}"
                 data-email="{{ strtolower($client->email) }}"
                 data-status="{{ $isActive ? 'active' : 'dormant' }}"
                 data-total="{{ $client->total_orders }}"
                 data-deadline="{{ $client->nearest_deadline ?? '9999-12-31' }}">

                <div>
                    <!-- TOP HEADER CARD -->
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-11 h-11 rounded-2xl flex items-center justify-center font-extrabold text-sm {{ $isActive ? 'bg-brand-100 text-brand-700' : 'bg-slate-100 text-slate-600' }}">
                            {{ $initials }}
                        </div>

                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold border {{ $isActive ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : 'bg-slate-50 text-slate-600 border-slate-200' }}">
                            {{ $isActive ? 'Active' : 'Dormant' }}
                        </span>
                    </div>

                    <!-- NAMA & CONTACT -->
                    <h3 class="font-bold text-base text-slate-900 leading-snug">{{ $client->nama }}</h3>
                    <p class="text-xs text-slate-400 mt-0.5 truncate">{{ $client->email }}</p>
                    <p class="text-xs text-slate-600 mt-1 font-semibold">{{ $client->telepon ?? '-' }}</p>

                    <!-- METRICS -->
                    <div class="mt-4 pt-4 border-t border-slate-100 text-xs space-y-2">
                        <div class="flex justify-between">
                            <span class="text-slate-400">Total Proyek:</span>
                            <strong class="text-slate-900">{{ $client->total_orders }} Proyek</strong>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-400">Proyek Aktif:</span>
                            <strong class="text-brand-600">{{ $client->active_orders }} Berjalan</strong>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-400">Tenggat Terdekat:</span>
                            <strong class="text-slate-800">
                                {{ $client->nearest_deadline ? \Carbon\Carbon::parse($client->nearest_deadline)->translatedFormat('d M Y') : '-' }}
                            </strong>
                        </div>
                    </div>
                </div>

                <!-- ACTIONS -->
                <div class="mt-5 pt-4 border-t border-slate-100 flex items-center gap-2">
                    @if($waNum)
                        <a href="https://wa.me/{{ $waNum }}" target="_blank"
                           class="p-2.5 rounded-xl bg-emerald-50 text-emerald-700 hover:bg-emerald-100 font-bold transition" title="Chat WhatsApp">
                            <span class="material-symbols-outlined text-[18px]">chat</span>
                        </a>
                    @endif

                    <a href="{{ route('clients.show', $client->email) }}"
                       class="flex-1 block text-center py-2.5 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-bold text-xs shadow-md transition">
                        Lihat Detail Klien
                    </a>
                </div>

            </div>
        @endforeach

    </div>

</div>

@endsection

@push('scripts')
<script>
    const searchInput = document.getElementById('searchClient');
    const filterStatus = document.getElementById('filterStatus');
    const sortClient = document.getElementById('sortClient');
    const grid = document.getElementById('clientGrid');

    function applyFilter() {
        const search = searchInput.value.toLowerCase();
        const status = filterStatus.value;

        document.querySelectorAll('.client-card').forEach(card => {
            const name = card.dataset.name;
            const email = card.dataset.email;
            const cardStatus = card.dataset.status;

            const matchSearch = name.includes(search) || email.includes(search);
            const matchStatus = !status || cardStatus === status;

            card.style.display = matchSearch && matchStatus ? '' : 'none';
        });
    }

    function applySort() {
        const cards = Array.from(document.querySelectorAll('.client-card'));
        const type = sortClient.value;

        cards.sort((a, b) => {
            if (type === 'total') {
                return b.dataset.total - a.dataset.total;
            }
            return new Date(a.dataset.deadline) - new Date(b.dataset.deadline);
        });

        cards.forEach(card => grid.appendChild(card));
    }

    searchInput.addEventListener('input', applyFilter);
    filterStatus.addEventListener('change', applyFilter);
    sortClient.addEventListener('change', applySort);
</script>
@endpush
