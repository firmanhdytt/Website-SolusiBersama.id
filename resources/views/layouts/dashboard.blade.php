<!doctype html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">

    {{-- CSRF TOKEN (WAJIB UNTUK FETCH / AJAX) --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard - SolusiBersama')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        .sidebar-item.active {
            font-weight: 600;
            background: #e0e7ff;
        }

        .sidebar-item:hover {
            transform: translateX(4px);
            transition: .2s;
        }
    </style>

    @stack('styles')
</head>

<body class="h-full bg-slate-100 overflow-hidden">

    <div class="flex h-full">

        {{-- OVERLAY MOBILE --}}
        <div id="overlay" class="fixed inset-0 bg-black/40 z-30 hidden md:hidden" onclick="toggleSidebar()"></div>

        {{-- SIDEBAR --}}
        <aside id="sidebar" class="fixed md:static z-40 w-64 h-full bg-white border-r
                      transform -translate-x-full md:translate-x-0
                      transition-transform duration-300">

            <div class="p-6 flex flex-col h-full">

                {{-- LOGO --}}
                <div class="flex items-center space-x-2 mb-8">
                    <img src="/images//logo-hitam.png" class="w-10 h-10">
                    <div>
                        <h1 class="font-bold">SolusiBersama.id</h1>
                        {{-- <p class="text-xs text-gray-500">Dashboard</p> --}}
                    </div>
                </div>

                {{-- MENU UTAMA --}}
                <nav class="space-y-2 flex-1">

                    {{-- BERANDA --}}
                    <a href="{{ route('dashboard') }}" class="sidebar-item flex items-center px-4 py-3 rounded-lg
       {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        🏠 <span class="ml-3">Beranda</span>
                    </a>

                    {{-- PESANAN --}}
                    <a href="{{ route('orders.index') }}" class="sidebar-item flex items-center px-4 py-3 rounded-lg
       {{ request()->routeIs('orders.*') ? 'active' : '' }}">
                        📦 <span class="ml-3">Pesanan</span>
                    </a>

                    {{-- PEMBAYARAN --}}
                    <a href="{{ route('payments.index') }}" class="sidebar-item flex items-center px-4 py-3 rounded-lg
       {{ request()->is('dashboard/payments*') ? 'active' : '' }}">
                        💳 <span class="ml-3">Pembayaran</span>
                    </a>

                    {{-- TIMELINE PROYEK --}}
                    <a href="{{ route('calendar.timeline') }}" class="sidebar-item flex items-center px-4 py-3 rounded-lg
       {{ request()->routeIs('calendar.timeline') ? 'active' : '' }}">
                        📅 <span class="ml-3">Timeline Proyek</span>
                    </a>

                    {{-- DATA KLIEN --}}
                    <a href="{{ route('clients.index') }}" class="sidebar-item flex items-center px-4 py-3 rounded-lg
       {{ request()->routeIs('clients.*') ? 'active' : '' }}">
                        👥 <span class="ml-3">Data Klien</span>
                    </a>

                    {{-- LAPORAN --}}
                    <a href="{{ route('reports.index') }}" class="sidebar-item flex items-center px-4 py-3 rounded-lg
       {{ request()->routeIs('reports.*') ? 'active' : '' }}">
                        📊 <span class="ml-3">Laporan</span>
                    </a>

                </nav>


                {{-- PROFILE (BAWAH) --}}
                <div class="pt-4 border-t">
                    <a href="{{ route('dashboard.profile') }}" class="sidebar-item flex items-center px-4 py-3 rounded-lg
                              {{ request()->routeIs('dashboard.profile*') ? 'active' : '' }}">
                        👤 <span class="ml-3">Profil</span>
                    </a>
                </div>

            </div>
        </aside>

        {{-- CONTENT --}}
        <div class="flex-1 flex flex-col overflow-hidden">

            {{-- HEADER MOBILE --}}
            <header class="md:hidden bg-white border-b px-4 py-3 flex items-center gap-3">
                <button onclick="toggleSidebar()" class="text-xl">☰</button>
                <h2 class="font-semibold">Dashboard</h2>
            </header>

            {{-- MAIN --}}
            <main class="flex-1 overflow-y-auto p-4 md:p-8">
                @yield('content')
            </main>
        </div>

    </div>

    {{-- SIDEBAR SCRIPT --}}
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
            document.getElementById('overlay').classList.toggle('hidden');
        }
    </script>

    {{-- SUCCESS MODAL (GLOBAL) --}}
    <div id="successModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 backdrop-blur-sm">

        <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm p-6 text-center">
            <div class="flex justify-center mb-4">
                <div class="w-12 h-12 rounded-full bg-green-100 text-green-600
                            flex items-center justify-center text-2xl">
                    ✓
                </div>
            </div>

            <h3 class="text-lg font-semibold text-gray-800 mb-1">Berhasil</h3>
            <p id="successMessage" class="text-sm text-gray-600">
                Berhasil diproses
            </p>
        </div>
    </div>

    {{-- SCRIPT DARI HALAMAN (WAJIB ADA) --}}
    @stack('scripts')

</body>

</html>