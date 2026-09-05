@extends('layouts.dashboard')

@section('title', 'Pesanan')

@section('content')

    {{-- ================= HEADER ================= --}}
    <div class="mb-8 space-y-6">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="text-3xl font-bold mb-1">Manajemen Pesanan</h2>
                <p class="text-gray-500">Kelola semua pesanan pelanggan</p>
            </div>
        </div>

        {{-- ================= QUICK STATS ================= --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-white p-4 rounded-xl shadow">
                <p class="text-xs text-gray-500">Total Pesanan</p>
                <p class="text-2xl font-bold">{{ $orders->count() }}</p>
            </div>

            <div class="bg-white p-4 rounded-xl shadow">
                <p class="text-xs text-gray-500">Pending</p>
                <p class="text-2xl font-bold text-yellow-600">
                    {{ $orders->where('status', 'pending')->count() }}
                </p>
            </div>

            <div class="bg-white p-4 rounded-xl shadow">
                <p class="text-xs text-gray-500">Proses</p>
                <p class="text-2xl font-bold text-blue-600">
                    {{ $orders->where('status', 'proses')->count() }}
                </p>
            </div>

            <div class="bg-white p-4 rounded-xl shadow">
                <p class="text-xs text-gray-500">Selesai</p>
                <p class="text-2xl font-bold text-green-600">
                    {{ $orders->where('status', 'selesai')->count() }}
                </p>
            </div>
        </div>

        {{-- ================= TOOLBAR ================= --}}
        <div class="bg-white p-4 rounded-xl shadow flex flex-col md:flex-row gap-3">

            <input type="text" id="searchInput" placeholder="Cari nama / email / layanan..."
                class="w-full md:w-1/3 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">

            <select id="statusFilter" class="w-full md:w-1/4 px-4 py-2 border rounded-lg">
                <option value="">Semua Status</option>
                <option value="pending">Pending</option>
                <option value="proses">Proses</option>
                <option value="selesai">Selesai</option>
                <option value="batal">Batal</option>
            </select>

        </div>
    </div>

    {{-- ================= TABLE ================= --}}
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse" id="ordersTable">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left px-6 py-4 text-gray-600">Nama</th>
                        <th class="text-left px-6 py-4 text-gray-600">Layanan</th>
                        <th class="text-left px-6 py-4 text-gray-600">Tanggal</th>
                        <th class="text-left px-6 py-4 text-gray-600">Status</th>
                        <th class="text-center px-6 py-4 text-gray-600">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @foreach ($orders as $order)
                        <tr class="hover:bg-gray-50 transition" data-status="{{ $order->status }}">

                            {{-- NAMA --}}
                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-800">
                                    {{ $order->nama ?? $order->name ?? '-' }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $order->email }}
                                </div>
                            </td>

                            {{-- LAYANAN --}}
                            <td class="px-6 py-4 text-gray-700">
                                {{ $order->layanan ?? $order->service ?? '-' }}
                            </td>

                            {{-- TANGGAL --}}
                            <td class="px-6 py-4 text-gray-600">
                                {{ $order->created_at->translatedFormat('d F Y') }}
                            </td>

                            {{-- STATUS PESANAN --}}
                            <td class="px-6 py-4">
                                @php
                                    $statusClass = match ($order->status) {
                                        'pending' => 'bg-yellow-100 text-yellow-700',
                                        'proses' => 'bg-blue-100 text-blue-700',
                                        'selesai' => 'bg-green-100 text-green-700',
                                        'batal' => 'bg-red-100 text-red-700',
                                        default => 'bg-gray-100 text-gray-700',
                                    };
                                @endphp

                                <span class="inline-flex items-center px-3 py-1 rounded-full
                                     text-xs font-medium {{ $statusClass }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>

                            {{-- AKSI --}}
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('orders.show', $order->id) }}" class="inline-flex items-center px-4 py-2 rounded-lg
                                  bg-blue-100 text-blue-700 text-sm font-medium
                                  hover:bg-blue-200 transition">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    @if($orders->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center py-12 text-gray-400">
                                Belum ada pesanan
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>

    {{-- ================= SCRIPT ================= --}}
    <script>
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const rows = document.querySelectorAll('#ordersTable tbody tr');

        function filterTable() {
            const search = searchInput.value.toLowerCase();
            const status = statusFilter.value;

            rows.forEach(row => {
                const text = row.innerText.toLowerCase();
                const rowStatus = row.dataset.status;

                const matchSearch = text.includes(search);
                const matchStatus = !status || rowStatus === status;

                row.style.display = matchSearch && matchStatus ? '' : 'none';
            });
        }

        searchInput.addEventListener('input', filterTable);
        statusFilter.addEventListener('change', filterTable);
    </script>

@endsection
