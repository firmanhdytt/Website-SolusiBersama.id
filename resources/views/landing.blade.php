@extends('layouts.app')

@section('title', 'SolusiBersama.com - Solusi Digital Terpercaya')

@section('content')
<!-- Header -->
<header class="fixed top-0 left-0 right-0 z-50 border-b border-border-dark bg-background-dark/80 backdrop-blur-md">

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-20">

      <!-- LOGO -->
      <a href="#" class="flex items-center gap-3">
        <div class="flex items-center justify-center w-10 h-10">
          <img src="/images/logo-putih.png" alt="SolusiBersama Icon" class="w-10 h-10">
        </div>
        <h2 class="text-white text-lg font-bold tracking-tight">
          SolusiBersama<span class="text-neutral-400">.com</span>
        </h2>
      </a>

      <!-- DESKTOP MENU -->
      <nav class="hidden md:flex items-center gap-8">
        <a href="#" class="text-neutral-400 hover:text-white text-sm font-medium transition-colors">
          Beranda
        </a>
        <a href="#about" class="text-neutral-400 hover:text-white text-sm font-medium transition-colors">
          Tentang Kami
        </a>
        <a href="#services" class="text-neutral-400 hover:text-white text-sm font-medium transition-colors">
          Layanan
        </a>
        <a href="#case-studies" class="text-neutral-400 hover:text-white text-sm font-medium transition-colors">
          Studi Kasus
        </a>
        <a href="#process" class="text-neutral-400 hover:text-white text-sm font-medium transition-colors">
          Cara Kerja
        </a>
        <a href="#faq" class="text-neutral-400 hover:text-white text-sm font-medium transition-colors">
          FAQ
        </a>
        <a href="#contact" class="text-neutral-400 hover:text-white text-sm font-medium transition-colors">
          Kontak
        </a>
      </nav>

      <!-- CTA + MOBILE -->
      <div class="flex items-center gap-4">

        <!-- LOGIN (DESKTOP) -->
        <a href="{{ route('login') }}"
          class="hidden md:flex items-center justify-center h-10 px-6 bg-white text-black text-sm font-bold rounded-lg hover:bg-neutral-200 transition">
          Login
        </a>

        <!-- MOBILE MENU BUTTON -->
        <button id="mobile-menu-button" class="md:hidden text-white">
          <span class="material-symbols-outlined">menu</span>
        </button>

      </div>
    </div>
  </div>

  <!-- MOBILE MENU -->
  <div id="mobile-menu" class="md:hidden hidden border-t border-border-dark bg-background-dark px-6 py-4 space-y-4">
    <a href="#" class="block text-neutral-400 hover:text-white transition">Beranda</a>
    <a href="#about" class="block text-neutral-400 hover:text-white transition">Tentang Kami</a>
    <a href="#services" class="block text-neutral-400 hover:text-white transition">Layanan</a>
    <a href="#case-studies" class="block text-neutral-400 hover:text-white transition">Studi Kasus</a>
    <a href="#process" class="block text-neutral-400 hover:text-white transition">Cara Kerja</a>
    <a href="#faq" class="block text-neutral-400 hover:text-white transition">FAQ</a>
    <a href="#contact" class="block text-neutral-400 hover:text-white transition">Kontak</a>

    <a href="{{ route('login') }}"
      class="block text-center bg-white text-black py-2 rounded-lg font-bold hover:bg-neutral-200 transition">
      Login
    </a>
  </div>

</header>

<!-- Hero Section -->
<main class="relative pt-20 md:pt-24 bg-background-dark">
  <div class="relative min-h-[85vh] flex flex-col justify-between overflow-hidden">

    <!-- BACKGROUND -->
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
      <!-- Glow -->
      <div
        class="absolute top-1/3 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-[650px] aspect-square bg-[radial-gradient(circle,rgba(255,255,255,0.06),transparent_70%)] opacity-80 blur-3xl">
      </div>

      <!-- Clean Grid Dot Texture -->
      <div class="absolute inset-0 opacity-15"
        style="background-image: radial-gradient(rgba(255,255,255,0.15) 1px, transparent 1px); background-size: 24px 24px;">
      </div>

      <!-- Subtle Bottom Fade -->
      <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-background-dark"></div>
    </div>

    <!-- CONTENT -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full pt-8 pb-16 md:pt-12 md:pb-24">
      <div class="flex flex-col items-center text-center max-w-4xl mx-auto gap-8">

        <!-- BADGE -->
        <div
          class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-neutral-800 bg-neutral-900/60 backdrop-blur">
          <span class="relative flex h-2 w-2">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
          </span>
          <span class="text-xs font-medium text-neutral-300 uppercase tracking-wider">
            Partner Digital Terpercaya
          </span>
        </div>

        <!-- TITLE -->
        <h1
          class="text-5xl md:text-7xl lg:text-8xl font-black text-white tracking-tight leading-[1.1] md:leading-[1.05]">
          Solusi Digital <br class="hidden md:block">
          <span class="text-transparent bg-clip-text bg-gradient-to-r from-neutral-200 to-neutral-500">
            Terbaik untuk Bisnis Anda
          </span>
        </h1>

        <!-- DESC -->
        <p class="text-lg md:text-xl text-neutral-400 max-w-2xl">
          Kami membantu bisnis tumbuh melalui website profesional, sistem digital, dan solusi teknologi yang dirancang untuk meningkatkan performa bisnis Anda.
        </p>

        <!-- CTA -->
        <div class="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto mt-6">

          <a href="#contact"
            class="w-full sm:w-auto h-14 px-8 rounded-lg bg-white text-black text-base font-bold hover:bg-neutral-200 transition transform hover:-translate-y-0.5 shadow-[0_0_20px_rgba(255,255,255,0.15)] flex items-center justify-center gap-2">
            <span>Konsultasikan Project</span>
            <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
          </a>

          <a href="#services"
            class="w-full sm:w-auto h-14 px-8 rounded-lg border border-neutral-800 bg-neutral-900/40 backdrop-blur text-white font-bold hover:bg-neutral-800 transition flex items-center justify-center">
            Lihat Layanan
          </a>

        </div>
      </div>
    </div>

    <!-- TRUST BAR -->
    <div class="relative mt-auto w-full border-t border-neutral-800/80 bg-neutral-900/80 backdrop-blur-md overflow-hidden z-10">
      <div class="trust-wrapper py-6">
        <div class="trust-track">
          <!-- ITEM SET -->
          <div class="trust-items">
            <div class="trust-item">
              <span class="material-symbols-outlined">code</span>
              <span>Web Development</span>
            </div>
            <span class="dot"></span>
            <div class="trust-item">
              <span class="material-symbols-outlined">brush</span>
              <span>Graphic Design</span>
            </div>
            <span class="dot"></span>
            <div class="trust-item">
              <span class="material-symbols-outlined">rocket_launch</span>
              <span>Digital Marketing</span>
            </div>
            <span class="dot"></span>
            <div class="trust-item">
              <span class="material-symbols-outlined">search</span>
              <span>SEO Optimization</span>
            </div>
            <span class="dot"></span>
          </div>

          <!-- DUPLIKASI 1 -->
          <div class="trust-items">
            <div class="trust-item">
              <span class="material-symbols-outlined">code</span>
              <span>Web Development</span>
            </div>
            <span class="dot"></span>
            <div class="trust-item">
              <span class="material-symbols-outlined">brush</span>
              <span>Graphic Design</span>
            </div>
            <span class="dot"></span>
            <div class="trust-item">
              <span class="material-symbols-outlined">rocket_launch</span>
              <span>Digital Marketing</span>
            </div>
            <span class="dot"></span>
            <div class="trust-item">
              <span class="material-symbols-outlined">search</span>
              <span>SEO Optimization</span>
            </div>
            <span class="dot"></span>
          </div>

          <!-- DUPLIKASI 2 -->
          <div class="trust-items">
            <div class="trust-item">
              <span class="material-symbols-outlined">code</span>
              <span>Web Development</span>
            </div>
            <span class="dot"></span>
            <div class="trust-item">
              <span class="material-symbols-outlined">brush</span>
              <span>Graphic Design</span>
            </div>
            <span class="dot"></span>
            <div class="trust-item">
              <span class="material-symbols-outlined">rocket_launch</span>
              <span>Digital Marketing</span>
            </div>
            <span class="dot"></span>
            <div class="trust-item">
              <span class="material-symbols-outlined">search</span>
              <span>SEO Optimization</span>
            </div>
            <span class="dot"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>


