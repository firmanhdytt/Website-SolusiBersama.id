<!doctype html>
<html lang="id" class="h-full bg-slate-50">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard - SolusiBersama.com')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN & Alpine.js -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        [x-cloak] { display: none !important; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>

    @stack('styles')
</head>

<body class="h-full font-sans antialiased text-slate-800 bg-slate-50 flex" x-data="{ sidebarOpen: false }">

    <!-- OVERLAY MOBILE -->
    <div x-show="sidebarOpen" 
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false" 
         class="fixed inset-0 z-40 bg-slate-900/60 backdrop-blur-sm lg:hidden" x-cloak></div>

    <!-- SIDEBAR -->
    <aside class="fixed inset-y-0 left-0 z-50 w-72 bg-white border-r border-slate-200/80 flex flex-col transition-transform duration-300 transform lg:translate-x-0 lg:static lg:z-auto"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

        <!-- BRAND LOGO HEADER -->
        <div class="h-20 px-6 flex items-center justify-between border-b border-slate-100">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-blue-50 border border-blue-100/80 flex items-center justify-center p-1.5 shadow-xs">
                    <img src="{{ asset('images/logo-biru.png') }}" alt="Logo SolusiBersama" class="w-full h-full object-contain">
                </div>
                <div>
                    <h1 class="font-bold text-slate-900 leading-tight tracking-tight text-base">Solusi<span class="text-brand-600">Bersama</span></h1>
                    <span class="inline-flex items-center gap-1 text-[10px] font-bold uppercase tracking-wider text-slate-400">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> ERP Panel v2.0
                    </span>
                </div>
            </a>
            <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-slate-600">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <!-- NAVIGATION MENU LINKS -->
        <nav class="flex-1 px-4 py-6 space-y-7 overflow-y-auto custom-scrollbar">

            <!-- UTAMA -->
            <div class="space-y-1">
                <p class="px-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Utama</p>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all duration-200
                          {{ request()->routeIs('dashboard') ? 'bg-brand-50 text-brand-600 font-semibold shadow-sm' : 'text-slate-600 hover:bg-slate-100/80 hover:text-slate-900' }}">
                    <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('dashboard') ? 'text-brand-600' : 'text-slate-400' }}">grid_view</span>
                    <span>Beranda Dashboard</span>
                </a>
            </div>

            <!-- OPERASIONAL -->
            <div class="space-y-1">
                <p class="px-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Operasional</p>
                
                <a href="{{ route('orders.index') }}"
                   class="flex items-center justify-between px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all duration-200
                          {{ request()->routeIs('orders.*') ? 'bg-brand-50 text-brand-600 font-semibold shadow-sm' : 'text-slate-600 hover:bg-slate-100/80 hover:text-slate-900' }}">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('orders.*') ? 'text-brand-600' : 'text-slate-400' }}">inventory_2</span>
                        <span>Pesanan</span>
                    </div>
                    @php $pendingCount = \App\Models\Order::where('status', 'pending')->count(); @endphp
                    @if($pendingCount > 0)
                        <span class="px-2 py-0.5 text-xs font-bold rounded-full bg-amber-100 text-amber-700">{{ $pendingCount }}</span>
                    @endif
                </a>

                <a href="{{ route('calendar.timeline') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all duration-200
                          {{ request()->routeIs('calendar.timeline') ? 'bg-brand-50 text-brand-600 font-semibold shadow-sm' : 'text-slate-600 hover:bg-slate-100/80 hover:text-slate-900' }}">
                    <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('calendar.timeline') ? 'text-brand-600' : 'text-slate-400' }}">calendar_today</span>
                    <span>Timeline Proyek</span>
                </a>
            </div>

            <!-- KEUANGAN -->
            <div class="space-y-1">
                <p class="px-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Keuangan</p>
                
                <a href="{{ route('payments.index') }}"
                   class="flex items-center justify-between px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all duration-200
                          {{ request()->is('dashboard/payments*') ? 'bg-brand-50 text-brand-600 font-semibold shadow-sm' : 'text-slate-600 hover:bg-slate-100/80 hover:text-slate-900' }}">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-[20px] {{ request()->is('dashboard/payments*') ? 'text-brand-600' : 'text-slate-400' }}">account_balance_wallet</span>
                        <span>Pembayaran</span>
                    </div>
                    @php $unpaidCount = \App\Models\Order::whereIn('status_pembayaran', ['belum', 'dp'])->count(); @endphp
                    @if($unpaidCount > 0)
                        <span class="px-2 py-0.5 text-xs font-bold rounded-full bg-rose-100 text-rose-700">{{ $unpaidCount }}</span>
                    @endif
                </a>

                <a href="{{ route('reports.index') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all duration-200
                          {{ request()->routeIs('reports.*') ? 'bg-brand-50 text-brand-600 font-semibold shadow-sm' : 'text-slate-600 hover:bg-slate-100/80 hover:text-slate-900' }}">
                    <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('reports.*') ? 'text-brand-600' : 'text-slate-400' }}">analytics</span>
                    <span>Laporan Bisnis</span>
                </a>
            </div>

            <!-- RELASI KLIEN -->
            <div class="space-y-1">
                <p class="px-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Relasi Klien</p>
                
                <a href="{{ route('clients.index') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all duration-200
                          {{ request()->routeIs('clients.*') ? 'bg-brand-50 text-brand-600 font-semibold shadow-sm' : 'text-slate-600 hover:bg-slate-100/80 hover:text-slate-900' }}">
                    <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('clients.*') ? 'text-brand-600' : 'text-slate-400' }}">group</span>
                    <span>Data Klien</span>
                </a>
            </div>

            <!-- PENGATURAN -->
            <div class="space-y-1">
                <p class="px-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Pengaturan</p>
                
                <a href="{{ route('dashboard.profile') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all duration-200
                          {{ request()->routeIs('dashboard.profile*') ? 'bg-brand-50 text-brand-600 font-semibold shadow-sm' : 'text-slate-600 hover:bg-slate-100/80 hover:text-slate-900' }}">
                    <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('dashboard.profile*') ? 'text-brand-600' : 'text-slate-400' }}">manage_accounts</span>
                    <span>Profil Pengguna</span>
                </a>
            </div>
        </nav>

        <!-- SIDEBAR FOOTER -->
        <div class="p-4 border-t border-slate-100">
            <div class="p-3 bg-slate-50 rounded-xl border border-slate-200/60 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                    </span>
                    <span class="text-xs font-semibold text-slate-700">Sistem Aktif</span>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-slate-400 hover:text-rose-600 p-1 transition" title="Logout">
                        <span class="material-symbols-outlined text-[20px]">logout</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- MAIN WRAPPER -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">

        <!-- TOP HEADER NAVBAR (STICKY) -->
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-200/80 sticky top-0 z-30 px-4 sm:px-8 flex items-center justify-between">

            <!-- LEFT: MOBILE TOGGLE & BREADCRUMB -->
            <div class="flex items-center gap-4">
                <button @click="sidebarOpen = true" class="lg:hidden p-2 rounded-xl text-slate-500 hover:bg-slate-100">
                    <span class="material-symbols-outlined">menu</span>
                </button>

                <div>
                    <h2 class="text-lg font-bold text-slate-900 tracking-tight leading-tight">
                        @yield('title', 'Dashboard')
                    </h2>
                    <div class="flex items-center gap-2 text-xs text-slate-400">
                        <a href="{{ route('dashboard') }}" class="hover:text-brand-600">Home</a>
                        <span>/</span>
                        <span class="text-slate-600 font-medium">@yield('title', 'Dashboard')</span>
                    </div>
                </div>
            </div>

            <!-- RIGHT: NOTIFICATIONS & USER DROPDOWN -->
            <div class="flex items-center gap-4">

                <!-- NOTIFICATION BELL DROPDOWN -->
                @php
                    $urgentNotifications = \App\Models\Order::whereIn('status', ['pending', 'proses'])
                        ->whereNotNull('deadline')
                        ->whereDate('deadline', '<=', now()->addDays(3))
                        ->orderBy('deadline', 'asc')
                        ->limit(5)
                        ->get();
                    $unreadNotifCount = $urgentNotifications->count();
                @endphp

                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" 
                            class="relative p-2.5 rounded-xl border border-slate-200/80 text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition">
                        <span class="material-symbols-outlined text-[22px]">notifications</span>
                        @if($unreadNotifCount > 0)
                            <span class="absolute -top-1 -right-1 flex h-4 w-4 items-center justify-center rounded-full bg-rose-500 text-[10px] font-bold text-white shadow-sm">
                                {{ $unreadNotifCount }}
                            </span>
                        @endif
                    </button>

                    <!-- DROPDOWN CONTENT -->
                    <div x-show="open" 
                         @click.away="open = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute right-0 mt-3 w-80 sm:w-96 rounded-2xl bg-white shadow-xl border border-slate-200/80 py-3 z-50" x-cloak>
                        
                        <div class="px-4 pb-3 border-b border-slate-100 flex items-center justify-between">
                            <h3 class="font-bold text-sm text-slate-900">Notifikasi Urgent</h3>
                            <span class="px-2 py-0.5 text-xs font-bold rounded-full bg-rose-100 text-rose-700">
                                {{ $unreadNotifCount }} Perlu Tindakan
                            </span>
                        </div>

                        <div class="max-h-80 overflow-y-auto divide-y divide-slate-100 custom-scrollbar">
                            @forelse($urgentNotifications as $notif)
                                @php
                                    $deadline = \Carbon\Carbon::parse($notif->deadline)->startOfDay();
                                    $today = now()->startOfDay();
                                    $isLate = $today->gt($deadline);
                                    $diffDays = $isLate ? $deadline->diffInDays($today) : $today->diffInDays($deadline);
                                @endphp
                                <a href="{{ route('orders.show', $notif->id) }}" class="block p-4 hover:bg-slate-50 transition">
                                    <div class="flex items-start gap-3">
                                        <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0 {{ $isLate ? 'bg-rose-100 text-rose-600' : 'bg-amber-100 text-amber-600' }}">
                                            <span class="material-symbols-outlined text-[18px]">{{ $isLate ? 'warning' : 'alarm' }}</span>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-xs font-bold text-slate-900 truncate">{{ $notif->nama }} – {{ $notif->layanan }}</p>
                                            <p class="text-[11px] text-slate-500 mt-0.5">
                                                @if($isLate)
                                                    <span class="text-rose-600 font-semibold">Terlambat {{ $diffDays }} hari</span> (Deadline: {{ $deadline->format('d/m/Y') }})
                                                @else
                                                    <span class="text-amber-600 font-semibold">Deadline {{ $diffDays == 0 ? 'Hari Ini' : $diffDays . ' Hari Lagi' }}</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="p-6 text-center text-slate-400">
                                    <span class="material-symbols-outlined text-[32px] text-slate-300 block mb-1">notifications_off</span>
                                    <p class="text-xs">Tidak ada notifikasi mendesak</p>
                                </div>
                            @endforelse
                        </div>

                        <div class="px-4 pt-3 border-t border-slate-100 text-center">
                            <a href="{{ route('orders.index') }}" class="text-xs font-bold text-brand-600 hover:text-brand-700">Lihat Semua Pesanan →</a>
                        </div>
                    </div>
                </div>

                <!-- USER PROFILE DROPDOWN -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center gap-3 p-1.5 pr-3 rounded-xl border border-slate-200/80 hover:bg-slate-100 transition">
                        <img src="{{ auth()->user()->photo && file_exists(public_path('images/profile/' . auth()->user()->photo)) ? asset('images/profile/' . auth()->user()->photo) : asset('images/profile/default.png') }}"
                             class="w-8 h-8 rounded-lg object-cover border border-slate-200">
                        <div class="hidden sm:block text-left">
                            <p class="text-xs font-bold text-slate-900 leading-tight">{{ auth()->user()->name }}</p>
                            <p class="text-[10px] font-semibold text-brand-600 uppercase tracking-wider">Administrator</p>
                        </div>
                        <span class="material-symbols-outlined text-slate-400 text-[18px]">expand_more</span>
                    </button>

                    <!-- DROPDOWN MENU -->
                    <div x-show="open" 
                         @click.away="open = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute right-0 mt-3 w-56 rounded-2xl bg-white shadow-xl border border-slate-200/80 py-2 z-50" x-cloak>
                        
                        <div class="px-4 py-2.5 border-b border-slate-100">
                            <p class="text-xs font-bold text-slate-900">{{ auth()->user()->name }}</p>
                            <p class="text-[11px] text-slate-500 truncate">{{ auth()->user()->email }}</p>
                        </div>

                        <div class="py-1">
                            <a href="{{ route('dashboard.profile') }}" class="flex items-center gap-2.5 px-4 py-2 text-xs font-medium text-slate-700 hover:bg-slate-100 hover:text-slate-900">
                                <span class="material-symbols-outlined text-[18px] text-slate-400">person</span>
                                <span>Profil Saya</span>
                            </a>
                            <a href="{{ route('dashboard.profile.edit') }}" class="flex items-center gap-2.5 px-4 py-2 text-xs font-medium text-slate-700 hover:bg-slate-100 hover:text-slate-900">
                                <span class="material-symbols-outlined text-[18px] text-slate-400">edit</span>
                                <span>Edit Profil</span>
                            </a>
                            <a href="{{ route('dashboard.profile.password') }}" class="flex items-center gap-2.5 px-4 py-2 text-xs font-medium text-slate-700 hover:bg-slate-100 hover:text-slate-900">
                                <span class="material-symbols-outlined text-[18px] text-slate-400">key</span>
                                <span>Ubah Password</span>
                            </a>
                        </div>

                        <div class="border-t border-slate-100 pt-1">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-2.5 px-4 py-2 text-xs font-bold text-rose-600 hover:bg-rose-50">
                                    <span class="material-symbols-outlined text-[18px]">logout</span>
                                    <span>Keluar / Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </header>

        <!-- CONTENT BODY -->
        <main class="flex-1 overflow-y-auto p-4 sm:p-8 custom-scrollbar">
            @yield('content')
        </main>
    </div>

    <!-- GLOBAL NOTIFICATION CENTER OVERLAY (FOR AJAX ACTIONS) -->
    <div id="notifyOverlay" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/40 backdrop-blur-sm">
        <div id="notifyBox" class="bg-white rounded-2xl shadow-2xl px-8 py-6 text-center max-w-sm w-full scale-95 opacity-0 transition-all duration-200 border border-slate-100">
            <div id="notifyIcon" class="w-14 h-14 rounded-full flex items-center justify-center text-3xl mx-auto mb-3 bg-emerald-100 text-emerald-600">✓</div>
            <h4 id="notifyTitle" class="text-base font-bold text-slate-900 mb-1">Berhasil</h4>
            <p id="notifyText" class="text-xs text-slate-600">Berhasil diproses</p>
        </div>
    </div>

    @stack('scripts')
</body>

</html>