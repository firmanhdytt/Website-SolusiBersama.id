@extends('layouts.dashboard')

@section('title', 'Profil Saya - Dashboard')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <!-- BREADCRUMB & HEADER -->
    <div>
        <nav class="flex text-xs text-slate-500 mb-2" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}" class="hover:text-indigo-600">Dashboard</a>
                </li>
                <li><span class="text-slate-400">/</span></li>
                <li class="font-medium text-slate-700">Profil Saya</li>
            </ol>
        </nav>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Profil Saya</h1>
        <p class="text-sm text-slate-500">Kelola informasi identitas akun, status hak akses, dan pengaturan keamanan Anda.</p>
    </div>

    <!-- MAIN PROFILE CONTAINER -->
    <div class="bg-white rounded-2xl shadow-xs border border-slate-200/80 overflow-hidden">
        <!-- Banner Background Header -->
        <div class="h-32 bg-gradient-to-r from-blue-600 via-brand-700 to-blue-900 relative">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-white/10 to-transparent"></div>
        </div>

        <div class="px-6 pb-8 -mt-14 relative">
            <!-- PROFILE TOP ROW -->
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 border-b border-slate-100 pb-6 mb-6">
                <div class="flex flex-col sm:flex-row items-center sm:items-end gap-5 text-center sm:text-left">
                    <!-- Avatar -->
                    <div class="relative">
                        <img src="{{ auth()->user()->photo && file_exists(public_path('images/profile/' . auth()->user()->photo))
                                ? asset('images/profile/' . auth()->user()->photo)
                                : asset('images/profile/default.png') }}"
                             alt="{{ auth()->user()->name }}"
                             class="w-28 h-28 rounded-2xl object-cover ring-4 ring-white shadow-lg bg-slate-100">
                        <span class="absolute bottom-1 right-1 w-4 h-4 bg-emerald-500 border-2 border-white rounded-full" title="Status: Aktif"></span>
                    </div>

                    <div class="mb-1">
                        <h2 class="text-xl font-bold text-slate-900">{{ auth()->user()->name }}</h2>
                        <p class="text-sm text-slate-500">{{ auth()->user()->email }}</p>
                        <div class="mt-2 flex flex-wrap justify-center sm:justify-start gap-2">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-semibold rounded-full bg-indigo-50 text-indigo-700 border border-indigo-200/60">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                {{ uppercase(auth()->user()->role ?? 'Admin') }}
                            </span>
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-medium rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200/60">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                Akun Aktif
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Quick Action Header Buttons -->
                <div class="flex items-center justify-center sm:justify-end gap-2.5">
                    <a href="{{ route('dashboard.profile.edit') }}"
                       class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-indigo-600 text-white text-sm font-semibold hover:bg-indigo-700 transition shadow-xs">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        Edit Profil
                    </a>
                    <a href="{{ route('dashboard.profile.password') }}"
                       class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-100 text-slate-700 text-sm font-medium hover:bg-slate-200 transition">
                        <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        Ubah Password
                    </a>
                </div>
            </div>

            <!-- DETAILS GRID -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Informasi Pribadi -->
                <div class="p-5 rounded-xl bg-slate-50/70 border border-slate-100 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400">Informasi Pribadi</h3>
                    <div class="space-y-3">
                        <div>
                            <p class="text-xs text-slate-500">Nama Lengkap</p>
                            <p class="text-sm font-semibold text-slate-800">{{ auth()->user()->name }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500">Alamat Email</p>
                            <p class="text-sm font-semibold text-slate-800">{{ auth()->user()->email }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500">Tanggal Bergabung</p>
                            <p class="text-sm font-semibold text-slate-800">
                                {{ auth()->user()->created_at ? auth()->user()->created_at->translatedFormat('d F Y') : '-' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Keamanan & Sistem -->
                <div class="p-5 rounded-xl bg-slate-50/70 border border-slate-100 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400">Keamanan & Perangkat</h3>
                    <div class="space-y-3">
                        <div>
                            <p class="text-xs text-slate-500">Perubahan Terakhir</p>
                            <p class="text-sm font-semibold text-slate-800">
                                {{ auth()->user()->updated_at ? auth()->user()->updated_at->translatedFormat('d F Y - H:i WIB') : '-' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500">Zona Waktu Regional</p>
                            <p class="text-sm font-semibold text-slate-800">Asia/Jakarta (WIB)</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500">Status Keamanan</p>
                            <span class="inline-flex items-center gap-1.5 text-xs font-medium text-emerald-700 bg-emerald-100/60 px-2.5 py-0.5 rounded-full mt-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Password Terproteksi (Bcrypt)
                            </span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- LOGOUT BOX -->
            <div class="mt-8 pt-6 border-t border-slate-100 flex items-center justify-between flex-wrap gap-4">
                <div class="text-xs text-slate-500">
                    Selesai bekerja? Amankan sesi Anda dengan keluar dari dashboard.
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-rose-50 text-rose-700 hover:bg-rose-100 hover:text-rose-800 text-xs font-semibold transition border border-rose-200/60">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Logout dari Sesi
                    </button>
                </form>
            </div>

        </div>
    </div>

</div>
@endsection