<!-- SECTION 2 — COMPANY PROFILE / ABOUT EXISTING -->
<section id="about" class="relative overflow-hidden py-14 border-t border-border-dark bg-background-dark">
  <div class="absolute inset-0 z-0">
    <div class="absolute -top-40 -left-40 w-[600px] h-[600px] bg-white/10 rounded-full blur-[140px]"></div>
    <div class="absolute top-1/3 -right-40 w-[500px] h-[500px] bg-white/5 rounded-full blur-[140px]"></div>
    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(rgba(255,255,255,0.2) 1px, transparent 1px); background-size: 3px 3px;"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-background-dark/40 to-background-dark"></div>
  </div>

  <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-3xl mx-auto mb-20">
      <h2 class="text-4xl md:text-5xl font-bold tracking-tight text-white mb-6">
        Tentang <span class="text-neutral-400">SolusiBersama.com</span>
      </h2>
      <p class="text-lg text-white/60 leading-relaxed">
        Kami adalah tim profesional yang berdedikasi untuk menghadirkan solusi digital
        berkualitas tinggi bagi pertumbuhan bisnis Anda.
      </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
      <!-- LEFT : VISI & MISI -->
      <div class="bg-surface-dark/80 backdrop-blur border border-border-dark rounded-2xl p-8 md:p-10 space-y-10">
        <div>
          <h3 class="text-2xl font-bold text-white mb-3">Visi Kami</h3>
          <p class="text-white/60 leading-relaxed">
            Menjadi mitra terpercaya dalam transformasi digital bisnis di Indonesia melalui solusi inovatif dan berkualitas tinggi.
          </p>
        </div>

        <div>
          <h3 class="text-2xl font-bold text-white mb-6">Misi Kami</h3>
          <ul class="space-y-4">
            <li class="flex items-start gap-4">
              <span class="material-symbols-outlined text-green-400 mt-1">check_circle</span>
              <span class="text-white/70">Memberikan layanan digital berkualitas tinggi</span>
            </li>
            <li class="flex items-start gap-4">
              <span class="material-symbols-outlined text-purple-400 mt-1">check_circle</span>
              <span class="text-white/70">Membantu bisnis meningkatkan kehadiran online</span>
            </li>
            <li class="flex items-start gap-4">
              <span class="material-symbols-outlined text-orange-400 mt-1">check_circle</span>
              <span class="text-white/70">Memberikan solusi sesuai kebutuhan klien</span>
            </li>
            <li class="flex items-start gap-4">
              <span class="material-symbols-outlined text-pink-400 mt-1">check_circle</span>
              <span class="text-white/70">Mengikuti perkembangan teknologi terbaru</span>
            </li>
          </ul>
        </div>
      </div>

      <!-- RIGHT : WHY CHOOSE US -->
      <div class="space-y-8">
        <h3 class="text-3xl font-bold text-white mb-4">
          Mengapa Memilih Kami?
        </h3>

        <div class="space-y-6">
          <div class="flex items-start gap-5">
            <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center">
              <span class="material-symbols-outlined text-blue-400">verified</span>
            </div>
            <div>
              <h4 class="text-lg font-semibold text-white">Kualitas Terjamin</h4>
              <p class="text-white/60 text-sm">Kami mengutamakan kualitas dalam setiap proyek yang kami kerjakan.</p>
            </div>
          </div>

          <div class="flex items-start gap-5">
            <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center">
              <span class="material-symbols-outlined text-green-400">schedule</span>
            </div>
            <div>
              <h4 class="text-lg font-semibold text-white">Tepat Waktu</h4>
              <p class="text-white/60 text-sm">Komitmen kami adalah menyelesaikan proyek sesuai timeline.</p>
            </div>
          </div>

          <div class="flex items-start gap-5">
            <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center">
              <span class="material-symbols-outlined text-purple-400">groups</span>
            </div>
            <div>
              <h4 class="text-lg font-semibold text-white">Tim Profesional</h4>
              <p class="text-white/60 text-sm">Tim berpengalaman dan ahli di bidangnya masing-masing.</p>
            </div>
          </div>

          <div class="flex items-start gap-5">
            <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center">
              <span class="material-symbols-outlined text-orange-400">support_agent</span>
            </div>
            <div>
              <h4 class="text-lg font-semibold text-white">Dukungan Responsif</h4>
              <p class="text-white/60 text-sm">Kami siap membantu Anda dengan respons cepat dan profesional.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- SECTION 3 — LAYANAN EXISTING (DENGAN TOMBOL LIHAT DETAIL) -->
