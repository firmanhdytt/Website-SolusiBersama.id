@extends('layouts.dashboard')

@section('title', 'Edit Profil - Dashboard')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- BREADCRUMB & HEADER -->
    <div>
        <nav class="flex text-xs text-slate-500 mb-2" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}" class="hover:text-indigo-600">Dashboard</a>
                </li>
                <li><span class="text-slate-400">/</span></li>
                <li><a href="{{ route('dashboard.profile') }}" class="hover:text-indigo-600">Profil Saya</a></li>
                <li><span class="text-slate-400">/</span></li>
                <li class="font-medium text-slate-700">Edit Profil</li>
            </ol>
        </nav>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Edit Profil</h1>
        <p class="text-sm text-slate-500">Perbarui data identitas dan foto akun Anda.</p>
    </div>

    <!-- EDIT FORM CARD -->
    <div class="bg-white rounded-2xl shadow-xs border border-slate-200/80 p-6 md:p-8">

        <form id="profileForm" method="POST" action="{{ route('dashboard.profile.update') }}" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">

                <!-- LEFT: PHOTO UPLOAD -->
                <div class="md:col-span-1 flex flex-col items-center text-center p-6 bg-slate-50/80 rounded-2xl border border-slate-100">
                    <div class="relative group cursor-pointer" onclick="document.getElementById('photoInput').click()">
                        <img id="photoPreview"
                             src="{{ auth()->user()->photo ? asset('images/profile/' . auth()->user()->photo) : asset('images/profile/default.png') }}"
                             alt="Foto Profil"
                             class="w-36 h-36 rounded-2xl object-cover ring-4 ring-white shadow-md transition group-hover:opacity-80">
                        
                        <div class="absolute inset-0 bg-slate-900/40 rounded-2xl flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                    </div>

                    <input type="file" name="photo" id="photoInput" class="hidden" accept="image/png, image/jpeg, image/webp" onchange="previewPhoto(this)">

                    <button type="button" onclick="document.getElementById('photoInput').click()" class="mt-4 text-xs font-semibold text-indigo-600 hover:text-indigo-800">
                        Pilih Foto Baru
                    </button>
                    <p class="text-[11px] text-slate-400 mt-1">Format: JPG, PNG, WEBP (Max 2MB)</p>
                </div>

                <!-- RIGHT: FIELDS -->
                <div class="md:col-span-2 space-y-6">

                    <!-- Nama Lengkap -->
                    <div>
                        <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">Nama Lengkap</label>
                        <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" required
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-slate-900 text-sm transition">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">Alamat Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-slate-900 text-sm transition">
                        <p class="text-xs text-slate-400 mt-1">Email ini digunakan untuk login dan menerima notifikasi pesanan.</p>
                    </div>

                    <!-- Role (Readonly) -->
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">Role Akses</label>
                        <input type="text" value="{{ strtoupper(auth()->user()->role ?? 'Admin') }}" disabled
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-100 text-slate-500 text-sm cursor-not-allowed">
                    </div>

                </div>

            </div>

            <!-- ACTION BUTTONS -->
            <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('dashboard.profile') }}"
                   class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 text-sm font-semibold hover:bg-slate-50 transition">
                    Batal
                </a>
                <button type="submit" id="btnSubmit"
                        class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-indigo-600 text-white text-sm font-semibold hover:bg-indigo-700 transition shadow-xs">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Simpan Perubahan
                </button>
            </div>

        </form>

    </div>

</div>

<!-- SUCCESS MODAL -->
<div id="successModal" class="fixed inset-0 bg-slate-900/40 backdrop-blur-xs hidden items-center justify-center z-50 transition-all">
    <div class="bg-white rounded-2xl shadow-xl p-6 w-full max-w-sm text-center transform scale-95 transition-transform duration-200">
        <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        </div>
        <h3 class="text-lg font-bold text-slate-900 mb-1">Berhasil!</h3>
        <p id="successMessage" class="text-sm text-slate-600 mb-4">Profil berhasil diperbarui</p>
        <div class="flex items-center justify-center gap-2 text-xs text-indigo-600 font-medium">
            <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
            Mengalihkan ke halaman profil...
        </div>
    </div>
</div>

<script>
    function previewPhoto(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                document.getElementById('photoPreview').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    document.getElementById('profileForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const btn = document.getElementById('btnSubmit');
        btn.disabled = true;
        btn.innerHTML = `<svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Menyimpan...`;

        const formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        })
        .then(res => {
            if (!res.ok) {
                throw new Error('Gagal memperbarui profil');
            }
            return res.json();
        })
        .then(data => {
            if (data.status === 'success') {
                showSuccessModal(data.message);
            }
        })
        .catch(err => {
            console.error(err);
            alert('Gagal menyimpan profil. Silakan periksa kembali input data Anda.');
            btn.disabled = false;
            btn.innerHTML = `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Simpan Perubahan`;
        });
    });

    function showSuccessModal(message) {
        const modal = document.getElementById('successModal');
        const text = document.getElementById('successMessage');
        text.innerText = message;
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        setTimeout(() => {
            window.location.href = "{{ route('dashboard.profile') }}";
        }, 1200);
    }
</script>
@endsection