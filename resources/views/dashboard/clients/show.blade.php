@extends('layouts.dashboard')

@section('title', 'Detail Klien')

@section('content')

{{-- ================= HEADER ================= --}}
<div class="mb-8">
    <h2 class="text-3xl font-bold mb-1">{{ $client->nama }}</h2>
    <p class="text-gray-500">
        {{ $client->email }} · {{ $client->telepon }}
    </p>
</div>

{{-- ================= STAT ================= --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">

    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-xs text-gray-500">Total Proyek</p>
        <p class="text-2xl font-bold">{{ $client->total_orders }}</p>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-xs text-gray-500">Proyek Aktif</p>
        <p class="text-2xl font-bold text-blue-600">
            {{ $client->active_orders }}
        </p>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-xs text-gray-500">Selesai</p>
        <p class="text-2xl font-bold text-green-600">
            {{ $client->done_orders }}
        </p>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-xs text-gray-500">Batal</p>
        <p class="text-2xl font-bold text-red-600">
            {{ $client->cancelled_orders }}
        </p>
    </div>

</div>

{{-- ================= ORDER HISTORY ================= --}}
<div class="bg-white rounded-xl shadow overflow-hidden">

    <div class="px-6 py-4 border-b">
        <h3 class="font-semibold text-lg">Histori Pesanan</h3>
        <p class="text-sm text-gray-500">
            Semua pesanan dari klien ini
        </p>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full min-w-[800px]">
            <thead class="bg-gray-50 text-sm text-gray-600">
                <tr>
                    <th class="px-6 py-4 text-left">Layanan</th>
                    <th class="px-6 py-4 text-left">Deadline</th>
                    <th class="px-6 py-4 text-left">Status</th>
                    <th class="px-6 py-4 text-left">Pembayaran</th>
                    <th class="px-6 py-4 text-left">Tanggal Order</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @foreach ($orders as $order)
                    <tr class="hover:bg-gray-50">

                        <td class="px-6 py-4 font-medium">
                            {{ $order->layanan }}
                        </td>

                        <td class="px-6 py-4 text-sm">
                            {{ \Carbon\Carbon::parse($order->deadline)->translatedFormat('d F Y') }}
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                {{ $order->status === 'selesai'
                                    ? 'bg-green-100 text-green-700'
                                    : ($order->status === 'proses'
                                        ? 'bg-blue-100 text-blue-700'
                                        : 'bg-yellow-100 text-yellow-700') }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                {{ $order->status_pembayaran === 'lunas'
                                    ? 'bg-green-100 text-green-700'
                                    : ($order->status_pembayaran === 'dp'
                                        ? 'bg-blue-100 text-blue-700'
                                        : 'bg-yellow-100 text-yellow-700') }}">
                                {{ ucfirst($order->status_pembayaran) }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('d F Y') }}
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