<section id="services" class="bg-background-dark py-14 border-t border-border-dark">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

      <!-- LEFT HEADER -->
      <div class="flex flex-col gap-5 md:gap-6 md:sticky md:top-32">
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white tracking-tight leading-snug md:leading-tight">
          Layanan Unggulan
          <span class="block text-neutral-500">Untuk Pertumbuhan Bisnis</span>
        </h2>
        <p class="text-neutral-400 text-base sm:text-lg max-w-full md:max-w-lg">
          Kami menyediakan berbagai layanan digital utama untuk membantu bisnis Anda berkembang secara berkelanjutan.
        </p>
      </div>

      <!-- RIGHT CARDS -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

        <!-- 1. WEBSITE -->
        <div class="group p-6 rounded-xl bg-surface-dark border border-border-dark hover:border-neutral-600 hover:bg-[#1f1f1f] transition flex flex-col justify-between">
          <div>
            <div class="w-12 h-12 rounded-lg bg-neutral-800 flex items-center justify-center text-white mb-6 group-hover:bg-white group-hover:text-black transition">
              <span class="material-symbols-outlined">language</span>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">Pembuatan Website</h3>
            <p class="text-neutral-400 text-sm mb-6">
              Website profesional, responsif, dan cepat sesuai kebutuhan bisnis Anda.
            </p>
          </div>
          <div class="flex justify-between items-center pt-4 border-t border-neutral-800">
            <span class="text-neutral-300 font-semibold text-xs sm:text-sm">Mulai <br> Rp 2.500.000</span>
            <div class="flex items-center gap-2">
              <a href="{{ route('services.website') }}" class="text-xs px-3 py-2 border border-neutral-700 text-neutral-300 rounded-lg font-medium hover:border-white hover:text-white transition">
                Lihat Detail
              </a>
              <button class="order-btn text-xs px-3 py-2 bg-white text-black rounded-lg font-semibold hover:bg-neutral-200 transition" data-service="website">
                Pesan
              </button>
            </div>
          </div>
        </div>

        <!-- 2. DESIGN -->
        <div class="group p-6 rounded-xl bg-surface-dark border border-border-dark hover:border-neutral-600 hover:bg-[#1f1f1f] transition flex flex-col justify-between">
          <div>
            <div class="w-12 h-12 rounded-lg bg-neutral-800 flex items-center justify-center text-white mb-6 group-hover:bg-white group-hover:text-black transition">
              <span class="material-symbols-outlined">design_services</span>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">Desain Grafis</h3>
            <p class="text-neutral-400 text-sm mb-6">
              Desain visual profesional untuk branding dan promosi bisnis Anda.
            </p>
          </div>
          <div class="flex justify-between items-center pt-4 border-t border-neutral-800">
            <span class="text-neutral-300 font-semibold text-xs sm:text-sm">Mulai <br> Rp 500.000</span>
            <div class="flex items-center gap-2">
              <a href="{{ route('services.graphic-design') }}" class="text-xs px-3 py-2 border border-neutral-700 text-neutral-300 rounded-lg font-medium hover:border-white hover:text-white transition">
                Lihat Detail
              </a>
              <button class="order-btn text-xs px-3 py-2 bg-white text-black rounded-lg font-semibold hover:bg-neutral-200 transition" data-service="design">
                Pesan
              </button>
            </div>
          </div>
        </div>

        <!-- 3. MARKETING -->
        <div class="group p-6 rounded-xl bg-surface-dark border border-border-dark hover:border-neutral-600 hover:bg-[#1f1f1f] transition flex flex-col justify-between">
          <div>
            <div class="w-12 h-12 rounded-lg bg-neutral-800 flex items-center justify-center text-white mb-6 group-hover:bg-white group-hover:text-black transition">
              <span class="material-symbols-outlined">campaign</span>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">Digital Marketing</h3>
            <p class="text-neutral-400 text-sm mb-6">
              Strategi pemasaran digital untuk meningkatkan penjualan.
            </p>
          </div>
          <div class="flex justify-between items-center pt-4 border-t border-neutral-800">
            <span class="text-neutral-300 font-semibold text-xs sm:text-sm">Mulai <br>Rp 1.500.000</span>
            <div class="flex items-center gap-2">
              <a href="{{ route('services.digital-marketing') }}" class="text-xs px-3 py-2 border border-neutral-700 text-neutral-300 rounded-lg font-medium hover:border-white hover:text-white transition">
                Lihat Detail
              </a>
              <button class="order-btn text-xs px-3 py-2 bg-white text-black rounded-lg font-semibold hover:bg-neutral-200 transition" data-service="marketing">
                Pesan
              </button>
            </div>
          </div>
        </div>

        <!-- 4. APP -->
        <div class="group p-6 rounded-xl bg-surface-dark border border-border-dark hover:border-neutral-600 hover:bg-[#1f1f1f] transition flex flex-col justify-between">
          <div>
            <div class="w-12 h-12 rounded-lg bg-neutral-800 flex items-center justify-center text-white mb-6 group-hover:bg-white group-hover:text-black transition">
              <span class="material-symbols-outlined">terminal</span>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">Pengembangan Aplikasi</h3>
            <p class="text-neutral-400 text-sm mb-6">
              Aplikasi web & mobile yang scalable dan aman.
            </p>
          </div>
          <div class="flex justify-between items-center pt-4 border-t border-neutral-800">
            <span class="text-neutral-300 font-semibold text-xs sm:text-sm">Mulai <br> Rp 5.000.000</span>
            <div class="flex items-center gap-2">
              <a href="{{ route('services.application') }}" class="text-xs px-3 py-2 border border-neutral-700 text-neutral-300 rounded-lg font-medium hover:border-white hover:text-white transition">
                Lihat Detail
              </a>
              <button class="order-btn text-xs px-3 py-2 bg-white text-black rounded-lg font-semibold hover:bg-neutral-200 transition" data-service="app">
                Pesan
              </button>
            </div>
          </div>
        </div>

        <!-- 5. VIDEO -->
        <div class="group p-6 rounded-xl bg-surface-dark border border-border-dark hover:border-neutral-600 hover:bg-[#1f1f1f] transition flex flex-col justify-between">
          <div>
            <div class="w-12 h-12 rounded-lg bg-neutral-800 flex items-center justify-center text-white mb-6 group-hover:bg-white group-hover:text-black transition">
              <span class="material-symbols-outlined">videocam</span>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">Video Marketing</h3>
            <p class="text-neutral-400 text-sm mb-6">
              Video promosi profesional untuk meningkatkan engagement.
            </p>
          </div>
          <div class="flex justify-between items-center pt-4 border-t border-neutral-800">
            <span class="text-neutral-300 font-semibold text-xs sm:text-sm">Mulai <br> Rp 3.000.000</span>
            <div class="flex items-center gap-2">
              <a href="{{ route('services.video') }}" class="text-xs px-3 py-2 border border-neutral-700 text-neutral-300 rounded-lg font-medium hover:border-white hover:text-white transition">
                Lihat Detail
              </a>
              <button class="order-btn text-xs px-3 py-2 bg-white text-black rounded-lg font-semibold hover:bg-neutral-200 transition" data-service="video">
                Pesan
              </button>
            </div>
          </div>
        </div>

        <!-- 6. SEO -->
        <div class="group p-6 rounded-xl bg-surface-dark border border-border-dark hover:border-neutral-600 hover:bg-[#1f1f1f] transition flex flex-col justify-between">
          <div>
            <div class="w-12 h-12 rounded-lg bg-neutral-800 flex items-center justify-center text-white mb-6 group-hover:bg-white group-hover:text-black transition">
              <span class="material-symbols-outlined">search</span>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">SEO & Optimasi</h3>
            <p class="text-neutral-400 text-sm mb-6">
              Optimasi website agar tampil di halaman pertama Google.
            </p>
          </div>
          <div class="flex justify-between items-center pt-4 border-t border-neutral-800">
            <span class="text-neutral-300 font-semibold text-xs sm:text-sm">Mulai <br> Rp 1.000.000</span>
            <div class="flex items-center gap-2">
              <a href="{{ route('services.seo') }}" class="text-xs px-3 py-2 border border-neutral-700 text-neutral-300 rounded-lg font-medium hover:border-white hover:text-white transition">
                Lihat Detail
              </a>
              <button class="order-btn text-xs px-3 py-2 bg-white text-black rounded-lg font-semibold hover:bg-neutral-200 transition" data-service="seo">
                Pesan
              </button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>


