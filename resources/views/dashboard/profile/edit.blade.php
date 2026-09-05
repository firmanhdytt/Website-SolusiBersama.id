@extends('layouts.dashboard')

@section('title', 'Edit Profil')

@section('content')
    <div class="max-w-5xl mx-auto">

        <!-- HEADER -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Profil</h1>
            <p class="text-sm text-gray-500">Perbarui informasi akun Anda</p>
        </div>

        <!-- CARD -->
        <form id="profileForm" method="POST" action="{{ route('dashboard.profile.update') }}" enctype="multipart/form-data"
            class="bg-white rounded-2xl shadow p-6 md:p-8 grid grid-cols-1 md:grid-cols-3 gap-8">

            @csrf

            <!-- LEFT: FOTO -->
            <div class="md:col-span-1 text-center">

                <img id="photoPreview" src="{{ auth()->user()->photo
        ? asset('images/profile/' . auth()->user()->photo)
        : asset('images/profile/default.png') }}"
                    class="w-32 h-32 rounded-full object-cover border-4 border-indigo-500 mx-auto">

                <label class="block mt-4 text-sm font-medium text-gray-600 cursor-pointer">
                    Ganti Foto
                    <input type="file" name="photo" class="hidden" onchange="previewPhoto(this)">
                </label>

                <p class="text-xs text-gray-400 mt-2">
                    JPG / PNG • Max 2MB
                </p>
            </div>

            <!-- RIGHT: FORM -->
            <div class="md:col-span-2 space-y-5">

                <div>
                    <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ auth()->user()->name }}" required
                        class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email" value="{{ auth()->user()->email }}" required
                        class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- ACTION -->
                <div class="flex gap-3 pt-4">
                    <button type="submit"
                        class="px-6 py-2.5 rounded-lg bg-indigo-500 text-white font-semibold hover:bg-indigo-600">
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('dashboard.profile') }}"
                        class="px-6 py-2.5 rounded-lg bg-gray-200 text-gray-700 font-semibold">
                        Batal
                    </a>
                </div>

            </div>
        </form>
    </div>

    <!-- SUCCESS MODAL -->
    <div id="successModal" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">
        <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-sm text-center">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">
                Berhasil
            </h3>
            <p id="successMessage" class="text-gray-600 mb-4">
                Profil berhasil diperbarui
            </p>
            <div class="text-sm text-gray-400">
                Mengalihkan ke halaman profil...
            </div>
        </div>
    </div>

    <!-- SCRIPT -->
    <script>
        /* preview foto */
        function previewPhoto(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    document.getElementById('photoPreview').src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        /* submit ajax */
        document.getElementById('profileForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch(this.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
                .then(res => {
                    if (!res.headers.get('content-type')?.includes('application/json')) {
                        throw new Error('Response bukan JSON (validasi gagal)');
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
                    alert('Gagal menyimpan profil. Periksa input Anda.');
                });
        });

        /* modal + redirect */
        function showSuccessModal(message) {
            const modal = document.getElementById('successModal');
            const text = document.getElementById('successMessage');

            text.innerText = message;

            modal.classList.remove('hidden');
            modal.classList.add('flex');

            setTimeout(() => {
                window.location.href = "{{ route('dashboard.profile') }}";
            }, 1500);
        }
    </script>
@endsection