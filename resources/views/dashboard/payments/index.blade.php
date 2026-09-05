@extends('layouts.dashboard')
@section('title', 'Pembayaran')

@section('content')

    {{-- ================= HEADER ================= --}}
    <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h2 class="text-3xl font-bold mb-1">Manajemen Pembayaran</h2>
            <p class="text-gray-500">
                Ringkasan dan histori pembayaran dari seluruh pesanan
            </p>
        </div>

        {{-- EXPORT --}}
        <a href="{{ route('payments.export') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg
                  bg-green-600 text-white text-sm font-semibold
                  hover:bg-green-700 transition">
            ⬇ Export Laporan
        </a>
    </div>

    {{-- ================= SUMMARY ================= --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">

        <div class="bg-white rounded-xl shadow p-4">
            <p class="text-xs text-gray-500">Total Pesanan</p>
            <p class="text-2xl font-bold">{{ $orders->count() }}</p>
        </div>

        <div class="bg-white rounded-xl shadow p-4">
            <p class="text-xs text-gray-500">Belum Bayar</p>
            <p class="text-2xl font-bold text-yellow-600">
                {{ $orders->where('status_pembayaran', 'belum')->count() }}
            </p>
        </div>

        <div class="bg-white rounded-xl shadow p-4">
            <p class="text-xs text-gray-500">DP</p>
            <p class="text-2xl font-bold text-blue-600">
                {{ $orders->where('status_pembayaran', 'dp')->count() }}
            </p>
        </div>

        <div class="bg-white rounded-xl shadow p-4">
            <p class="text-xs text-gray-500">Lunas</p>
            <p class="text-2xl font-bold text-green-600">
                {{ $orders->where('status_pembayaran', 'lunas')->count() }}
            </p>
        </div>

    </div>

    {{-- ================= FILTER & SEARCH ================= --}}
    <div class="bg-white rounded-xl shadow p-4 mb-6
                flex flex-col md:flex-row md:items-center gap-4">

        {{-- SEARCH --}}
        <div class="flex-1">
            <input type="text" id="searchInput" placeholder="Cari nama, email, layanan..." class="w-full border rounded-lg px-4 py-2.5
                          focus:ring-2 focus:ring-indigo-500">
        </div>

        {{-- FILTER STATUS --}}
        <div class="w-full md:w-56">
            <select id="statusFilter" class="w-full border rounded-lg px-3 py-2.5">
                <option value="all">Semua Status</option>
                <option value="belum">Belum Bayar</option>
                <option value="dp">DP</option>
                <option value="lunas">Lunas</option>
            </select>
        </div>

        {{-- COUNT --}}
        <div class="text-sm text-gray-500 whitespace-nowrap">
            <span id="resultCount">{{ $orders->count() }}</span> data ditampilkan
        </div>
    </div>

    {{-- ================= TABLE ================= --}}
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse" id="paymentTable">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-gray-600">Nama</th>
                        <th class="px-6 py-4 text-left text-gray-600">Total</th>
                        <th class="px-6 py-4 text-left text-gray-600">Dibayar</th>
                        <th class="px-6 py-4 text-left text-gray-600">Sisa</th>
                        <th class="px-6 py-4 text-left text-gray-600">Status</th>
                        <th class="px-6 py-4 text-center text-gray-600">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @foreach($orders as $order)
                        @php
                            $paid = $order->totalPaid();
                            $remaining = $order->remainingPayment();
                        @endphp

                        <tr class="payment-row hover:bg-gray-50 transition" data-status="{{ $order->status_pembayaran }}"
                            data-search="{{ strtolower($order->nama . ' ' . $order->email . ' ' . $order->layanan) }}">

                            {{-- NAMA --}}
                            <td class="px-6 py-4 font-semibold">
                                {{ $order->nama }}
                                <div class="text-xs text-gray-500">
                                    {{ $order->email }}
                                </div>
                            </td>

                            {{-- TOTAL --}}
                            <td class="px-6 py-4">
                                Rp {{ number_format($order->budget, 0, ',', '.') }}
                            </td>

                            {{-- PAID --}}
                            <td class="px-6 py-4 text-green-700 font-medium">
                                Rp {{ number_format($paid, 0, ',', '.') }}
                            </td>

                            {{-- SISA --}}
                            <td class="px-6 py-4 text-red-600 font-medium">
                                Rp {{ number_format($remaining, 0, ',', '.') }}
                            </td>

                            {{-- STATUS --}}
                            <td class="px-6 py-4">
                                @php
                                    $statusClass = match ($order->status_pembayaran) {
                                        'belum' => 'bg-yellow-100 text-yellow-700',
                                        'dp' => 'bg-blue-100 text-blue-700',
                                        'lunas' => 'bg-green-100 text-green-700',
                                    };
                                @endphp
                                <span class="px-3 py-1 rounded-full text-xs font-medium {{ $statusClass }}">
                                    {{ ucfirst($order->status_pembayaran) }}
                                </span>
                            </td>

                            {{-- AKSI --}}
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('payments.show', $order->id) }}" class="px-4 py-2 rounded-lg bg-blue-100 text-blue-700
                                              text-sm font-medium hover:bg-blue-200">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    <tr id="emptyRow" class="hidden">
                        <td colspan="6" class="text-center py-12 text-gray-400">
                            Data tidak ditemukan
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const rows = document.querySelectorAll('.payment-row');
        const resultCount = document.getElementById('resultCount');
        const emptyRow = document.getElementById('emptyRow');

        function filterTable() {
            let visible = 0;
            const keyword = searchInput.value.toLowerCase();
            const status = statusFilter.value;

            rows.forEach(row => {
                const rowText = row.dataset.search;
                const rowStatus = row.dataset.status;

                const matchText = rowText.includes(keyword);
                const matchStatus = status === 'all' || rowStatus === status;

                if (matchText && matchStatus) {
                    row.classList.remove('hidden');
                    visible++;
                } else {
                    row.classList.add('hidden');
                }
            });

            resultCount.textContent = visible;
            emptyRow.classList.toggle('hidden', visible !== 0);
        }

        searchInput.addEventListener('input', filterTable);
        statusFilter.addEventListener('change', filterTable);
    </script>
@endpush