<!-- SECTION 4 — STUDI KASUS (NEW) -->
<section id="case-studies" class="relative bg-background-dark py-16 border-t border-border-dark overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-neutral-800 bg-neutral-900/60 backdrop-blur mb-4">
        <span class="w-2 h-2 rounded-full bg-blue-500"></span>
        <span class="text-xs font-semibold uppercase tracking-wider text-neutral-300">Studi Kasus Proyek</span>
      </div>
      <h2 class="text-3xl md:text-5xl font-bold tracking-tight text-white mb-4">
        Bagaimana Kami Membantu Klien Tumbuh
      </h2>
      <p class="text-neutral-400 text-lg">
        Pendekatan terstruktur dalam menyelesaikan berbagai kebutuhan digital bisnis secara efektif dan efisien.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Case 1: Website Company Profile -->
      <div class="p-6 rounded-2xl bg-surface-dark border border-border-dark hover:border-neutral-700 transition flex flex-col justify-between space-y-6">
        <div>
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full bg-blue-500/10 text-blue-400 border border-blue-500/20">Website</span>
            <span class="text-xs text-neutral-500">Company Profile</span>
          </div>
          <h3 class="text-xl font-bold text-white mb-3">Redesain Website Modern Perusahaan</h3>
          <div class="space-y-3 text-sm text-neutral-400">
            <div>
              <strong class="text-white block mb-1">Tantangan:</strong>
              Website lama kurang responsif dan informasi layanan sulit ditemukan calon pelanggan.
            </div>
            <div>
              <strong class="text-white block mb-1">Solusi:</strong>
              Membangun website responsif berkecepatan tinggi dengan struktur informasi jernih dan integrasi WhatsApp.
            </div>
            <div>
              <strong class="text-white block mb-1">Hasil:</strong>
              Memudahkan calon pelanggan menghubungi tim penjualan dan meningkatkan profesionalitas brand.
            </div>
          </div>
        </div>
        <div class="pt-4 border-t border-neutral-800 flex items-center justify-between">
          <a href="{{ route('services.website') }}" class="text-sm font-semibold text-white hover:text-neutral-300 flex items-center gap-1">
            <span>Lihat Layanan Website</span>
            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
          </a>
        </div>
      </div>

      <!-- Case 2: Sistem Informasi Internal -->
      <div class="p-6 rounded-2xl bg-surface-dark border border-border-dark hover:border-neutral-700 transition flex flex-col justify-between space-y-6">
        <div>
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Aplikasi</span>
            <span class="text-xs text-neutral-500">Sistem Manufaktur</span>
          </div>
          <h3 class="text-xl font-bold text-white mb-3">Sistem Operasional & Dashboard Manajemen</h3>
          <div class="space-y-3 text-sm text-neutral-400">
            <div>
              <strong class="text-white block mb-1">Tantangan:</strong>
              Pencatatan data pesanan dan penagihan proyek masih manual menggunakan spreadsheet terpisah.
            </div>
            <div>
              <strong class="text-white block mb-1">Solusi:</strong>
              Mengembangkan aplikasi web internal terpusat dengan modul pesanan, piutang, dan timeline otomatis.
            </div>
            <div>
              <strong class="text-white block mb-1">Hasil:</strong>
              Mempermudah pemantauan status proyek dan mempercepat rekapitulasi laporan keuangan bulanan.
            </div>
          </div>
        </div>
        <div class="pt-4 border-t border-neutral-800 flex items-center justify-between">
          <a href="{{ route('services.application') }}" class="text-sm font-semibold text-white hover:text-neutral-300 flex items-center gap-1">
            <span>Lihat Layanan Aplikasi</span>
            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
          </a>
        </div>
      </div>

      <!-- Case 3: Branding & Social Media -->
      <div class="p-6 rounded-2xl bg-surface-dark border border-border-dark hover:border-neutral-700 transition flex flex-col justify-between space-y-6">
        <div>
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full bg-purple-500/10 text-purple-400 border border-purple-500/20">Desain & Digital</span>
            <span class="text-xs text-neutral-500">Branding Identity</span>
          </div>
          <h3 class="text-xl font-bold text-white mb-3">Pembaruan Identitas Visual & Strategi Konten</h3>
          <div class="space-y-3 text-sm text-neutral-400">
            <div>
              <strong class="text-white block mb-1">Tantangan:</strong>
              Tampilan promosi produk tidak konsisten sehingga kurang membangun kepercayaan pasar.
            </div>
            <div>
              <strong class="text-white block mb-1">Solusi:</strong>
              Menyusun brand guideline komprehensif, desain materi promosi, dan jadwal rilis media sosial.
            </div>
            <div>
              <strong class="text-white block mb-1">Hasil:</strong>
              Hadirnya tampilan visual yang konsisten dan menarik perhatian calon pembeli potensial.
            </div>
          </div>
        </div>
        <div class="pt-4 border-t border-neutral-800 flex items-center justify-between">
          <a href="{{ route('services.graphic-design') }}" class="text-sm font-semibold text-white hover:text-neutral-300 flex items-center gap-1">
            <span>Lihat Desain Grafis</span>
            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- SECTION 5 — ALUR PEMESANAN / CARA KERJA (NEW) -->
