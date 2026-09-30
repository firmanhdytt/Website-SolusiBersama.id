@extends('layouts.dashboard')

@section('title', 'Ubah Password - Dashboard')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">

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
                <li class="font-medium text-slate-700">Ubah Password</li>
            </ol>
        </nav>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Ubah Password</h1>
        <p class="text-sm text-slate-500">Perbarui kata sandi akun Anda secara berkala untuk menjaga keamanan data.</p>
    </div>

    @if(session('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl text-sm font-medium flex items-center gap-3">
            <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- FORM CARD -->
    <div class="bg-white rounded-2xl shadow-xs border border-slate-200/80 p-6 md:p-8">

        <form method="POST" action="{{ route('dashboard.profile.password.update') }}" class="space-y-6">
            @csrf

            <!-- PASSWORD LAMA -->
            <div>
                <label for="current_password" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">
                    Password Saat Ini
                </label>
                <input type="password" name="current_password" id="current_password" required placeholder="Masukkan password lama Anda"
                       class="w-full px-4 py-2.5 rounded-xl border @error('current_password') border-rose-500 focus:ring-rose-500 focus:border-rose-500 @else border-slate-300 focus:ring-indigo-500 focus:border-indigo-500 @enderror text-slate-900 text-sm transition">
                @error('current_password')
                    <p class="mt-1.5 text-xs text-rose-600 font-medium flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="border-t border-slate-100 pt-4 space-y-6">
                <!-- PASSWORD BARU -->
                <div>
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">
                        Password Baru
                    </label>
                    <input type="password" name="password" id="password" required placeholder="Minimal 8 karakter"
                           class="w-full px-4 py-2.5 rounded-xl border @error('password') border-rose-500 focus:ring-rose-500 focus:border-rose-500 @else border-slate-300 focus:ring-indigo-500 focus:border-indigo-500 @enderror text-slate-900 text-sm transition">
                    @error('password')
                        <p class="mt-1.5 text-xs text-rose-600 font-medium flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- KONFIRMASI PASSWORD BARU -->
                <div>
                    <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">
                        Konfirmasi Password Baru
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="Ulangi password baru"
                           class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-indigo-500 focus:border-indigo-500 text-slate-900 text-sm transition">
                </div>
            </div>

            <!-- REQUIREMENTS BOX -->
            <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 text-xs text-slate-500 space-y-1">
                <p class="font-semibold text-slate-700">Persyaratan Password:</p>
                <ul class="list-disc list-inside space-y-0.5">
                    <li>Minimal 8 karakter</li>
                    <li>Disarankan mengombinasikan huruf kapital, angka, dan simbol</li>
                    <li>Jangan gunakan password yang sama dengan situs lain</li>
                </ul>
            </div>

            <!-- BUTTONS -->
            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                <a href="{{ route('dashboard.profile') }}"
                   class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 text-sm font-semibold hover:bg-slate-50 transition">
                    Batal
                </a>
                <button type="submit"
                        class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-indigo-600 text-white text-sm font-semibold hover:bg-indigo-700 transition shadow-xs">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    Simpan Password Baru
                </button>
            </div>
        </form>

    </div>

</div>
@endsection
