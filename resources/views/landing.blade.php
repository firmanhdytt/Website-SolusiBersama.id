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
        <a href="#process" class="text-neutral-400 hover:text-white text-sm font-medium transition-colors">
          Cara Kerja
        </a>
        <a href="#testimonials" class="text-neutral-400 hover:text-white text-sm font-medium transition-colors">
          Testimonial
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
    <a href="#process" class="block text-neutral-400 hover:text-white transition">Cara Kerja</a>
    <a href="#testimonials" class="block text-neutral-400 hover:text-white transition">Testimonial</a>
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


<!-- SECTION 4 — ALUR PEMESANAN / CARA KERJA (S-CURVE PATH DESAIN MENGANGKAT GAMBAR 1) -->
<section id="process" class="relative bg-background-dark py-20 border-t border-border-dark overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="text-center max-w-3xl mx-auto mb-20">
      <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-rose-500/30 bg-rose-500/10 text-rose-400 text-xs font-bold uppercase tracking-wider mb-4 shadow-[0_0_15px_rgba(244,63,94,0.2)]">
        <span class="w-2 h-2 rounded-full bg-rose-500 animate-ping"></span>
        Alur Pengerjaan Proyek
      </div>
      <h2 class="text-3xl md:text-5xl font-black tracking-tight text-white mb-4">
        Bagaimana Cara Kerjanya?
      </h2>
      <p class="text-neutral-400 text-lg">
        Proses pengerjaan yang transparan, amanah, dan terstruktur dari konsultasi ide hingga siap rilis publik.
      </p>
    </div>

    <!-- DESKTOP S-CURVE FLOW (DESAIN TERINSPIRASI GAMBAR 1) -->
    <div class="hidden lg:block relative max-w-5xl mx-auto py-10">

      <!-- SVG S-CURVE GLOWING LINE -->
      <svg class="absolute inset-0 w-full h-full pointer-events-none z-0" viewBox="0 0 1000 1200" fill="none" preserveAspectRatio="none">
        <defs>
          <linearGradient id="flow-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" stop-color="#ef4444" />
            <stop offset="25%" stop-color="#f59e0b" />
            <stop offset="50%" stop-color="#10b981" />
            <stop offset="75%" stop-color="#06b6d4" />
            <stop offset="100%" stop-color="#8b5cf6" />
          </linearGradient>
          <filter id="glow-line" x="-20%" y="-20%" width="140%" height="140%">
            <feGaussianBlur stdDeviation="6" result="blur" />
            <feComposite in="SourceGraphic" in2="blur" operator="over" />
          </filter>
        </defs>

        <!-- S-CURVE PATH CONNECTING 5 STEPS -->
        <path d="M 800 60
                 C 800 180, 200 180, 200 300
                 C 200 420, 800 420, 800 540
                 C 800 660, 200 660, 200 780
                 C 200 900, 800 900, 800 1020"
              stroke="url(#flow-gradient)" stroke-width="6" stroke-dasharray="10 6" filter="url(#glow-line)" opacity="0.85" />
      </svg>

      <!-- STEP 01 (Tekss Kiri, Nomor Kanan) -->
      <div class="relative z-10 grid grid-cols-12 items-center mb-24">
        <div class="col-span-6 pr-8">
          <div class="p-8 rounded-2xl bg-surface-dark border border-white/10 hover:border-red-500/50 transition-all duration-300 hover:shadow-[0_0_30px_rgba(239,68,68,0.2)] group">
            <div class="flex items-center gap-3 mb-3">
              <div class="w-10 h-10 rounded-xl bg-red-500/10 text-red-400 flex items-center justify-center font-bold">
                <span class="material-symbols-outlined">forum</span>
              </div>
              <h3 class="text-xl font-bold text-white group-hover:text-red-400 transition">Konsultasi & Riset Ide</h3>
            </div>
            <p class="text-neutral-400 text-sm leading-relaxed">
              Ceritakan ide bisnis, target pasar, serta kebutuhan proyek Anda. Tim kami akan menganalisis kebutuhan awal secara mendalam.
            </p>
          </div>
        </div>
        <div class="col-span-6 flex justify-end pr-12">
          <div class="w-20 h-20 rounded-full bg-gradient-to-br from-red-500 to-rose-600 text-white font-black text-2xl flex items-center justify-center shadow-lg shadow-red-500/40 ring-4 ring-background-dark transform hover:scale-110 transition">
            01
          </div>
        </div>
      </div>

      <!-- STEP 02 (Nomor Kiri, Teks Kanan) -->
      <div class="relative z-10 grid grid-cols-12 items-center mb-24">
        <div class="col-span-6 flex justify-start pl-12">
          <div class="w-20 h-20 rounded-full bg-gradient-to-br from-amber-400 to-orange-500 text-white font-black text-2xl flex items-center justify-center shadow-lg shadow-amber-500/40 ring-4 ring-background-dark transform hover:scale-110 transition">
            02
          </div>
        </div>
        <div class="col-span-6 pl-8">
          <div class="p-8 rounded-2xl bg-surface-dark border border-white/10 hover:border-amber-500/50 transition-all duration-300 hover:shadow-[0_0_30px_rgba(245,158,11,0.2)] group">
            <div class="flex items-center gap-3 mb-3">
              <div class="w-10 h-10 rounded-xl bg-amber-500/10 text-amber-400 flex items-center justify-center font-bold">
                <span class="material-symbols-outlined">description</span>
              </div>
              <h3 class="text-xl font-bold text-white group-hover:text-amber-400 transition">Diskusi & Penawaran</h3>
            </div>
            <p class="text-neutral-400 text-sm leading-relaxed">
              Tim menyusun perancangan estimasi fitur, harga transparan, serta kesepakatan lini masa pengerjaan (*timeline*).
            </p>
          </div>
        </div>
      </div>

      <!-- STEP 03 (Teks Kiri, Nomor Kanan) -->
      <div class="relative z-10 grid grid-cols-12 items-center mb-24">
        <div class="col-span-6 pr-8">
          <div class="p-8 rounded-2xl bg-surface-dark border border-white/10 hover:border-emerald-500/50 transition-all duration-300 hover:shadow-[0_0_30px_rgba(16,185,129,0.2)] group">
            <div class="flex items-center gap-3 mb-3">
              <div class="w-10 h-10 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center font-bold">
                <span class="material-symbols-outlined">code</span>
              </div>
              <h3 class="text-xl font-bold text-white group-hover:text-emerald-400 transition">Proses Development</h3>
            </div>
            <p class="text-neutral-400 text-sm leading-relaxed">
              Proyek dikerjakan secara intensif menggunakan standar arsitektur terbersih dan desain UI/UX teruji.
            </p>
          </div>
        </div>
        <div class="col-span-6 flex justify-end pr-12">
          <div class="w-20 h-20 rounded-full bg-gradient-to-br from-emerald-400 to-teal-600 text-white font-black text-2xl flex items-center justify-center shadow-lg shadow-emerald-500/40 ring-4 ring-background-dark transform hover:scale-110 transition">
            03
          </div>
        </div>
      </div>

      <!-- STEP 04 (Nomor Kiri, Teks Kanan) -->
      <div class="relative z-10 grid grid-cols-12 items-center mb-24">
        <div class="col-span-6 flex justify-start pl-12">
          <div class="w-20 h-20 rounded-full bg-gradient-to-br from-cyan-400 to-blue-600 text-white font-black text-2xl flex items-center justify-center shadow-lg shadow-cyan-500/40 ring-4 ring-background-dark transform hover:scale-110 transition">
            04
          </div>
        </div>
        <div class="col-span-6 pl-8">
          <div class="p-8 rounded-2xl bg-surface-dark border border-white/10 hover:border-cyan-500/50 transition-all duration-300 hover:shadow-[0_0_30px_rgba(6,182,212,0.2)] group">
            <div class="flex items-center gap-3 mb-3">
              <div class="w-10 h-10 rounded-xl bg-cyan-500/10 text-cyan-400 flex items-center justify-center font-bold">
                <span class="material-symbols-outlined">fact_check</span>
              </div>
              <h3 class="text-xl font-bold text-white group-hover:text-cyan-400 transition">Review & Pengujian</h3>
            </div>
            <p class="text-neutral-400 text-sm leading-relaxed">
              Klien melakukan peninjauan terhadap hasil pekerjaan, uji fungsi, dan memberikan umpan balik revisi jika diperlukan.
            </p>
          </div>
        </div>
      </div>

      <!-- STEP 05 (Teks Kiri, Nomor Kanan) -->
      <div class="relative z-10 grid grid-cols-12 items-center">
        <div class="col-span-6 pr-8">
          <div class="p-8 rounded-2xl bg-surface-dark border border-white/10 hover:border-purple-500/50 transition-all duration-300 hover:shadow-[0_0_30px_rgba(139,92,246,0.2)] group">
            <div class="flex items-center gap-3 mb-3">
              <div class="w-10 h-10 rounded-xl bg-purple-500/10 text-purple-400 flex items-center justify-center font-bold">
                <span class="material-symbols-outlined">rocket_launch</span>
              </div>
              <h3 class="text-xl font-bold text-white group-hover:text-purple-400 transition">Selesai & Launch</h3>
            </div>
            <p class="text-neutral-400 text-sm leading-relaxed">
              Penyerahan berkas master penuh dan peluncuran resmi ke publik dengan garansi pemeliharaan pasca-rilis.
            </p>
          </div>
        </div>
        <div class="col-span-6 flex justify-end pr-12">
          <div class="w-20 h-20 rounded-full bg-gradient-to-br from-purple-500 to-indigo-600 text-white font-black text-2xl flex items-center justify-center shadow-lg shadow-purple-500/40 ring-4 ring-background-dark transform hover:scale-110 transition">
            05
          </div>
        </div>
      </div>

    </div>

    <!-- MOBILE TIMELINE FLOW -->
    <div class="block lg:hidden relative space-y-8 border-l-2 border-dashed border-rose-500/30 pl-6 ml-4">
      <!-- Mobile Step 1 -->
      <div class="relative">
        <div class="absolute -left-[35px] top-0 w-10 h-10 rounded-full bg-gradient-to-br from-red-500 to-rose-600 text-white font-bold text-sm flex items-center justify-center shadow-md">
          01
        </div>
        <div class="p-6 rounded-xl bg-surface-dark border border-white/10">
          <h3 class="text-lg font-bold text-white mb-2">Konsultasi & Riset Ide</h3>
          <p class="text-sm text-neutral-400">Ceritakan ide bisnis dan kebutuhan proyek Anda untuk dianalisis oleh tim.</p>
        </div>
      </div>

      <!-- Mobile Step 2 -->
      <div class="relative">
        <div class="absolute -left-[35px] top-0 w-10 h-10 rounded-full bg-gradient-to-br from-amber-400 to-orange-500 text-white font-bold text-sm flex items-center justify-center shadow-md">
          02
        </div>
        <div class="p-6 rounded-xl bg-surface-dark border border-white/10">
          <h3 class="text-lg font-bold text-white mb-2">Diskusi & Penawaran</h3>
          <p class="text-sm text-neutral-400">Penyusunan rincian estimasi biaya, fitur, dan jadwal pengerjaan.</p>
        </div>
      </div>

      <!-- Mobile Step 3 -->
      <div class="relative">
        <div class="absolute -left-[35px] top-0 w-10 h-10 rounded-full bg-gradient-to-br from-emerald-400 to-teal-600 text-white font-bold text-sm flex items-center justify-center shadow-md">
          03
        </div>
        <div class="p-6 rounded-xl bg-surface-dark border border-white/10">
          <h3 class="text-lg font-bold text-white mb-2">Proses Development</h3>
          <p class="text-sm text-neutral-400">Pengerjaan intensif proyek dengan standar arsitektur terbaik.</p>
        </div>
      </div>

      <!-- Mobile Step 4 -->
      <div class="relative">
        <div class="absolute -left-[35px] top-0 w-10 h-10 rounded-full bg-gradient-to-br from-cyan-400 to-blue-600 text-white font-bold text-sm flex items-center justify-center shadow-md">
          04
        </div>
        <div class="p-6 rounded-xl bg-surface-dark border border-white/10">
          <h3 class="text-lg font-bold text-white mb-2">Review & Pengujian</h3>
          <p class="text-sm text-neutral-400">Klien meninjau hasil dan memberikan masukan penyempurnaan.</p>
        </div>
      </div>

      <!-- Mobile Step 5 -->
      <div class="relative">
        <div class="absolute -left-[35px] top-0 w-10 h-10 rounded-full bg-gradient-to-br from-purple-500 to-indigo-600 text-white font-bold text-sm flex items-center justify-center shadow-md">
          05
        </div>
        <div class="p-6 rounded-xl bg-surface-dark border border-white/10">
          <h3 class="text-lg font-bold text-white mb-2">Selesai & Launch</h3>
          <p class="text-sm text-neutral-400">Penyerahan master file dan peluncuran resmi publik.</p>
        </div>
      </div>
    </div>

  </div>