<section id="process" class="relative bg-background-dark py-16 border-t border-border-dark">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-neutral-800 bg-neutral-900/60 backdrop-blur mb-4">
        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
        <span class="text-xs font-semibold uppercase tracking-wider text-neutral-300">Alur Kerja</span>
      </div>
      <h2 class="text-3xl md:text-5xl font-bold tracking-tight text-white mb-4">
        Bagaimana Cara Kerjanya?
      </h2>
      <p class="text-neutral-400 text-lg">
        Proses pengerjaan transparan dan terstruktur dalam 5 langkah sederhana dari konsultasi hingga rilis.
      </p>
    </div>

    <!-- Steps Grid (Desktop: Horizontal Flow, Mobile: Vertical Flow) -->
    <div class="grid grid-cols-1 md:grid-cols-5 gap-6 relative">
      <div class="p-6 rounded-xl bg-surface-dark border border-border-dark relative flex flex-col justify-between">
        <div>
          <span class="text-3xl font-black text-white/20 block mb-4">01</span>
          <h3 class="text-lg font-bold text-white mb-2">Konsultasi</h3>
          <p class="text-sm text-neutral-400">Ceritakan kebutuhan bisnis atau project digital yang ingin Anda kembangkan.</p>
        </div>
      </div>

      <div class="p-6 rounded-xl bg-surface-dark border border-border-dark relative flex flex-col justify-between">
        <div>
          <span class="text-3xl font-black text-white/20 block mb-4">02</span>
          <h3 class="text-lg font-bold text-white mb-2">Diskusi & Penawaran</h3>
          <p class="text-sm text-neutral-400">Tim menganalisis kebutuhan lalu memberikan rincian estimasi solusi dan anggaran.</p>
        </div>
      </div>

      <div class="p-6 rounded-xl bg-surface-dark border border-border-dark relative flex flex-col justify-between">
        <div>
          <span class="text-3xl font-black text-white/20 block mb-4">03</span>
          <h3 class="text-lg font-bold text-white mb-2">Development</h3>
          <p class="text-sm text-neutral-400">Proyek dikerjakan secara intensif berdasarkan fitur dan lingkup kerja yang disepakati.</p>
        </div>
      </div>

      <div class="p-6 rounded-xl bg-surface-dark border border-border-dark relative flex flex-col justify-between">
        <div>
          <span class="text-3xl font-black text-white/20 block mb-4">04</span>
          <h3 class="text-lg font-bold text-white mb-2">Review</h3>
          <p class="text-sm text-neutral-400">Klien melakukan pengujian dan memberikan umpan balik untuk penyempurnaan.</p>
        </div>
      </div>

      <div class="p-6 rounded-xl bg-surface-dark border border-border-dark relative flex flex-col justify-between">
        <div>
          <span class="text-3xl font-black text-white/20 block mb-4">05</span>
          <h3 class="text-lg font-bold text-white mb-2">Selesai & Launch</h3>
          <p class="text-sm text-neutral-400">Hasil proyek diserahterimakan penuh dan siap digunakan untuk operasional bisnis.</p>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- SECTION 6 — TESTIMONIAL / APA KATA KLIEN KAMI? (NEW) -->
