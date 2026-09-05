@extends('layouts.dashboard')
@section('title', 'Detail Pembayaran')

@section('content')

    @php
        $totalPaid = $order->totalPaid();
        $remaining = $order->remainingPayment();
        $isLunas = $order->paymentStatus() === 'lunas';
    @endphp

    {{-- ================= HEADER ================= --}}
    <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold mb-1">Detail Pembayaran</h2>
            <p class="text-gray-500">
                Pembayaran untuk <span class="font-medium">{{ $order->nama }}</span>
            </p>
        </div>

        <a href="{{ route('payments.export.detail', $order->id) }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg
                              bg-green-600 text-white text-sm font-semibold hover:bg-green-700">
            ⬇ Export PDF
        </a>
    </div>

    {{-- ================= SUMMARY ================= --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">

        <div class="bg-white rounded-xl shadow p-4">
            <p class="text-xs text-gray-500">Total Tagihan</p>
            <p id="totalTagihan" class="text-xl font-bold">
                Rp {{ number_format($order->budget, 0, ',', '.') }}
            </p>
        </div>

        <div class="bg-white rounded-xl shadow p-4">
            <p class="text-xs text-gray-500">Sudah Dibayar</p>
            <p id="totalPaid" class="text-xl font-bold text-green-600">
                Rp {{ number_format($totalPaid, 0, ',', '.') }}
            </p>
        </div>

        <div class="bg-white rounded-xl shadow p-4">
            <p class="text-xs text-gray-500">Sisa Pembayaran</p>
            <p id="remainingPayment" class="text-xl font-bold text-red-600">
                Rp {{ number_format($remaining, 0, ',', '.') }}
            </p>
        </div>

    </div>

    {{-- ================= FORM PEMBAYARAN ================= --}}
    <div class="bg-white rounded-xl shadow p-6 mb-8">

        <h3 class="font-semibold text-lg mb-4">Tambah Pembayaran</h3>

        @if($isLunas)
            <div class="p-4 bg-green-50 text-green-700 rounded-lg">
                ✅ Pembayaran sudah <strong>LUNAS</strong>.
            </div>
        @else
            <form id="paymentForm" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-sm font-medium mb-1">Metode Pembayaran</label>
                        <select name="method" required class="w-full border rounded-lg px-3 py-2.5">
                            <option value="">-- Pilih Metode --</option>
                            <option value="transfer">Transfer</option>
                            <option value="cash">Cash</option>
                            <option value="qris">QRIS</option>
                            <option value="ewallet">E-Wallet</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Nominal</label>
                        <input type="number" name="amount" min="1" max="{{ $remaining }}" id="amountInput" required
                            class="w-full border rounded-lg px-3 py-2.5"
                            placeholder="Maks: {{ number_format($remaining, 0, ',', '.') }}">

                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-1">Bukti Pembayaran</label>
                        <input type="file" name="proof" accept="image/*" class="w-full border rounded-lg px-3 py-2.5">
                    </div>

                    <div class="md:col-span-2">
                        <button id="submitBtn" class="bg-green-600 text-white px-6 py-2.5 rounded-lg hover:bg-green-700">
                            Simpan Pembayaran
                        </button>
                    </div>

                </div>
            </form>
        @endif
    </div>

    {{-- ================= HISTORI ================= --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="font-semibold text-lg mb-4">Histori Pembayaran</h3>

        <div id="paymentHistory">
            @forelse($order->payments as $pay)
                <div class="border rounded-lg p-4 mb-3 flex justify-between">
                    <div>
                        <p class="font-medium">
                            Rp {{ number_format($pay->amount, 0, ',', '.') }}
                        </p>
                        <p class="text-sm text-gray-500">
                            {{ strtoupper($pay->method) }} •
                            {{ \Carbon\Carbon::parse($pay->paid_at)->translatedFormat('d F Y H:i') }}
                        </p>
                    </div>

                    @if($pay->proof)
                        <a href="{{ asset('uploads/payments/' . $pay->proof) }}" target="_blank" class="text-blue-600 text-sm">
                            Lihat Bukti
                        </a>
                    @endif
                </div>
            @empty
                <p class="text-center text-gray-400 py-6">
                    Belum ada histori pembayaran
                </p>
            @endforelse
        </div>
    </div>

    {{-- ================= NOTIFICATION ================= --}}
    <div id="notifyOverlay" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40">

        <div id="notifyBox" class="bg-white rounded-2xl shadow-2xl px-8 py-6
                        text-center max-w-sm w-full
                        scale-95 opacity-0 transition-all duration-200">

            <div id="notifyIcon" class="text-4xl mb-3">✅</div>

            <p id="notifyText" class="text-gray-800 font-medium">
                Berhasil
            </p>
        </div>
    </div>


@endsection

@push('scripts')
    <script>
        const form = document.getElementById('paymentForm');

        /* ===============================
           CENTER NOTIFICATION
        =============================== */
        function showNotify(message, type = 'success') {
            const overlay = document.getElementById('notifyOverlay');
            const box = document.getElementById('notifyBox');
            const text = document.getElementById('notifyText');
            const icon = document.getElementById('notifyIcon');

            text.innerText = message;
            icon.innerText = type === 'success' ? '✅' : '❌';

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
            }, 2500);
        }

        /* ===============================
           SUBMIT PAYMENT (AJAX)
        =============================== */
        if (form) {
            form.addEventListener('submit', async function (e) {
                e.preventDefault();

                const submitBtn = document.getElementById('submitBtn');
                submitBtn.disabled = true;
                submitBtn.innerText = 'Menyimpan...';

                const formData = new FormData(form);

                try {
                    const res = await fetch("{{ route('payments.store', $order->id) }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: formData
                    });

                    const data = await res.json();
                    if (!data.success) throw data.message;

                    // UPDATE SUMMARY
                    document.getElementById('totalPaid').innerText =
                        'Rp ' + data.data.total_paid.toLocaleString('id-ID');

                    document.getElementById('remainingPayment').innerText =
                        'Rp ' + data.data.remaining.toLocaleString('id-ID');

                    // TAMBAH HISTORI
                    const history = document.getElementById('paymentHistory');
                    history.insertAdjacentHTML('afterbegin', `
                        <div class="border rounded-lg p-4 mb-3 flex justify-between">
                            <div>
                                <p class="font-medium">Rp ${data.data.payment.amount}</p>
                                <p class="text-sm text-gray-500">
                                    ${data.data.payment.method} • ${data.data.payment.date}
                                </p>
                            </div>
                            ${data.data.payment.proof
                            ? `<a href="${data.data.payment.proof}" target="_blank"
                                     class="text-blue-600 text-sm">Lihat Bukti</a>`
                            : ''}
                        </div>
                    `);

                    form.reset();
                    showNotify(data.message, 'success');

                    // JIKA LUNAS → DISABLE FORM
                    if (data.data.status === 'lunas') {
                        form.innerHTML = `
                            <div class="p-4 bg-green-50 text-green-700 rounded-lg">
                                ✅ Pembayaran sudah <strong>LUNAS</strong>.
                            </div>
                        `;
                    }

                } catch (err) {
                    showNotify(err, 'error');
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.innerText = 'Simpan Pembayaran';
                }
            });
        }
    </script>

@endpush