</section>


<!-- SECTION 5 — APA KATA MEREKA / TESTIMONIAL (3D DEPTH CAROUSEL SLIDER MENGANGKAT GAMBAR 2) -->
<section id="testimonials" class="relative bg-background-dark py-20 border-t border-border-dark overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-emerald-500/30 bg-emerald-500/10 text-emerald-400 text-xs font-bold uppercase tracking-wider mb-4 shadow-[0_0_15px_rgba(16,185,129,0.2)]">
        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
        Social Proof & Kepercayaan
      </div>
      <h2 class="text-3xl md:text-5xl font-black tracking-tight text-white mb-4">
        Apa Kata Klien Kami?
      </h2>
      <p class="text-neutral-400 text-lg">
        Pengalaman nyata dari para pelaku usaha dan profesional yang tumbuh bersama SolusiBersama.
      </p>
    </div>

    <!-- 3D DEPTH SLIDER CAROUSEL WRAPPER (DESAIN MENGANGKAT GAMBAR 2) -->
    <div class="relative max-w-5xl mx-auto px-4 py-8">

      <!-- CAROUSEL TRACK -->
      <div id="testimonial-slider-track" class="relative flex items-center justify-center min-h-[360px] gap-4 md:gap-8">

        <!-- CARD 1 -->
        <div class="testimonial-card absolute w-full max-w-lg p-8 rounded-3xl bg-[#141414] border border-emerald-500/40 shadow-2xl transition-all duration-500 transform cursor-pointer" data-index="0">
          <div class="flex items-center justify-between mb-4">
            <span class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-400 text-xs font-bold uppercase tracking-wide border border-emerald-500/30">#KLIEN 01</span>
            <div class="flex gap-1 text-amber-400">
              <span class="material-symbols-outlined text-[18px]">star</span>
              <span class="material-symbols-outlined text-[18px]">star</span>
              <span class="material-symbols-outlined text-[18px]">star</span>
              <span class="material-symbols-outlined text-[18px]">star</span>
              <span class="material-symbols-outlined text-[18px]">star</span>
            </div>
          </div>
          <p class="text-white text-base leading-relaxed italic mb-6">
            "SolusiBersama membantu kami mendapatkan website company profile yang sangat cepat dan sesuai identitas bisnis. Komunikasi tim sangat profesional dan penyelesaian tepat waktu."
          </p>
          <div class="flex items-center gap-4 pt-4 border-t border-neutral-800">
            <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-emerald-500 to-teal-400 text-black font-bold flex items-center justify-center text-lg">
              BS
            </div>
            <div>
              <h4 class="text-white font-bold text-base">Budi Santoso</h4>
              <span class="text-neutral-400 text-xs">Direktur PT Digital Nusantara (Website)</span>
            </div>
          </div>
        </div>

        <!-- CARD 2 -->
        <div class="testimonial-card absolute w-full max-w-lg p-8 rounded-3xl bg-[#141414] border border-blue-500/40 shadow-2xl transition-all duration-500 transform cursor-pointer" data-index="1">
          <div class="flex items-center justify-between mb-4">
            <span class="px-3 py-1 rounded-full bg-blue-500/20 text-blue-400 text-xs font-bold uppercase tracking-wide border border-blue-500/30">#KLIEN 02</span>
            <div class="flex gap-1 text-amber-400">
              <span class="material-symbols-outlined text-[18px]">star</span>
              <span class="material-symbols-outlined text-[18px]">star</span>
              <span class="material-symbols-outlined text-[18px]">star</span>
              <span class="material-symbols-outlined text-[18px]">star</span>
              <span class="material-symbols-outlined text-[18px]">star</span>
            </div>
          </div>
          <p class="text-white text-base leading-relaxed italic mb-6">
            "Sistem aplikasi internal yang dibuat mempermudah pemantauan tagihan dan pesanan proyek kami secara otomatis. Sangat membantu efisiensi operasional harian tim kami."
          </p>
          <div class="flex items-center gap-4 pt-4 border-t border-neutral-800">
            <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-blue-500 to-cyan-400 text-black font-bold flex items-center justify-center text-lg">
              AR
            </div>
            <div>
              <h4 class="text-white font-bold text-base">Andi Rahmad</h4>
              <span class="text-neutral-400 text-xs">Founder TechFlow System (Aplikasi Web)</span>
            </div>
          </div>
        </div>

        <!-- CARD 3 -->
        <div class="testimonial-card absolute w-full max-w-lg p-8 rounded-3xl bg-[#141414] border border-purple-500/40 shadow-2xl transition-all duration-500 transform cursor-pointer" data-index="2">
          <div class="flex items-center justify-between mb-4">
            <span class="px-3 py-1 rounded-full bg-purple-500/20 text-purple-400 text-xs font-bold uppercase tracking-wide border border-purple-500/30">#KLIEN 03</span>
            <div class="flex gap-1 text-amber-400">
              <span class="material-symbols-outlined text-[18px]">star</span>
              <span class="material-symbols-outlined text-[18px]">star</span>
              <span class="material-symbols-outlined text-[18px]">star</span>
              <span class="material-symbols-outlined text-[18px]">star</span>
              <span class="material-symbols-outlined text-[18px]">star</span>
            </div>
          </div>
          <p class="text-white text-base leading-relaxed italic mb-6">
            "Materi desain branding dan strategi media sosial yang dirancang tim memberikan kesan profesional pada bisnis kami di mata pelanggan. Terjadi peningkatan interaksi yang bagus!"
          </p>
          <div class="flex items-center gap-4 pt-4 border-t border-neutral-800">
            <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-purple-500 to-pink-400 text-black font-bold flex items-center justify-center text-lg">
              DN
            </div>
            <div>
              <h4 class="text-white font-bold text-base">Dian Novita</h4>
              <span class="text-neutral-400 text-xs">Marketing Lead Brandku (Desain Grafis)</span>
            </div>
          </div>
        </div>

        <!-- CARD 4 -->
        <div class="testimonial-card absolute w-full max-w-lg p-8 rounded-3xl bg-[#141414] border border-amber-500/40 shadow-2xl transition-all duration-500 transform cursor-pointer" data-index="3">
          <div class="flex items-center justify-between mb-4">
            <span class="px-3 py-1 rounded-full bg-amber-500/20 text-amber-400 text-xs font-bold uppercase tracking-wide border border-amber-500/30">#KLIEN 04</span>
            <div class="flex gap-1 text-amber-400">
              <span class="material-symbols-outlined text-[18px]">star</span>
              <span class="material-symbols-outlined text-[18px]">star</span>
              <span class="material-symbols-outlined text-[18px]">star</span>
              <span class="material-symbols-outlined text-[18px]">star</span>
              <span class="material-symbols-outlined text-[18px]">star</span>
            </div>
          </div>
          <p class="text-white text-base leading-relaxed italic mb-6">
            "Kampanye iklan digital yang dikelola memberikan rasio calon pelanggan baru yang sangat relevan. Tim SolusiBersama sangat membantu eksekusi strategi."
          </p>
          <div class="flex items-center gap-4 pt-4 border-t border-neutral-800">
            <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-amber-400 to-rose-400 text-black font-bold flex items-center justify-center text-lg">
              RP
            </div>
            <div>
              <h4 class="text-white font-bold text-base">Rizky Pratama</h4>
              <span class="text-neutral-400 text-xs">Owner TokoKita (Digital Marketing)</span>
            </div>
          </div>
        </div>

      </div>

      <!-- CAROUSEL CONTROLS (NAV PANAH) -->
      <div class="flex items-center justify-between max-w-md mx-auto mt-12">
        <button id="testi-prev" class="w-12 h-12 rounded-full bg-neutral-900 border border-white/20 text-white flex items-center justify-center hover:bg-white hover:text-black transition shadow-lg">
          <span class="material-symbols-outlined">arrow_back</span>
        </button>

        <!-- DOTS INDICATORS -->
        <div id="testi-dots" class="flex gap-2">
          <span class="dot-item w-3 h-3 rounded-full bg-emerald-500 cursor-pointer transition-all"></span>
          <span class="dot-item w-3 h-3 rounded-full bg-neutral-700 cursor-pointer transition-all"></span>
          <span class="dot-item w-3 h-3 rounded-full bg-neutral-700 cursor-pointer transition-all"></span>
          <span class="dot-item w-3 h-3 rounded-full bg-neutral-700 cursor-pointer transition-all"></span>
        </div>

        <button id="testi-next" class="w-12 h-12 rounded-full bg-neutral-900 border border-white/20 text-white flex items-center justify-center hover:bg-white hover:text-black transition shadow-lg">
          <span class="material-symbols-outlined">arrow_forward</span>
        </button>
      </div>

    </div>
  </div>