<section id="testimonials" class="relative bg-background-dark py-16 border-t border-border-dark">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-neutral-800 bg-neutral-900/60 backdrop-blur mb-4">
        <span class="w-2 h-2 rounded-full bg-amber-400"></span>
        <span class="text-xs font-semibold uppercase tracking-wider text-neutral-300">Social Proof</span>
      </div>
      <h2 class="text-3xl md:text-5xl font-bold tracking-tight text-white mb-4">
        Apa Kata Klien Kami?
      </h2>
      <p class="text-neutral-400 text-lg">
        Pengalaman nyata dari para pelaku usaha dan profesional yang mempercayakan kebutuhan digitalnya bersama SolusiBersama.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Testimonial 1 -->
      <div class="p-6 rounded-2xl bg-surface-dark border border-border-dark flex flex-col justify-between space-y-6">
        <div class="space-y-4">
          <div class="flex items-center gap-1 text-amber-400">
            <span class="material-symbols-outlined text-[20px]">star</span>
            <span class="material-symbols-outlined text-[20px]">star</span>
            <span class="material-symbols-outlined text-[20px]">star</span>
            <span class="material-symbols-outlined text-[20px]">star</span>
            <span class="material-symbols-outlined text-[20px]">star</span>
          </div>
          <p class="text-neutral-300 text-sm italic leading-relaxed">
            "SolusiBersama membantu kami mendapatkan website profesional yang sesuai dengan kebutuhan bisnis. Komunikasi tim sangat responsif dan hasil pengerjaan tepat waktu."
          </p>
        </div>
        <div class="flex items-center gap-3 pt-4 border-t border-neutral-800">
          <div class="w-10 h-10 rounded-full bg-neutral-800 border border-neutral-700 flex items-center justify-center font-bold text-white text-sm">
            BS
          </div>
          <div>
            <h4 class="text-sm font-bold text-white">Budi Santoso</h4>
            <span class="text-xs text-neutral-400">Klien Layanan Website</span>
          </div>
        </div>
      </div>

      <!-- Testimonial 2 -->
      <div class="p-6 rounded-2xl bg-surface-dark border border-border-dark flex flex-col justify-between space-y-6">
        <div class="space-y-4">
          <div class="flex items-center gap-1 text-amber-400">
            <span class="material-symbols-outlined text-[20px]">star</span>
            <span class="material-symbols-outlined text-[20px]">star</span>
            <span class="material-symbols-outlined text-[20px]">star</span>
            <span class="material-symbols-outlined text-[20px]">star</span>
            <span class="material-symbols-outlined text-[20px]">star</span>
          </div>
          <p class="text-neutral-300 text-sm italic leading-relaxed">
            "Sistem aplikasi internal yang dibuat mempermudah pemantauan tagihan dan pesanan proyek kami secara otomatis. Sangat membantu operasional harian."
          </p>
        </div>
        <div class="flex items-center gap-3 pt-4 border-t border-neutral-800">
          <div class="w-10 h-10 rounded-full bg-neutral-800 border border-neutral-700 flex items-center justify-center font-bold text-white text-sm">
            AR
          </div>
          <div>
            <h4 class="text-sm font-bold text-white">Andi Rahmad</h4>
            <span class="text-xs text-neutral-400">Klien Layanan Aplikasi</span>
          </div>
        </div>
      </div>

      <!-- Testimonial 3 -->
      <div class="p-6 rounded-2xl bg-surface-dark border border-border-dark flex flex-col justify-between space-y-6">
        <div class="space-y-4">
          <div class="flex items-center gap-1 text-amber-400">
            <span class="material-symbols-outlined text-[20px]">star</span>
            <span class="material-symbols-outlined text-[20px]">star</span>
            <span class="material-symbols-outlined text-[20px]">star</span>
            <span class="material-symbols-outlined text-[20px]">star</span>
            <span class="material-symbols-outlined text-[20px]">star</span>
          </div>
          <p class="text-neutral-300 text-sm italic leading-relaxed">
            "Materi desain branding dan strategi media sosial yang dirancang tim memberikan kesan profesional pada bisnis kami di mata pelanggan."
          </p>
        </div>
        <div class="flex items-center gap-3 pt-4 border-t border-neutral-800">
          <div class="w-10 h-10 rounded-full bg-neutral-800 border border-neutral-700 flex items-center justify-center font-bold text-white text-sm">
            DN
          </div>
          <div>
            <h4 class="text-sm font-bold text-white">Dian Novita</h4>
            <span class="text-xs text-neutral-400">Klien Desain & Marketing</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- SECTION 7 — FAQ ACCORDION (NEW) -->
<section id="faq" class="relative bg-background-dark py-16 border-t border-border-dark">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-neutral-800 bg-neutral-900/60 backdrop-blur mb-4">
        <span class="w-2 h-2 rounded-full bg-purple-500"></span>
        <span class="text-xs font-semibold uppercase tracking-wider text-neutral-300">Pertanyaan Umum</span>
      </div>
      <h2 class="text-3xl md:text-5xl font-bold tracking-tight text-white mb-4">
        Pertanyaan yang Sering Ditanyakan
      </h2>
      <p class="text-neutral-400 text-lg">
        Informasi cepat mengenai layanan, alur pengerjaan, dan ketentuan garansi revisi di SolusiBersama.
      </p>
    </div>

    <!-- Accordion Items -->
    <div class="space-y-4">
      <div class="faq-item rounded-xl bg-surface-dark border border-border-dark overflow-hidden transition">
        <button class="faq-toggle w-full p-6 text-left flex justify-between items-center text-white font-semibold hover:bg-neutral-800/40 transition">
          <span>Apakah desain website bisa disesuaikan dengan kebutuhan bisnis?</span>
          <span class="material-symbols-outlined faq-icon text-neutral-400 transition-transform duration-300">expand_more</span>
        </button>
        <div class="faq-content hidden px-6 pb-6 text-neutral-400 text-sm leading-relaxed border-t border-neutral-800/50 pt-4">
          Ya. Struktur dan visual website disesuaikan sepenuhnya dengan kebutuhan proyek, target pasar, serta identitas bisnis Anda agar tampil unik dan profesional.
        </div>
      </div>

      <div class="faq-item rounded-xl bg-surface-dark border border-border-dark overflow-hidden transition">
        <button class="faq-toggle w-full p-6 text-left flex justify-between items-center text-white font-semibold hover:bg-neutral-800/40 transition">
          <span>Berapa lama proses pengerjaan?</span>
          <span class="material-symbols-outlined faq-icon text-neutral-400 transition-transform duration-300">expand_more</span>
        </button>
        <div class="faq-content hidden px-6 pb-6 text-neutral-400 text-sm leading-relaxed border-t border-neutral-800/50 pt-4">
          Durasi pengerjaan tergantung jenis layanan, jumlah fitur, serta tingkat kompleksitas proyek. Umumnya landing page membutuhkan 3-7 hari, sedangkan aplikasi web/sistem custom berkisar 2-4 minggu.
        </div>
      </div>

      <div class="faq-item rounded-xl bg-surface-dark border border-border-dark overflow-hidden transition">
        <button class="faq-toggle w-full p-6 text-left flex justify-between items-center text-white font-semibold hover:bg-neutral-800/40 transition">
          <span>Apakah bisa membuat website custom?</span>
          <span class="material-symbols-outlined faq-icon text-neutral-400 transition-transform duration-300">expand_more</span>
        </button>
        <div class="faq-content hidden px-6 pb-6 text-neutral-400 text-sm leading-relaxed border-t border-neutral-800/50 pt-4">
          Tentu saja. SolusiBersama berpengalaman menangani berbagai kebutuhan website custom, mulai dari portal perusahaan, e-commerce, hingga sistem manajemen internal terintegrasi.
        </div>
      </div>

      <div class="faq-item rounded-xl bg-surface-dark border border-border-dark overflow-hidden transition">
        <button class="faq-toggle w-full p-6 text-left flex justify-between items-center text-white font-semibold hover:bg-neutral-800/40 transition">
          <span>Apakah bisa melakukan revisi?</span>
          <span class="material-symbols-outlined faq-icon text-neutral-400 transition-transform duration-300">expand_more</span>
        </button>
        <div class="faq-content hidden px-6 pb-6 text-neutral-400 text-sm leading-relaxed border-t border-neutral-800/50 pt-4">
          Ya. Setiap paket layanan mencakup kuota revisi sesuai kesepakatan awal untuk memastikan hasil akhir memenuhi ekspektasi Anda.
        </div>
      </div>

      <div class="faq-item rounded-xl bg-surface-dark border border-border-dark overflow-hidden transition">
        <button class="faq-toggle w-full p-6 text-left flex justify-between items-center text-white font-semibold hover:bg-neutral-800/40 transition">
          <span>Apakah tersedia layanan dukungan setelah proyek selesai?</span>
          <span class="material-symbols-outlined faq-icon text-neutral-400 transition-transform duration-300">expand_more</span>
        </button>
        <div class="faq-content hidden px-6 pb-6 text-neutral-400 text-sm leading-relaxed border-t border-neutral-800/50 pt-4">
          Kami memberikan pendampingan dan garansi pemeliharaan teknis pasca-serah terima untuk memastikan sistem tetap berjalan lancar tanpa kendala.
        </div>
      </div>

      <div class="faq-item rounded-xl bg-surface-dark border border-border-dark overflow-hidden transition">
        <button class="faq-toggle w-full p-6 text-left flex justify-between items-center text-white font-semibold hover:bg-neutral-800/40 transition">
          <span>Bagaimana cara memesan layanan?</span>
          <span class="material-symbols-outlined faq-icon text-neutral-400 transition-transform duration-300">expand_more</span>
        </button>
        <div class="faq-content hidden px-6 pb-6 text-neutral-400 text-sm leading-relaxed border-t border-neutral-800/50 pt-4">
          Anda dapat menekan tombol "Konsultasikan Project" atau "Pesan" pada daftar layanan untuk mengisi formulir pemesanan digital atau langsung menghubungi tim kami via WhatsApp.
        </div>
      </div>
    </div>
  </div>
