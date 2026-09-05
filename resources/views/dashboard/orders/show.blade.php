@extends('layouts.dashboard')

@section('title', 'Detail Pesanan')

@section('content')

    {{-- ================= HEADER ================= --}}
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold mb-1">Detail Pesanan</h2>
            <p class="text-gray-500">Informasi lengkap pesanan pelanggan</p>
        </div>

        <a href="{{ route('orders.index') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg
                      border border-gray-200 text-gray-600 hover:bg-gray-100">
            ← Kembali
        </a>
    </div>

    {{-- ================= MAIN CARD ================= --}}
    <div class="bg-white rounded-xl shadow p-8 max-w-5xl space-y-10">

        {{-- ================= INFO PESANAN ================= --}}
        <div>
            <h3 class="text-lg font-semibold mb-6">Informasi Pesanan</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Nama</p>
                    <p class="font-semibold">{{ $order->nama }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 mb-1">Email</p>
                    <p class="font-semibold">{{ $order->email }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 mb-1">Telepon</p>
                    <p class="font-semibold">{{ $order->telepon ?? '-' }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 mb-1">Layanan</p>
                    <p class="font-semibold">{{ $order->layanan }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 mb-1">Budget</p>
                    <p class="font-semibold">
                        Rp {{ number_format($order->budget, 0, ',', '.') }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 mb-1">Deadline</p>
                    <p class="font-semibold">
                        {{ \Carbon\Carbon::parse($order->deadline)->translatedFormat('d F Y') }}
                    </p>
                </div>
            </div>
        </div>

        <hr>

        {{-- ================= PESAN ================= --}}
        <div>
            <p class="text-sm text-gray-500 mb-2">Pesan / Kebutuhan</p>
            <div class="p-4 bg-gray-100 rounded-lg min-h-[120px]">
                {{ $order->pesan }}
            </div>
        </div>

        <hr>

        {{-- ================= AKSI ================= --}}
        <div>
            <h3 class="text-lg font-semibold mb-4">Aksi Pesanan</h3>

            <div class="border rounded-xl p-5 space-y-3 max-w-md">
                <p class="font-medium">Ubah Status Pesanan</p>

                <select id="statusSelect" class="w-full border rounded-lg px-3 py-2">
                    @foreach (['pending', 'proses', 'selesai', 'batal'] as $status)
                        <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>

                <button onclick="updateStatus()" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                    Simpan Status
                </button>
            </div>
        </div>
    </div>

    {{-- ================= CENTER NOTIFICATION ================= --}}
    <div id="notifyOverlay" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40">

        <div id="notifyBox" class="bg-white rounded-2xl shadow-2xl px-8 py-6
                        text-center max-w-sm w-full scale-95 opacity-0 transition-all duration-200">

            <div id="notifyIcon" class="text-4xl mb-3">✅</div>

            <p id="notifyText" class="text-gray-800 font-medium">
                Berhasil
            </p>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        /* ===============================
           CENTER NOTIFICATION
        =============================== */
        function showNotify(message, type = 'success') {
            const overlay = document.getElementById('notifyOverlay');
            const box = document.getElementById('notifyBox');
            const text = document.getElementById('notifyText');
            const icon = document.getElementById('notifyIcon');

            text.innerText = message;

            if (type === 'success') {
                icon.innerText = '✅';
            } else {
                icon.innerText = '❌';
            }

            overlay.classList.remove('hidden');
            overlay.classList.add('flex');

            // animasi masuk
            setTimeout(() => {
                box.classList.remove('scale-95', 'opacity-0');
                box.classList.add('scale-100', 'opacity-100');
            }, 50);

            // auto close
            setTimeout(() => {
                box.classList.add('scale-95', 'opacity-0');
                setTimeout(() => {
                    overlay.classList.add('hidden');
                    overlay.classList.remove('flex');
                }, 200);
            }, 2000);
        }

        /* ===============================
           UPDATE STATUS PESANAN (AJAX)
        =============================== */
        function updateStatus() {
            fetch("{{ route('orders.updateStatus', $order->id) }}", {
                method: "PATCH",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    status: document.getElementById('statusSelect').value
                })
            })
                .then(res => {
                    if (!res.ok) throw new Error('Gagal memperbarui status pesanan');
                    return res.json();
                })
                .then(data => {
                    if (data.success) {
                        showNotify(data.message, 'success');
                    }
                })
                .catch(err => {
                    showNotify(err.message, 'error');
                });
        }
    </script>

@endpush