</section>


<!-- SECTION 6 — FAQ ACCORDION (DESAIN SPESIFIK MENGANGKAT GAMBAR 3) -->
<section id="faq" class="relative bg-background-dark py-20 border-t border-border-dark overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">

      <!-- LEFT COLUMN: TITLE & CALLOUT BOX (MENGANGKAT GAMBAR 3) -->
      <div class="lg:col-span-5 space-y-8 lg:sticky lg:top-32">
        <div>
          <!-- BADGE RED/ROSE -->
          <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-red-500/30 bg-red-500/10 text-red-400 text-xs font-bold uppercase tracking-wider mb-6 shadow-[0_0_15px_rgba(239,68,68,0.2)]">
            <span class="w-2 h-2 rounded-full bg-red-500 animate-ping"></span>
            Tanya Jawab & Bantuan
          </div>

          <h2 class="text-4xl md:text-5xl font-black text-white tracking-tight leading-[1.15] mb-4">
            Pertanyaan yang <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 via-rose-400 to-pink-500">
              Sering Diajukan.
            </span>
          </h2>

          <p class="text-neutral-400 text-base leading-relaxed">
            Temukan jawaban cepat seputar alur kerja, penyesuaian desain, garansi teknis, dan prosedur pemesanan layanan di SolusiBersama.
          </p>
        </div>

        <!-- VIBRANT CALLOUT CARD (SAMA SEPERTI GAMBAR 3) -->
        <div class="relative rounded-3xl p-8 bg-gradient-to-br from-red-600 via-rose-700 to-red-900 border border-red-500/40 shadow-2xl shadow-red-900/40 text-white overflow-hidden group">
          <div class="absolute -right-8 -bottom-8 w-36 h-36 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>

          <div class="flex items-start gap-4 mb-4">
            <div class="w-12 h-12 rounded-2xl bg-white/10 border border-white/20 flex items-center justify-center text-white shrink-0 shadow-inner">
              <span class="material-symbols-outlined text-2xl">support_agent</span>
            </div>
            <div>
              <h3 class="text-xl font-bold text-white">Butuh Bantuan Langsung?</h3>
              <p class="text-white/80 text-xs font-medium">Tim kami siap merespons cepat</p>
            </div>
          </div>

          <p class="text-white/90 text-sm leading-relaxed mb-6">
            Punya pertanyaan khusus seputar proyek atau rencana kerja sama pada bisnis Anda?
          </p>

          <a href="#contact"
            class="w-full py-3.5 px-6 rounded-xl bg-white text-red-700 font-bold hover:bg-neutral-100 transition shadow-lg flex items-center justify-center gap-2 group-hover:translate-x-1 duration-300">
            <span>Hubungi Tim SolusiBersama</span>
            <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
          </a>
        </div>
      </div>

      <!-- RIGHT COLUMN: NUMBERED ACCORDION STACK (MENGANGKAT GAMBAR 3) -->
      <div class="lg:col-span-7 space-y-4">

        <!-- ITEM 01 -->
        <div class="faq-item rounded-2xl bg-[#141414] border border-white/10 hover:border-red-500/40 transition-all duration-300 overflow-hidden shadow-lg">
          <button class="faq-toggle w-full p-6 text-left flex justify-between items-center text-white font-bold text-base md:text-lg gap-4 group">
            <div class="flex items-center gap-4">
              <span class="faq-num w-10 h-10 rounded-full bg-red-500/10 border border-red-500/30 text-red-400 text-sm font-bold flex items-center justify-center shrink-0">
                01
              </span>
              <span class="group-hover:text-red-400 transition">Apakah desain website bisa disesuaikan dengan kebutuhan bisnis?</span>
            </div>
            <span class="material-symbols-outlined faq-icon text-neutral-400 transition-transform duration-300 shrink-0">expand_more</span>
          </button>
          <div class="faq-content hidden px-6 pb-6 text-neutral-300 text-sm leading-relaxed border-t border-neutral-800/80 pt-4 pl-20">
            Ya. Seluruh tata letak dan struktur visual disesuaikan penuh dengan karakteristik bisnis, target audiens, serta preferensi fungsional proyek Anda.
          </div>
        </div>

        <!-- ITEM 02 -->
        <div class="faq-item rounded-2xl bg-[#141414] border border-white/10 hover:border-red-500/40 transition-all duration-300 overflow-hidden shadow-lg">
          <button class="faq-toggle w-full p-6 text-left flex justify-between items-center text-white font-bold text-base md:text-lg gap-4 group">
            <div class="flex items-center gap-4">
              <span class="faq-num w-10 h-10 rounded-full bg-red-500/10 border border-red-500/30 text-red-400 text-sm font-bold flex items-center justify-center shrink-0">
                02
              </span>
              <span class="group-hover:text-red-400 transition">Berapa lama proses pengerjaan proyek?</span>
            </div>
            <span class="material-symbols-outlined faq-icon text-neutral-400 transition-transform duration-300 shrink-0">expand_more</span>
          </button>
          <div class="faq-content hidden px-6 pb-6 text-neutral-300 text-sm leading-relaxed border-t border-neutral-800/80 pt-4 pl-20">
            Durasi pengerjaan tergantung jenis layanan. Pembuatan landing page membutuhkan waktu 3-7 hari, sedangkan aplikasi web/sistem custom berkisar 2-4 minggu.
          </div>
        </div>

        <!-- ITEM 03 -->
        <div class="faq-item rounded-2xl bg-[#141414] border border-white/10 hover:border-red-500/40 transition-all duration-300 overflow-hidden shadow-lg">
          <button class="faq-toggle w-full p-6 text-left flex justify-between items-center text-white font-bold text-base md:text-lg gap-4 group">
            <div class="flex items-center gap-4">
              <span class="faq-num w-10 h-10 rounded-full bg-red-500/10 border border-red-500/30 text-red-400 text-sm font-bold flex items-center justify-center shrink-0">
                03
              </span>
              <span class="group-hover:text-red-400 transition">Apakah bisa membuat website custom?</span>
            </div>
            <span class="material-symbols-outlined faq-icon text-neutral-400 transition-transform duration-300 shrink-0">expand_more</span>
          </button>
          <div class="faq-content hidden px-6 pb-6 text-neutral-300 text-sm leading-relaxed border-t border-neutral-800/80 pt-4 pl-20">
            Tentu saja. Kami berpengalaman menangani berbagai kebutuhan website custom dari awal sesuai kebutuhan arsitektur data bisnis Anda.
          </div>
        </div>

        <!-- ITEM 04 -->
        <div class="faq-item rounded-2xl bg-[#141414] border border-white/10 hover:border-red-500/40 transition-all duration-300 overflow-hidden shadow-lg">
          <button class="faq-toggle w-full p-6 text-left flex justify-between items-center text-white font-bold text-base md:text-lg gap-4 group">
            <div class="flex items-center gap-4">
              <span class="faq-num w-10 h-10 rounded-full bg-red-500/10 border border-red-500/30 text-red-400 text-sm font-bold flex items-center justify-center shrink-0">
                04
              </span>
              <span class="group-hover:text-red-400 transition">Apakah bisa melakukan revisi hasil pekerjaan?</span>
            </div>
            <span class="material-symbols-outlined faq-icon text-neutral-400 transition-transform duration-300 shrink-0">expand_more</span>
          </button>
          <div class="faq-content hidden px-6 pb-6 text-neutral-300 text-sm leading-relaxed border-t border-neutral-800/80 pt-4 pl-20">
            Ya. Setiap paket layanan mencakup kuota revisi sesuai kesepakatan awal untuk memastikan hasil akhir memenuhi ekspetasi Anda.
          </div>
        </div>

        <!-- ITEM 05 -->
        <div class="faq-item rounded-2xl bg-[#141414] border border-white/10 hover:border-red-500/40 transition-all duration-300 overflow-hidden shadow-lg">
          <button class="faq-toggle w-full p-6 text-left flex justify-between items-center text-white font-bold text-base md:text-lg gap-4 group">
            <div class="flex items-center gap-4">
              <span class="faq-num w-10 h-10 rounded-full bg-red-500/10 border border-red-500/30 text-red-400 text-sm font-bold flex items-center justify-center shrink-0">
                05
              </span>
              <span class="group-hover:text-red-400 transition">Apakah tersedia dukungan teknis setelah proyek selesai?</span>
            </div>
            <span class="material-symbols-outlined faq-icon text-neutral-400 transition-transform duration-300 shrink-0">expand_more</span>
          </button>
          <div class="faq-content hidden px-6 pb-6 text-neutral-300 text-sm leading-relaxed border-t border-neutral-800/80 pt-4 pl-20">
            Kami memberikan pendampingan dan garansi pemeliharaan teknis pasca-serah terima untuk memastikan sistem Anda berjalan lancar.
          </div>
        </div>

        <!-- ITEM 06 -->
        <div class="faq-item rounded-2xl bg-[#141414] border border-white/10 hover:border-red-500/40 transition-all duration-300 overflow-hidden shadow-lg">
          <button class="faq-toggle w-full p-6 text-left flex justify-between items-center text-white font-bold text-base md:text-lg gap-4 group">
            <div class="flex items-center gap-4">
              <span class="faq-num w-10 h-10 rounded-full bg-red-500/10 border border-red-500/30 text-red-400 text-sm font-bold flex items-center justify-center shrink-0">
                06
              </span>
              <span class="group-hover:text-red-400 transition">Bagaimana cara memesan layanan?</span>
            </div>
            <span class="material-symbols-outlined faq-icon text-neutral-400 transition-transform duration-300 shrink-0">expand_more</span>
          </button>
          <div class="faq-content hidden px-6 pb-6 text-neutral-300 text-sm leading-relaxed border-t border-neutral-800/80 pt-4 pl-20">
            Anda dapat menekan tombol "Konsultasikan Project" atau "Pesan" pada daftar layanan untuk mengisi formulir pemesanan digital atau langsung menghubungi tim kami via WhatsApp.
          </div>
        </div>

      </div>

    </div>

  </div>
</section>


<!-- SECTION 7 — CTA UTAMA -->
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


<!-- SECTION 8 — CONTACT EXISTING -->
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


<!-- FOOTER -->
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
          <li><a href="#process" class="hover:text-white transition">Cara Kerja</a></li>
          <li><a href="#testimonials" class="hover:text-white transition">Testimonial</a></li>
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