</section>


<!-- SECTION 8 — CTA UTAMA (NEW) -->
<section id="cta-primary" class="relative bg-background-dark py-20 border-t border-border-dark overflow-hidden">
  <div class="absolute inset-0 pointer-events-none">
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-[700px] aspect-square bg-white/5 rounded-full blur-[140px]"></div>
  </div>

  <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8">
    <h2 class="text-4xl md:text-6xl font-black text-white tracking-tight leading-tight">
      Punya Ide untuk Bisnis Anda?
    </h2>
    <p class="text-lg md:text-xl text-neutral-400 max-w-2xl mx-auto">
      Diskusikan kebutuhan digital Anda bersama SolusiBersama dan temukan solusi yang sesuai dengan kebutuhan project.
    </p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
      <a href="#contact"
        class="w-full sm:w-auto h-14 px-8 rounded-lg bg-white text-black text-base font-bold hover:bg-neutral-200 transition transform hover:-translate-y-0.5 shadow-lg flex items-center justify-center gap-2">
        <span>Konsultasikan Project</span>
        <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
      </a>
      <a href="#services"
        class="w-full sm:w-auto h-14 px-8 rounded-lg border border-neutral-800 bg-neutral-900/60 text-white text-base font-bold hover:bg-neutral-800 transition flex items-center justify-center">
        Lihat Layanan
      </a>
    </div>
  </div>
</section>


<!-- SECTION 9 — CONTACT EXISTING -->
<section id="contact" class="relative bg-background-dark py-14 border-t border-border-dark overflow-hidden">
  <div class="absolute inset-0 pointer-events-none">
    <div class="absolute -top-32 -left-32 w-[40%] h-[40%] bg-white/5 rounded-full blur-[120px]"></div>
    <div class="absolute top-1/3 right-0 w-[30%] h-[60%] bg-white/5 rounded-full blur-[120px]"></div>
  </div>

  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20">

      <!-- LEFT : CONTACT INFO -->
      <div class="lg:col-span-5 flex flex-col justify-center space-y-10">
        <div>
          <div class="inline-flex items-center gap-2 bg-white/10 px-3 py-1 rounded-full mb-6 w-fit">
            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
            <span class="text-xs font-semibold tracking-wide uppercase text-white/80">
              Available for new projects
            </span>
          </div>

          <h2 class="text-4xl md:text-5xl font-extrabold tracking-tight text-white mb-4">
            Hubungi Kami
          </h2>

          <p class="text-white/60 text-lg leading-relaxed">
            Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan atau ingin berdiskusi tentang proyek Anda.
          </p>
        </div>

        <div class="space-y-6">
          <div class="flex items-start gap-4">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-white/5 border border-white/10">
              <span class="material-symbols-outlined text-white/80">location_on</span>
            </div>
            <div>
              <span class="text-sm uppercase tracking-wider text-white/40 font-semibold">Alamat</span>
              <p class="text-white text-lg font-medium">Jl. B. Zein Hamid Medan Johor</p>
            </div>
          </div>

          <div class="flex items-start gap-4">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-white/5 border border-white/10">
              <span class="material-symbols-outlined text-white/80">call</span>
            </div>
            <div>
              <span class="text-sm uppercase tracking-wider text-white/40 font-semibold">Telepon</span>
              <p class="text-white text-lg font-medium">+62 813 7451 4952</p>
            </div>
          </div>

          <div class="flex items-start gap-4">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-white/5 border border-white/10">
              <span class="material-symbols-outlined text-white/80">mail</span>
            </div>
            <div>
              <span class="text-sm uppercase tracking-wider text-white/40 font-semibold">Email</span>
              <p class="text-white text-lg font-medium">info@solusibersama.com</p>
            </div>
          </div>

          <div class="flex items-start gap-4">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-white/5 border border-white/10">
              <span class="material-symbols-outlined text-white/80">schedule</span>
            </div>
            <div>
              <span class="text-sm uppercase tracking-wider text-white/40 font-semibold">Jam Kerja</span>
              <p class="text-white text-lg font-medium">Senin - Jumat: 09:00 - 17:00</p>
              <p class="text-white/60">Sabtu: 09:00 - 14:00</p>
            </div>
          </div>
        </div>

        <div class="pt-6 border-t border-white/10">
          <p class="text-sm text-white/40 mb-4 font-medium">Ikuti kami:</p>
          <div class="flex gap-4">
            <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-white hover:text-black transition">In</a>
            <a href="https://instagram.com/firmanhdytt__" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-white hover:text-black transition">Ig</a>
            <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-white hover:text-black transition">X</a>
          </div>
        </div>
      </div>

      <!-- RIGHT : FORM -->
      <div class="lg:col-span-7">
        <div class="relative bg-[#1a1a1a] border border-white/10 rounded-2xl p-8 md:p-10 shadow-2xl overflow-hidden">
          <div class="mb-8">
            <h3 class="text-2xl font-bold text-white mb-2">Kirim Pesan</h3>
            <p class="text-white/50 text-sm">Isi formulir di bawah ini dan kami akan segera menghubungi Anda.</p>
          </div>

          <form id="contact-form" method="POST" action="{{ route('contact.send') }}" class="space-y-6">
            @csrf

            <div>
              <label class="text-sm text-white/70 block mb-2">Nama Lengkap</label>
              <input type="text" name="name" required class="w-full bg-background-dark border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/30 focus:ring-2 focus:ring-white/20 focus:border-white/40 transition">
            </div>

            <div>
              <label class="text-sm text-white/70 block mb-2">Email</label>
              <input type="email" name="email" required class="w-full bg-background-dark border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/30 focus:ring-2 focus:ring-white/20 focus:border-white/40 transition">
            </div>

            <div>
              <label class="text-sm text-white/70 block mb-2">Nomor Telepon</label>
              <input type="tel" name="phone" required class="w-full bg-background-dark border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/30 focus:ring-2 focus:ring-white/20 focus:border-white/40 transition">
            </div>

            <div>
              <label class="text-sm text-white/70 block mb-2">Subjek</label>
              <input type="text" name="subject" required class="w-full bg-background-dark border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/30 focus:ring-2 focus:ring-white/20 focus:border-white/40 transition">
            </div>

            <div>
              <label class="text-sm text-white/70 block mb-2">Pesan</label>
              <textarea name="message" rows="4" required class="w-full bg-background-dark border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/30 focus:ring-2 focus:ring-white/20 focus:border-white/40 transition resize-none"></textarea>
            </div>

            <div class="flex flex-col sm:flex-row gap-4">
              <button type="submit" class="flex-1 bg-white text-black font-bold py-3 rounded-lg hover:bg-neutral-200 transition">
                Kirim Pesan
              </button>
              <button type="button" id="whatsapp-btn" class="btn-whatsapp flex-1 py-3 rounded-lg text-white flex items-center justify-center gap-2">
                Chat WhatsApp
              </button>
            </div>
          </form>

          <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent pointer-events-none"></div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- SECTION 10 — FOOTER EXISTING (WITH DIRECT SERVICE LINKS) -->
