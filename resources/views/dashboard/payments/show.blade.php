@extends('layouts.dashboard')
@section('title', 'Detail & Catat Pembayaran')

@section('content')

@php
    $totalPaid = $order->totalPaid();
    $remaining = $order->remainingPayment();
    $isLunas = $order->paymentStatus() === 'lunas';
    $percent = $order->budget > 0 ? min(100, round(($totalPaid / $order->budget) * 100)) : 0;
@endphp

<div class="max-w-5xl mx-auto space-y-8" x-data="{ proofModalOpen: false, currentProofUrl: '' }">

    <!-- HEADER BAR -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Detail Pembayaran Klien</h2>
            <p class="text-xs text-slate-500 mt-1">Order #ORD-{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }} — <strong class="text-slate-800">{{ $order->nama }}</strong></p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('payments.export.detail', $order->id) }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-md transition">
                <span class="material-symbols-outlined text-[18px]">download</span>
                <span>Export PDF Kwitansi</span>
            </a>
            <a href="{{ route('payments.index') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-slate-200 bg-white text-slate-700 font-bold text-xs hover:bg-slate-50 transition">
                <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                <span>Kembali</span>
            </a>
        </div>
    </div>

    <!-- PAYMENT PROGRESS BAR CARD -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm space-y-4">
        <div class="flex items-center justify-between">
            <div>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Persentase Pelunasan</span>
                <h3 class="text-lg font-extrabold text-slate-900 mt-0.5">{{ $percent }}% Terbayar</h3>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-bold uppercase {{ $isLunas ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                {{ ucfirst($order->status_pembayaran) }}
            </span>
        </div>

        <!-- PROGRESS BAR METRICS -->
        <div class="w-full bg-slate-100 rounded-full h-3.5 overflow-hidden">
            <div class="h-full bg-gradient-to-r from-brand-600 to-emerald-500 rounded-full transition-all duration-500" style="width: {{ $percent }}%"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs pt-2">
            <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-100">
                <p class="text-slate-400 font-bold uppercase text-[10px]">Total Tagihan</p>
                <p class="text-base font-extrabold text-slate-900 mt-1">Rp {{ number_format($order->budget, 0, ',', '.') }}</p>
            </div>
            <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-100">
                <p class="text-slate-400 font-bold uppercase text-[10px]">Total Dibayar</p>
                <p id="totalPaid" class="text-base font-extrabold text-emerald-600 mt-1">Rp {{ number_format($totalPaid, 0, ',', '.') }}</p>
            </div>
            <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-100">
                <p class="text-slate-400 font-bold uppercase text-[10px]">Sisa Tagihan</p>
                <p id="remainingPayment" class="text-base font-extrabold text-rose-600 mt-1">Rp {{ number_format($remaining, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>

    <!-- FORM CATAT PEMBAYARAN -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm space-y-6">
        <h3 class="font-bold text-base text-slate-900 border-b border-slate-100 pb-3">Form Catat Transaksi Pembayaran</h3>

        @if($isLunas)
            <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold flex items-center gap-3">
                <span class="material-symbols-outlined text-[24px]">verified</span>
                <span>Tagihan untuk pesanan ini telah **LUNAS**. Tidak ada sisa pembayaran yang perlu diinputkan.</span>
            </div>
        @else
            <form id="paymentForm" enctype="multipart/form-data" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    
                    <!-- METODE PEMBAYARAN -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Metode Pembayaran *</label>
                        <select name="method" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-500">
                            <option value="">-- Pilih Metode --</option>
                            <option value="transfer">Transfer Bank</option>
                            <option value="cash">Tunai / Cash</option>
                            <option value="qris">QRIS</option>
                            <option value="ewallet">E-Wallet (Gopay/Ovo/Dana)</option>
                        </select>
                    </div>

                    <!-- NOMINAL -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Nominal Bayar (Rp) *</label>
                        <input type="number" name="amount" min="1" max="{{ $remaining }}" id="amountInput" required
                               placeholder="Maksimal Rp {{ number_format($remaining, 0, ',', '.') }}"
                               class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>

                    <!-- UPLOAD BUKTI -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Upload Bukti Transfer / Nota (Opsional)</label>
                        <input type="file" name="proof" accept="image/*"
                               class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100">
                    </div>
                </div>

                <button id="submitBtn" type="submit" class="px-6 py-3 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-bold text-xs shadow-md transition flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">save</span>
                    <span>Simpan Transaksi Pembayaran</span>
                </button>
            </form>
        @endif
    </div>

    <!-- HISTORI PEMBAYARAN -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm space-y-4">
        <h3 class="font-bold text-base text-slate-900 border-b border-slate-100 pb-3">Histori Transaksi Pembayaran</h3>

        <div id="paymentHistory" class="space-y-3">
            @forelse($order->payments as $pay)
                <div class="p-4 rounded-xl border border-slate-200/60 bg-slate-50/50 flex items-center justify-between text-xs">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-emerald-100 text-emerald-700 font-bold flex items-center justify-center">
                            <span class="material-symbols-outlined text-[18px]">payments</span>
                        </div>
                        <div>
                            <p class="font-bold text-slate-900 text-sm">Rp {{ number_format($pay->amount, 0, ',', '.') }}</p>
                            <p class="text-slate-400 text-[11px] mt-0.5">
                                {{ strtoupper($pay->method) }} • {{ \Carbon\Carbon::parse($pay->paid_at)->translatedFormat('d F Y H:i') }}
                            </p>
                        </div>
                    </div>

                    @if($pay->proof)
                        <button @click="currentProofUrl = '{{ asset('uploads/payments/' . $pay->proof) }}'; proofModalOpen = true"
                                class="px-3 py-1.5 rounded-lg bg-brand-50 text-brand-600 hover:bg-brand-100 font-bold text-xs transition flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">visibility</span>
                            <span>Lihat Bukti</span>
                        </button>
                    @endif
                </div>
            @empty
                <div class="py-8 text-center text-slate-400">
                    <span class="material-symbols-outlined text-[36px] block mb-1">receipt</span>
                    <p class="text-xs">Belum ada transaksi pembayaran untuk pesanan ini</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- MODAL PREVIEW BUKTI TRANSFER -->
    <div x-show="proofModalOpen" 
         @click.away="proofModalOpen = false"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm" x-cloak>
        <div class="bg-white rounded-2xl shadow-2xl p-6 max-w-lg w-full space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h4 class="font-bold text-sm text-slate-900">Bukti Pembayaran Transaksi</h4>
                <button @click="proofModalOpen = false" class="text-slate-400 hover:text-slate-700">&times;</button>
            </div>

            <div class="flex justify-center bg-slate-100 rounded-xl p-2 max-h-96 overflow-hidden">
                <img :src="currentProofUrl" class="max-h-80 object-contain rounded-lg">
            </div>

            <div class="flex justify-end">
                <button @click="proofModalOpen = false" class="px-4 py-2 rounded-xl bg-slate-100 text-slate-700 font-bold text-xs hover:bg-slate-200">Tutup</button>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')
<script>
    const form = document.getElementById('paymentForm');

    if (form) {
        form.addEventListener('submit', async function (e) {
            e.preventDefault();

            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.innerText = 'Menyimpan Transaksi...';

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

                // RELOAD HALAMAN AGAR METRIK TERCATAT RAPI
                location.reload();

            } catch (err) {
                alert(err);
                submitBtn.disabled = false;
                submitBtn.innerText = 'Simpan Transaksi Pembayaran';
            }
        });
    }
</script>
@endpush