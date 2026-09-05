@extends('layouts.dashboard')

@section('title', 'Profil Saya')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <!-- HEADER -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Profil Saya</h1>
        <p class="text-sm text-gray-500">
            Informasi akun dan pengaturan profil
        </p>
    </div>

    <!-- PROFILE CARD -->
    <div class="bg-white rounded-2xl shadow p-6 md:p-8">

        <div class="flex flex-col md:flex-row gap-8">

            <!-- FOTO -->
            <div class="md:w-1/4 text-center">
                <img
                    src="{{ auth()->user()->photo
                        ? asset('images/profile/' . auth()->user()->photo)
                        : asset('images/profile/default.png') }}"
                    class="w-32 h-32 rounded-full object-cover border-4 border-indigo-500 mx-auto">

                <p class="mt-3 text-xs text-gray-500">
                    Foto Profil
                </p>
            </div>

            <!-- INFO -->
            <div class="md:w-3/4 grid grid-cols-1 sm:grid-cols-2 gap-6">

                <!-- Nama -->
                <div>
                    <p class="text-xs text-gray-500">Nama Lengkap</p>
                    <p class="font-semibold text-gray-800">
                        {{ auth()->user()->name }}
                    </p>
                </div>

                <!-- Username -->
                <div>
                    <p class="text-xs text-gray-500">Username</p>
                    <p class="font-semibold text-gray-800">
                        {{ auth()->user()->username ?? '-' }}
                    </p>
                </div>

                <!-- Email -->
                <div>
                    <p class="text-xs text-gray-500">Email</p>
                    <p class="font-semibold text-gray-800">
                        {{ auth()->user()->email }}
                    </p>
                </div>

                <!-- Email Verification -->
                <div>
                    <p class="text-xs text-gray-500">Status Email</p>
                    @if(auth()->user()->email_verified_at)
                        <span class="inline-flex px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                            Terverifikasi
                        </span>
                    @else
                        <span class="inline-flex px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                            Belum Terverifikasi
                        </span>
                    @endif
                </div>

                <!-- Role -->
                <div>
                    <p class="text-xs text-gray-500">Role</p>
                    <p class="font-semibold text-gray-800">
                        Administrator
                    </p>
                </div>

                <!-- Status Akun -->
                <div>
                    <p class="text-xs text-gray-500">Status Akun</p>
                    <span class="inline-flex px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                        Aktif
                    </span>
                </div>

                <!-- Bergabung -->
                <div>
                    <p class="text-xs text-gray-500">Bergabung Sejak</p>
                    <p class="font-semibold text-gray-800">
                        {{ auth()->user()->created_at->translatedFormat('d F Y') }}
                    </p>
                </div>

                <!-- Update Terakhir -->
                <div>
                    <p class="text-xs text-gray-500">Profil Terakhir Diperbarui</p>
                    <p class="font-semibold text-gray-800">
                        {{ auth()->user()->updated_at->translatedFormat('d F Y H:i') }}
                    </p>
                </div>

                <!-- Zona Waktu -->
                <div>
                    <p class="text-xs text-gray-500">Zona Waktu</p>
                    <p class="font-semibold text-gray-800">
                        Asia / Jakarta (WIB)
                    </p>
                </div>

                <!-- Keamanan -->
                <div>
                    <p class="text-xs text-gray-500">Keamanan Akun</p>
                    <span class="inline-flex px-3 py-1 text-xs rounded-full bg-indigo-100 text-indigo-700">
                        Dilindungi Password
                    </span>
                </div>

            </div>
        </div>

        <!-- ACTION BOTTOM -->
        <div class="mt-10 border-t pt-6 flex flex-col sm:flex-row justify-between gap-3">

            <div class="flex flex-col sm:flex-row gap-3">
                <a href="{{ route('dashboard.profile.edit') }}"
                   class="inline-flex justify-center items-center px-6 py-2.5 rounded-lg
                          bg-indigo-500 text-white font-semibold hover:bg-indigo-600">
                    ✏️ Edit Profil
                </a>

                <a href="{{ route('dashboard.profile.password') }}"
                   class="inline-flex justify-center items-center px-6 py-2.5 rounded-lg
                          bg-gray-100 text-gray-700 font-semibold hover:bg-gray-200">
                    🔒 Ubah Password
                </a>
            </div>

            <!-- LOGOUT -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="inline-flex justify-center items-center px-6 py-2.5 rounded-lg
                               bg-red-100 text-red-600 font-semibold hover:bg-red-200">
                    🚪 Logout
                </button>
            </form>

        </div>
    </div>

</div>
@endsection