<footer class="bg-background-dark border-t border-border-dark pt-20 pb-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
      <div class="space-y-4">
        <h3 class="text-xl font-bold text-white tracking-tight">
          SolusiBersama<span class="text-neutral-400">.com</span>
        </h3>
        <p class="text-white/60 leading-relaxed">
          Solusi digital terbaik untuk bisnis Anda. Kami membantu bisnis Anda berkembang melalui teknologi modern dan strategi yang tepat.
        </p>

        <div class="flex gap-4 pt-2">
          <a href="https://facebook.com" target="_blank" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-white hover:text-black transition"><span class="text-sm font-bold">Fb</span></a>
          <a href="https://instagram.com/firmanhdytt__" target="_blank" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-white hover:text-black transition"><span class="text-sm font-bold">Ig</span></a>
          <a href="https://twitter.com" target="_blank" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-white hover:text-black transition"><span class="text-sm font-bold">X</span></a>
          <a href="https://youtube.com" target="_blank" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-white hover:text-black transition"><span class="text-sm font-bold">Yt</span></a>
        </div>
      </div>

      <div>
        <h4 class="text-white font-semibold mb-6">Layanan</h4>
        <ul class="space-y-3 text-white/60 text-sm">
          <li><a href="{{ route('services.website') }}" class="hover:text-white transition">Pembuatan Website</a></li>
          <li><a href="{{ route('services.graphic-design') }}" class="hover:text-white transition">Desain Grafis</a></li>
          <li><a href="{{ route('services.digital-marketing') }}" class="hover:text-white transition">Digital Marketing</a></li>
          <li><a href="{{ route('services.application') }}" class="hover:text-white transition">Pengembangan Aplikasi</a></li>
          <li><a href="{{ route('services.video') }}" class="hover:text-white transition">Video Marketing</a></li>
          <li><a href="{{ route('services.seo') }}" class="hover:text-white transition">SEO & Optimasi</a></li>
        </ul>
      </div>

      <div>
        <h4 class="text-white font-semibold mb-6">Tautan</h4>
        <ul class="space-y-3 text-white/60 text-sm">
          <li><a href="#" class="hover:text-white transition">Beranda</a></li>
          <li><a href="#about" class="hover:text-white transition">Tentang Kami</a></li>
          <li><a href="#services" class="hover:text-white transition">Layanan</a></li>
          <li><a href="#case-studies" class="hover:text-white transition">Studi Kasus</a></li>
          <li><a href="#process" class="hover:text-white transition">Cara Kerja</a></li>
          <li><a href="#faq" class="hover:text-white transition">FAQ</a></li>
          <li><a href="#contact" class="hover:text-white transition">Kontak</a></li>
        </ul>
      </div>

      <div>
        <h4 class="text-white font-semibold mb-6">Kontak</h4>
        <ul class="space-y-4 text-white/60 text-sm">
          <li class="flex items-start gap-3">
            <span class="material-symbols-outlined text-white/40 mt-1">location_on</span>
            <span>Jl. B. Zein Hamid Medan Johor</span>
          </li>
          <li class="flex items-start gap-3">
            <span class="material-symbols-outlined text-white/40 mt-1">call</span>
            <a href="tel:+6281374514952" class="hover:text-white transition">+62 813 7451 4952</a>
          </li>
          <li class="flex items-start gap-3">
            <span class="material-symbols-outlined text-white/40 mt-1">mail</span>
            <a href="mailto:info@solusibersama.com" class="hover:text-white transition">info@solusibersama.com</a>
          </li>
        </ul>
      </div>
    </div>

    <div class="border-t border-white/10 pt-6 text-center text-white/40 text-sm">
      © {{ date('Y') }} <span class="text-white">SolusiBersama.com</span>. Hak Cipta Dilindungi.
    </div>
  </div>
</footer>

<!-- MODAL ORDER FORM REUSABLE INTEGRATION -->
@include('partials.order-modals')

@endsection
