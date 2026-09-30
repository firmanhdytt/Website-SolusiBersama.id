@extends('layouts.dashboard')
@section('title', 'Detail Pesanan')

@section('content')

<div class="max-w-5xl mx-auto space-y-8">

    <!-- TOP HEADER BAR -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Detail Pesanan #ORD-{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</h2>
            <p class="text-xs text-slate-500 mt-1">Informasi lengkap kebutuhan proyek dan pemesan</p>
        </div>

        <a href="{{ route('orders.index') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-slate-200 bg-white text-slate-700 text-xs font-bold hover:bg-slate-50 transition">
            <span class="material-symbols-outlined text-[18px]">arrow_back</span>
            <span>Kembali ke Daftar</span>
        </a>
    </div>

    <!-- VISUAL WORKFLOW STEPPER BAR -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm">
        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4">Tahapan Proyek Pekerjaan</p>
        
        <div class="grid grid-cols-3 gap-4 text-center">
            <!-- STEP 1: PENDING -->
            <div class="p-3 rounded-xl border transition-all duration-300 {{ $order->status === 'pending' ? 'bg-amber-50 border-amber-300 text-amber-900 shadow-sm' : ($order->status === 'batal' ? 'bg-slate-50 border-slate-200 text-slate-400' : 'bg-emerald-50 border-emerald-200 text-emerald-800') }}">
                <div class="w-7 h-7 rounded-full flex items-center justify-center font-bold text-xs mx-auto mb-1.5 {{ $order->status === 'pending' ? 'bg-amber-500 text-white' : ($order->status === 'batal' ? 'bg-slate-300 text-slate-600' : 'bg-emerald-500 text-white') }}">
                    1
                </div>
                <p class="text-xs font-bold">Order Masuk (Pending)</p>
            </div>

            <!-- STEP 2: PROSES -->
            <div class="p-3 rounded-xl border transition-all duration-300 {{ $order->status === 'proses' ? 'bg-sky-50 border-sky-300 text-sky-900 shadow-sm' : ($order->status === 'selesai' ? 'bg-emerald-50 border-emerald-200 text-emerald-800' : 'bg-slate-50 border-slate-200 text-slate-400') }}">
                <div class="w-7 h-7 rounded-full flex items-center justify-center font-bold text-xs mx-auto mb-1.5 {{ $order->status === 'proses' ? 'bg-sky-500 text-white' : ($order->status === 'selesai' ? 'bg-emerald-500 text-white' : 'bg-slate-300 text-slate-600') }}">
                    2
                </div>
                <p class="text-xs font-bold">Dalam Pengerjaan (Proses)</p>
            </div>

            <!-- STEP 3: SELESAI -->
            <div class="p-3 rounded-xl border transition-all duration-300 {{ $order->status === 'selesai' ? 'bg-emerald-50 border-emerald-300 text-emerald-900 shadow-sm' : 'bg-slate-50 border-slate-200 text-slate-400' }}">
                <div class="w-7 h-7 rounded-full flex items-center justify-center font-bold text-xs mx-auto mb-1.5 {{ $order->status === 'selesai' ? 'bg-emerald-500 text-white' : 'bg-slate-300 text-slate-600' }}">
                    3
                </div>
                <p class="text-xs font-bold">Proyek Selesai</p>
            </div>
        </div>
    </div>

    <!-- MAIN GRID DETAIL (8 COLS / 4 COLS) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        <!-- LEFT COLUMN: INFORMASI UTAMA -->
        <div class="lg:col-span-8 space-y-6">

            <!-- PEMESAN & LAYANAN CARD -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm space-y-6">
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <h3 class="font-bold text-base text-slate-900">Informasi Pemesan & Layanan</h3>
                    <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-700 text-xs font-bold">
                        ID: #{{ $order->id }}
                    </span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Nama Pemesan</p>
                        <p class="text-sm font-bold text-slate-900">{{ $order->nama }}</p>
                    </div>

                    <div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Email</p>
                        <p class="text-sm font-bold text-slate-900">{{ $order->email }}</p>
                    </div>

                    <div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Nomor Telepon / WA</p>
                        <p class="text-sm font-bold text-slate-900 flex items-center gap-2">
                            <span>{{ $order->telepon ?? '-' }}</span>
                            @if($order->telepon)
                                @php $waNum = preg_replace('/[^0-9]/', '', $order->telepon); @endphp
                                <a href="https://wa.me/{{ $waNum }}" target="_blank" class="text-emerald-600 text-xs font-bold hover:underline">Chat WA →</a>
                            @endif
                        </p>
                    </div>

                    <div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Layanan Dipilih</p>
                        <span class="inline-block px-3 py-1 rounded-lg bg-brand-50 text-brand-700 text-xs font-bold">
                            {{ $order->layanan }}
                        </span>
                    </div>

                    <div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Nominal Budget</p>
                        <p class="text-lg font-extrabold text-slate-900">
                            Rp {{ number_format($order->budget, 0, ',', '.') }}
                        </p>
                    </div>

                    <div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Tenggat Waktu / Deadline</p>
                        <p class="text-sm font-bold text-slate-900">
                            {{ $order->deadline ? \Carbon\Carbon::parse($order->deadline)->translatedFormat('d F Y') : '-' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- PESAN / KEBUTUHAN PROYEK -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm space-y-3">
                <h3 class="font-bold text-base text-slate-900">Rincian Kebutuhan & Pesan</h3>
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/60 text-xs text-slate-700 leading-relaxed whitespace-pre-line font-medium min-h-[120px]">
                    {{ $order->pesan }}
                </div>
            </div>

        </div>

        <!-- RIGHT COLUMN: PANEL AKSI & PEMBAYARAN -->
        <div class="lg:col-span-4 space-y-6">

            <!-- UBAH STATUS PESANAN -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm space-y-4">
                <h3 class="font-bold text-base text-slate-900">Update Status Pesanan</h3>
                
                <div>
                    <label class="block text-xs font-bold text-slate-500 mb-2">Pilih Status Baru</label>
                    <select id="statusSelect" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-500">
                        @foreach (['pending', 'proses', 'selesai', 'batal'] as $st)
                            <option value="{{ $st }}" {{ $order->status === $st ? 'selected' : '' }}>
                                {{ ucfirst($st) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button onclick="updateStatus()" class="w-full py-2.5 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-bold text-xs shadow-md transition">
                    Simpan Status Pesanan
                </button>
            </div>

            <!-- RINGKASAN PEMBAYARAN -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm space-y-4">
                <h3 class="font-bold text-base text-slate-900">Status Pembayaran</h3>

                @php
                    $paid = $order->totalPaid();
                    $remaining = $order->remainingPayment();
                    $payStatusClass = match($order->status_pembayaran) {
                        'lunas' => 'bg-emerald-100 text-emerald-700',
                        'dp' => 'bg-sky-100 text-sky-700',
                        default => 'bg-amber-100 text-amber-700'
                    };
                @endphp

                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-500">Status Tagihan:</span>
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase {{ $payStatusClass }}">
                        {{ ucfirst($order->status_pembayaran) }}
                    </span>
                </div>

                <div class="space-y-2 text-xs">
                    <div class="flex justify-between">
                        <span class="text-slate-500">Total Tagihan:</span>
                        <strong class="text-slate-900">Rp {{ number_format($order->budget, 0, ',', '.') }}</strong>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-500">Sudah Dibayar:</span>
                        <strong class="text-emerald-600">Rp {{ number_format($paid, 0, ',', '.') }}</strong>
                    </div>
                    <div class="flex justify-between border-t border-slate-100 pt-2">
                        <span class="text-slate-500">Sisa Tagihan:</span>
                        <strong class="text-rose-600">Rp {{ number_format($remaining, 0, ',', '.') }}</strong>
                    </div>
                </div>

                <a href="{{ route('payments.show', $order->id) }}" class="block text-center w-full py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs transition">
                    Kelola Pembayaran →
                </a>
            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')
<script>
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
                const overlay = document.getElementById('notifyOverlay');
                const box = document.getElementById('notifyBox');
                document.getElementById('notifyText').innerText = data.message;
                
                overlay.classList.remove('hidden');
                overlay.classList.add('flex');
                setTimeout(() => {
                    box.classList.remove('scale-95', 'opacity-0');
                    box.classList.add('scale-100', 'opacity-100');
                }, 50);

                setTimeout(() => {
                    location.reload();
                }, 1200);
            }
        })
        .catch(err => {
            alert(err.message);
        });
    }
</script>
@endpush