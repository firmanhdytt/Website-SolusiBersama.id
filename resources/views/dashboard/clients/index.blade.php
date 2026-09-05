@extends('layouts.dashboard')

@section('title', 'Data Klien')

@section('content')

{{-- ================= HEADER ================= --}}
<div class="mb-6">
    <h2 class="text-3xl font-bold mb-1">Data Klien</h2>
    <p class="text-gray-500">
        Ringkasan klien berdasarkan email unik
    </p>
</div>

{{-- ================= TOOLBAR ================= --}}
<div class="bg-white rounded-xl shadow p-4 mb-6 flex flex-col md:flex-row gap-4">

    {{-- SEARCH --}}
    <input
        type="text"
        id="searchClient"
        placeholder="Cari nama atau email klien..."
        class="w-full md:w-1/2 px-4 py-2 border rounded-lg
               focus:ring-2 focus:ring-indigo-500">

    {{-- FILTER STATUS --}}
    <select
        id="filterStatus"
        class="w-full md:w-1/4 px-4 py-2 border rounded-lg">
        <option value="">Semua Status</option>
        <option value="active">Active</option>
        <option value="dormant">Dormant</option>
    </select>

    {{-- SORT --}}
    <select
        id="sortClient"
        class="w-full md:w-1/4 px-4 py-2 border rounded-lg">
        <option value="deadline">Deadline Terdekat</option>
        <option value="total">Total Proyek Terbanyak</option>
    </select>

</div>

{{-- ================= GRID CLIENT CARDS ================= --}}
<div
    id="clientGrid"
    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

@foreach ($clients as $client)

    @php
        $initials = collect(explode(' ', $client->nama))
                        ->map(fn($w) => strtoupper(substr($w, 0, 1)))
                        ->take(2)
                        ->implode('');

        $isActive = $client->active_orders > 0;
    @endphp

    {{-- CARD --}}
    <div
        class="client-card bg-white rounded-2xl shadow p-5 flex flex-col justify-between"
        data-name="{{ strtolower($client->nama) }}"
        data-email="{{ strtolower($client->email) }}"
        data-status="{{ $isActive ? 'active' : 'dormant' }}"
        data-total="{{ $client->total_orders }}"
        data-deadline="{{ $client->nearest_deadline ?? '9999-12-31' }}"
    >

        {{-- TOP --}}
        <div>
            <div class="flex items-start justify-between mb-4">

                {{-- AVATAR --}}
                <div
                    class="w-10 h-10 rounded-full flex items-center justify-center font-semibold
                           {{ $isActive ? 'bg-indigo-100 text-indigo-700' : 'bg-gray-200 text-gray-600' }}">
                    {{ $initials }}
                </div>

                {{-- STATUS --}}
                <span
                    class="px-3 py-1 rounded-full text-xs font-medium
                           {{ $isActive ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                    {{ $isActive ? 'Active' : 'Dormant' }}
                </span>
            </div>

            {{-- NAME --}}
            <h3 class="font-semibold text-lg text-gray-800">
                {{ $client->nama }}
            </h3>

            <p class="text-sm text-gray-500 mt-1">
                {{ $client->email }}
            </p>

            <p class="text-sm text-gray-500 mt-1">
                {{ $client->telepon ?? '-' }}
            </p>

            {{-- SUMMARY --}}
            <div class="mt-4 text-sm text-gray-600 space-y-1">
                <p>📦 Total Proyek: <span class="font-medium">{{ $client->total_orders }}</span></p>
                <p>⚙️ Aktif: <span class="font-medium text-blue-600">{{ $client->active_orders }}</span></p>
                <p>
                    ⏰ Deadline:
                    <span class="font-medium">
                        {{ $client->nearest_deadline
                            ? \Carbon\Carbon::parse($client->nearest_deadline)->translatedFormat('d M Y')
                            : '-' }}
                    </span>
                </p>
            </div>
        </div>

        {{-- ACTION --}}
        <div class="mt-5">
            <a href="{{ route('clients.show', $client->email) }}"
               class="block text-center w-full px-4 py-2 rounded-xl
                      bg-indigo-600 text-white text-sm font-medium
                      hover:bg-indigo-700 transition">
                Lihat Detail
            </a>
        </div>

    </div>

@endforeach

</div>

{{-- ================= SCRIPT SEARCH & FILTER ================= --}}
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

@endsection
