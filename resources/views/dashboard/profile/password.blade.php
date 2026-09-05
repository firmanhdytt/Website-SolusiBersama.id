@extends('layouts.dashboard')

@section('title', 'Ubah Password')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Ubah Password</h1>
        <p class="text-sm text-gray-500">Perbarui kata sandi akun Anda demi keamanan</p>
    </div>

    @if(session('success'))
        <div class="p-4 bg-green-100 border border-green-200 text-green-700 rounded-xl text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow p-6 md:p-8">
        <form method="POST" action="{{ route('dashboard.profile.password.update') }}" class="space-y-6">
            @csrf

            <!-- PASSWORD LAMA -->
            <div>
                <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">
                    Password Saat Ini
                </label>
                <input type="password" name="current_password" id="current_password" required
                       class="w-full px-4 py-2.5 border rounded-xl focus:ring-2 focus:ring-indigo-500 @error('current_password') border-red-500 @enderror">
                @error('current_password')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- PASSWORD BARU -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    Password Baru
                </label>
                <input type="password" name="password" id="password" required
                       class="w-full px-4 py-2.5 border rounded-xl focus:ring-2 focus:ring-indigo-500 @error('password') border-red-500 @enderror">
                @error('password')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- KONFIRMASI PASSWORD BARU -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                    Konfirmasi Password Baru
                </label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                       class="w-full px-4 py-2.5 border rounded-xl focus:ring-2 focus:ring-indigo-500">
            </div>

            <!-- BUTTONS -->
            <div class="flex items-center justify-between pt-4 border-t">
                <a href="{{ route('dashboard.profile') }}"
                   class="px-5 py-2.5 text-sm font-medium text-gray-600 bg-gray-100 rounded-xl hover:bg-gray-200">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-2.5 text-sm font-semibold text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 shadow">
                    Simpan Password Baru
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
