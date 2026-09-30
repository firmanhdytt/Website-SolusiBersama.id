@extends('layouts.app')

@section('title', 'SolusiBersama.com - Solusi Digital Terpercaya')

@section('content')
<!-- Header -->
<header class="fixed top-0 left-0 right-0 z-50 border-b border-border-dark bg-background-dark/80 backdrop-blur-md">

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-20">

      <!-- LOGO -->
      <div class="flex items-center gap-3">
        <div class="flex items-center justify-center w-10 h-10">
          <img src="/images/logo-putih.png" alt="Idea Icon" class="w-10 h-10 ">
        </div>
        <h2 class="text-white text-lg font-bold tracking-tight">
          SolusiBersama<span class="text-neutral-400">.com</span>
        </h2>
      </div>

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

    <a href="#" class="block text-neutral-400 hover:text-white transition">
      Beranda
    </a>
    <a href="#services" class="block text-neutral-400 hover:text-white transition">
      Layanan
    </a>
    <a href="#about" class="block text-neutral-400 hover:text-white transition">
      Tentang Kami
    </a>
    <a href="#contact" class="block text-neutral-400 hover:text-white transition">
      Kontak
    </a>

    <a href="{{ route('login') }}"
      class="block text-center bg-white text-black py-2 rounded-lg font-bold hover:bg-neutral-200 transition">
      Login
    </a>
  </div>

</header>


{{--
<script>
  document.getElementById('mobile-menu-button').addEventListener('click', function () {
    const mobileMenu = document.getElementById('mobile-menu');
    mobileMenu.classList.toggle('hidden');
  });
</script> --}}

<!-- Tambahkan padding-top supaya konten tidak ketutup header -->


<!-- Hero Section -->
<main class="relative pt-8">
  <div class="relative min-h-[90vh] flex flex-col justify-center overflow-hidden">

    <!-- BACKGROUND -->
    <div class="absolute inset-0 z-0">
      <!-- Glow -->
      <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-[radial-gradient(circle,rgba(255,255,255,0.08),transparent_70%)] opacity-60 blur-3xl">
      </div>

      <!-- Texture -->
      <div class="absolute inset-0 opacity-20 bg-cover bg-center mix-blend-overlay"
        style="background-image:url('https://lh3.googleusercontent.com/aida-public/AB6AXuBYJ99MLcXEfDcV94I5_fRJdNBcuNGTrEYHIyaGrO-BXB9eAGIxcoeX__r-UnE9A0Hz07Y3cL5G5LgSaSUxBjgZ4mIUFbpXryWRqdE2mI2p0BLNjenolJaILjsvJlQkJNh1_2ONabEM3VnSYWPJKnUIQ2gkAHJgiZl6WpTvRfqVBRoSIq7ZmnEVu5Ug6urSkMSA8I3GPBBraSu1S85WmdwPYZVdFQHHxITdOXuh0bTmf0rkNGXxdyNwrGvhyTjmTQVzFqjrlICMKzmR');">
      </div>

      <!-- Gradient -->
      <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/60 to-black"></div>
    </div>

    <!-- CONTENT -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full pt-20 pb-30">
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

          <a href="#services"
            class="w-full sm:w-auto h-14 px-8 rounded-lg bg-white text-black text-base font-bold hover:bg-neutral-200 transition transform hover:-translate-y-0.5 shadow-[0_0_20px_rgba(255,255,255,0.15)] flex items-center justify-center gap-2">
            <span>Lihat Layanan</span>
            <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
          </a>

          <a href="#contact"
            class="w-full sm:w-auto h-14 px-8 rounded-lg border border-neutral-800 bg-neutral-900/40 backdrop-blur text-white font-bold hover:bg-neutral-800 transition flex items-center justify-center">
            Hubungi Kami
          </a>

        </div>
      </div>
    </div>

    <!-- TRUST BAR -->
<div class="absolute bottom-0 left-0 w-full border-t border-neutral-800 bg-neutral-900/60 backdrop-blur overflow-hidden">

  <div class="trust-wrapper py-6">
    <div class="trust-track">

      <!-- ===== ITEM SET ===== -->
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

      <!-- DUPLIKASI (WAJIB) -->
      <div class="trust-items">
        <!-- copy persis -->
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

      <!-- DUPLIKASI KE-3 (ANTI PUTUS) -->
      <div class="trust-items">
        <!-- copy lagi -->
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



<!-- About, Services, Contact, Footer, Modals -->
<!-- Company Profile Section -->
<section id="about" class="relative overflow-hidden py-14 border-t border-border-dark bg-background-dark">

  <!-- SPACE BACKGROUND LAYER -->
  <div class="absolute inset-0 z-0">
    <!-- Nebula Glow -->
    <div class="absolute -top-40 -left-40 w-[600px] h-[600px] bg-white/10 rounded-full blur-[140px]"></div>
    <div class="absolute top-1/3 -right-40 w-[500px] h-[500px] bg-white/5 rounded-full blur-[140px]"></div>

    <!-- Star Noise -->
    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(rgba(255,255,255,0.2) 1px, transparent 1px);
             background-size: 3px 3px;">
    </div>

    <!-- Gradient Fade -->
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-background-dark/40 to-background-dark">
    </div>
  </div>

  <!-- CONTENT -->
  <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- HEADER -->
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

        <!-- VISI -->
        <div>
          <h3 class="text-2xl font-bold text-white mb-3">Visi Kami</h3>
          <p class="text-white/60 leading-relaxed">
            Menjadi mitra terpercaya dalam transformasi digital bisnis di Indonesia
            melalui solusi inovatif dan berkualitas tinggi.
          </p>
        </div>

        <!-- MISI -->
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

          <!-- ITEM -->
          <div class="flex items-start gap-5">
            <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center">
              <span class="material-symbols-outlined text-blue-400">verified</span>
            </div>
            <div>
              <h4 class="text-lg font-semibold text-white">Kualitas Terjamin</h4>
              <p class="text-white/60 text-sm">
                Kami mengutamakan kualitas dalam setiap proyek yang kami kerjakan.
              </p>
            </div>
          </div>

          <div class="flex items-start gap-5">
            <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center">
              <span class="material-symbols-outlined text-green-400">schedule</span>
            </div>
            <div>
              <h4 class="text-lg font-semibold text-white">Tepat Waktu</h4>
              <p class="text-white/60 text-sm">
                Komitmen kami adalah menyelesaikan proyek sesuai timeline.
              </p>
            </div>
          </div>

          <div class="flex items-start gap-5">
            <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center">
              <span class="material-symbols-outlined text-purple-400">groups</span>
            </div>
            <div>
              <h4 class="text-lg font-semibold text-white">Tim Profesional</h4>
              <p class="text-white/60 text-sm">
                Tim berpengalaman dan ahli di bidangnya masing-masing.
              </p>
            </div>
          </div>

          <div class="flex items-start gap-5">
            <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center">
              <span class="material-symbols-outlined text-orange-400">support_agent</span>
            </div>
            <div>
              <h4 class="text-lg font-semibold text-white">Dukungan Responsif</h4>
              <p class="text-white/60 text-sm">
                Kami siap membantu Anda dengan respons cepat dan profesional.
              </p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>


<!-- About Section (copy exact) -->
{{-- <section id="about" class="py-16 bg-white">
  <!-- ... copy all content exactly from your HTML ... -->
  <!-- for brevity, keep it identical as in original HTML -->
  <!-- ensure contact form points to route 'contact.send' and includes @csrf -->
</section> --}}

<!-- Services Section -->
<section id="services" class="bg-background-dark py-14 border-t border-border-dark">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

      <!-- LEFT HEADER -->
      <div class="flex flex-col gap-5 md:gap-6 md:sticky md:top-32">

        <h2
          class="text-3xl sm:text-4xl md:text-5xl font-bold text-white tracking-tight leading-snug md:leading-tight">
          Layanan Unggulan
          <span class="block text-neutral-500">
            Untuk Pertumbuhan Bisnis
          </span>
        </h2>

        <p
          class="text-neutral-400 text-base sm:text-lg max-w-full md:max-w-lg">
          Kami menyediakan berbagai layanan digital utama untuk membantu bisnis Anda
          berkembang secara berkelanjutan.
        </p>

      </div>


      <!-- RIGHT CARDS -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

        <!-- 1. WEBSITE -->
        <div
          class="group p-6 rounded-xl bg-surface-dark border border-border-dark hover:border-neutral-600 hover:bg-[#1f1f1f] transition">
          <div
            class="w-12 h-12 rounded-lg bg-neutral-800 flex items-center justify-center text-white mb-6 group-hover:bg-white group-hover:text-black transition">
            <span class="material-symbols-outlined">language</span>
          </div>
          <h3 class="text-xl font-bold text-white mb-2">Pembuatan Website</h3>
          <p class="text-neutral-400 text-sm mb-4">
            Website profesional, responsif, dan cepat sesuai kebutuhan bisnis Anda.
          </p>
          <div class="flex justify-between items-center">
            <span class="text-neutral-300 font-semibold">Mulai <br> Rp 2.500.000</span>
            <button
              class="order-btn text-sm px-4 py-2 bg-white text-black rounded-lg font-semibold hover:bg-neutral-200 transition"
              data-service="website">
              Pesan
            </button>
          </div>
        </div>

        <!-- 2. DESIGN -->
        <div
          class="group p-6 rounded-xl bg-surface-dark border border-border-dark hover:border-neutral-600 hover:bg-[#1f1f1f] transition">
          <div
            class="w-12 h-12 rounded-lg bg-neutral-800 flex items-center justify-center text-white mb-6 group-hover:bg-white group-hover:text-black transition">
            <span class="material-symbols-outlined">design_services</span>
          </div>
          <h3 class="text-xl font-bold text-white mb-2">Desain Grafis</h3>
          <p class="text-neutral-400 text-sm mb-4">
            Desain visual profesional untuk branding dan promosi bisnis Anda.
          </p>
          <div class="flex justify-between items-center">
            <span class="text-neutral-300 font-semibold">Mulai <br> Rp 500.000</span>
            <button
              class="order-btn text-sm px-4 py-2 bg-white text-black rounded-lg font-semibold hover:bg-neutral-200 transition"
              data-service="design">
              Pesan
            </button>
          </div>
        </div>

        <!-- 3. MARKETING -->
        <div
          class="group p-6 rounded-xl bg-surface-dark border border-border-dark hover:border-neutral-600 hover:bg-[#1f1f1f] transition">
          <div
            class="w-12 h-12 rounded-lg bg-neutral-800 flex items-center justify-center text-white mb-6 group-hover:bg-white group-hover:text-black transition">
            <span class="material-symbols-outlined">campaign</span>
          </div>
          <h3 class="text-xl font-bold text-white mb-2">Digital Marketing</h3>
          <p class="text-neutral-400 text-sm mb-4">
            Strategi pemasaran digital untuk meningkatkan penjualan.
          </p>
          <div class="flex justify-between items-center">
            <span class="text-neutral-300 font-semibold">Mulai <br>Rp 1.500.000</span>
            <button
              class="order-btn text-sm px-4 py-2 bg-white text-black rounded-lg font-semibold hover:bg-neutral-200 transition"
              data-service="marketing">
              Pesan
            </button>
          </div>
        </div>

        <!-- 4. APP -->
        <div
          class="group p-6 rounded-xl bg-surface-dark border border-border-dark hover:border-neutral-600 hover:bg-[#1f1f1f] transition">
          <div
            class="w-12 h-12 rounded-lg bg-neutral-800 flex items-center justify-center text-white mb-6 group-hover:bg-white group-hover:text-black transition">
            <span class="material-symbols-outlined">terminal</span>
          </div>
          <h3 class="text-xl font-bold text-white mb-2">Pengembangan Aplikasi</h3>
          <p class="text-neutral-400 text-sm mb-4">
            Aplikasi web & mobile yang scalable dan aman.
          </p>
          <div class="flex justify-between items-center">
            <span class="text-neutral-300 font-semibold">Mulai <br> Rp 5.000.000</span>
            <button
              class="order-btn text-sm px-4 py-2 bg-white text-black rounded-lg font-semibold hover:bg-neutral-200 transition"
              data-service="app">
              Pesan
            </button>
          </div>
        </div>

        <!-- 5. VIDEO -->
        <div
          class="group p-6 rounded-xl bg-surface-dark border border-border-dark hover:border-neutral-600 hover:bg-[#1f1f1f] transition">
          <div
            class="w-12 h-12 rounded-lg bg-neutral-800 flex items-center justify-center text-white mb-6 group-hover:bg-white group-hover:text-black transition">
            <span class="material-symbols-outlined">videocam</span>
          </div>
          <h3 class="text-xl font-bold text-white mb-2">Video Marketing</h3>
          <p class="text-neutral-400 text-sm mb-4">
            Video promosi profesional untuk meningkatkan engagement.
          </p>
          <div class="flex justify-between items-center">
            <span class="text-neutral-300 font-semibold">Mulai <br> Rp 3.000.000</span>
            <button
              class="order-btn text-sm px-4 py-2 bg-white text-black rounded-lg font-semibold hover:bg-neutral-200 transition"
              data-service="video">
              Pesan
            </button>
          </div>
        </div>

        <!-- 6. SEO -->
        <div
          class="group p-6 rounded-xl bg-surface-dark border border-border-dark hover:border-neutral-600 hover:bg-[#1f1f1f] transition">
          <div
            class="w-12 h-12 rounded-lg bg-neutral-800 flex items-center justify-center text-white mb-6 group-hover:bg-white group-hover:text-black transition">
            <span class="material-symbols-outlined">search</span>
          </div>
          <h3 class="text-xl font-bold text-white mb-2">SEO & Optimasi</h3>
          <p class="text-neutral-400 text-sm mb-4">
            Optimasi website agar tampil di halaman pertama Google.
          </p>
          <div class="flex justify-between items-center">
            <span class="text-neutral-300 font-semibold">Mulai <br> Rp 1.000.000</span>
            <button
              class="order-btn text-sm px-4 py-2 bg-white text-black rounded-lg font-semibold hover:bg-neutral-200 transition"
              data-service="seo">
              Pesan
            </button>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>



<!-- Contact Section -->
<section id="contact" class="relative bg-background-dark py-14 border-t border-border-dark overflow-hidden">

  <!-- Background Glow -->
  <div class="absolute inset-0 pointer-events-none">
    <div class="absolute -top-32 -left-32 w-[40%] h-[40%] bg-white/5 rounded-full blur-[120px]"></div>
    <div class="absolute top-1/3 right-0 w-[30%] h-[60%] bg-white/5 rounded-full blur-[120px]"></div>
  </div>

  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20">

      <!-- LEFT : CONTACT INFO -->
      <div class="lg:col-span-5 flex flex-col justify-center space-y-10">

        <!-- Header -->
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
            Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan
            atau ingin berdiskusi tentang proyek Anda.
          </p>
        </div>

        <!-- Contact Details -->
        <div class="space-y-6">

          <!-- Address -->
          <div class="flex items-start gap-4">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-white/5 border border-white/10">
              <span class="material-symbols-outlined text-white/80">location_on</span>
            </div>
            <div>
              <span class="text-sm uppercase tracking-wider text-white/40 font-semibold">
                Alamat
              </span>
              <p class="text-white text-lg font-medium">
                Jl. B. Zein Hamid Medan Johor
              </p>
            </div>
          </div>

          <!-- Phone -->
          <div class="flex items-start gap-4">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-white/5 border border-white/10">
              <span class="material-symbols-outlined text-white/80">call</span>
            </div>
            <div>
              <span class="text-sm uppercase tracking-wider text-white/40 font-semibold">
                Telepon
              </span>
              <p class="text-white text-lg font-medium">
                +62 813 7451 4952
              </p>
            </div>
          </div>

          <!-- Email -->
          <div class="flex items-start gap-4">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-white/5 border border-white/10">
              <span class="material-symbols-outlined text-white/80">mail</span>
            </div>
            <div>
              <span class="text-sm uppercase tracking-wider text-white/40 font-semibold">
                Email
              </span>
              <p class="text-white text-lg font-medium">
                info@solusibersama.com
              </p>
            </div>
          </div>

          <!-- Working Hours -->
          <div class="flex items-start gap-4">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-white/5 border border-white/10">
              <span class="material-symbols-outlined text-white/80">schedule</span>
            </div>
            <div>
              <span class="text-sm uppercase tracking-wider text-white/40 font-semibold">
                Jam Kerja
              </span>
              <p class="text-white text-lg font-medium">
                Senin - Jumat: 09:00 - 17:00
              </p>
              <p class="text-white/60">
                Sabtu: 09:00 - 14:00
              </p>
            </div>
          </div>

        </div>

        <!-- Social -->
        <div class="pt-6 border-t border-white/10">
          <p class="text-sm text-white/40 mb-4 font-medium">Ikuti kami:</p>
          <div class="flex gap-4">
            <a href="#"
              class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-white hover:text-black transition">
              In
            </a>
            <a href="https://instagram.com/firmanhdytt__"
              class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-white hover:text-black transition">
              Ig
            </a>
            <a href="#"
              class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-white hover:text-black transition">
              X
            </a>
          </div>
        </div>
      </div>

      <!-- RIGHT : FORM -->
      <div class="lg:col-span-7">
        <div class="relative bg-[#1a1a1a] border border-white/10 rounded-2xl p-8 md:p-10 shadow-2xl overflow-hidden">

          <!-- Form Header -->
          <div class="mb-8">
            <h3 class="text-2xl font-bold text-white mb-2">Kirim Pesan</h3>
            <p class="text-white/50 text-sm">
              Isi formulir di bawah ini dan kami akan segera menghubungi Anda.
            </p>
          </div>

          <!-- FORM (LOGIKA ASLI) -->
          <form id="contact-form" method="POST" action="{{ route('contact.send') }}" class="space-y-6">
            @csrf

            <div>
              <label class="text-sm text-white/70 block mb-2">Nama Lengkap</label>
              <input type="text" name="name" required
                class="w-full bg-background-dark border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/30 focus:ring-2 focus:ring-white/20 focus:border-white/40 transition">
            </div>

            <div>
              <label class="text-sm text-white/70 block mb-2">Email</label>
              <input type="email" name="email" required
                class="w-full bg-background-dark border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/30 focus:ring-2 focus:ring-white/20 focus:border-white/40 transition">
            </div>

            <div>
              <label class="text-sm text-white/70 block mb-2">Nomor Telepon</label>
              <input type="tel" name="phone" required
                class="w-full bg-background-dark border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/30 focus:ring-2 focus:ring-white/20 focus:border-white/40 transition">
            </div>

            <div>
              <label class="text-sm text-white/70 block mb-2">Subjek</label>
              <input type="text" name="subject" required
                class="w-full bg-background-dark border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/30 focus:ring-2 focus:ring-white/20 focus:border-white/40 transition">
            </div>

            <div>
              <label class="text-sm text-white/70 block mb-2">Pesan</label>
              <textarea name="message" rows="4" required
                class="w-full bg-background-dark border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/30 focus:ring-2 focus:ring-white/20 focus:border-white/40 transition resize-none"></textarea>
            </div>

            <div class="flex flex-col sm:flex-row gap-4">
              <button type="submit"
                class="flex-1 bg-white text-black font-bold py-3 rounded-lg hover:bg-neutral-200 transition">
                Kirim Pesan
              </button>

              <button type="button" id="whatsapp-btn"
                class="btn-whatsapp flex-1 py-3 rounded-lg text-white flex items-center justify-center gap-2">
                Chat WhatsApp
              </button>
            </div>
          </form>

          <!-- Overlay -->
          <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent pointer-events-none">
          </div>
        </div>
      </div>

    </div>
  </div>
</section>



<!-- Footer -->
<footer class="bg-background-dark border-t border-border-dark pt-20 pb-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- TOP GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">

      <!-- BRAND -->
      <div class="space-y-4">
        <h3 class="text-xl font-bold text-white tracking-tight">
          SolusiBersama<span class="text-neutral-400">.com</span>
        </h3>
        <p class="text-white/60 leading-relaxed">
          Solusi digital terbaik untuk bisnis Anda. Kami membantu bisnis Anda berkembang
          melalui teknologi modern dan strategi yang tepat.
        </p>

        <!-- Social -->
        <div class="flex gap-4 pt-2">
          <a href="https://facebook.com" target="_blank"
            class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-white hover:text-black transition">
            <span class="text-sm font-bold">Fb</span>
          </a>
          <a href="https://instagram.com/firmanhdytt__" target="_blank"
            class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-white hover:text-black transition">
            <span class="text-sm font-bold">Ig</span>
          </a>
          <a href="https://twitter.com" target="_blank"
            class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-white hover:text-black transition">
            <span class="text-sm font-bold">X</span>
          </a>
          <a href="https://youtube.com" target="_blank"
            class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-white hover:text-black transition">
            <span class="text-sm font-bold">Yt</span>
          </a>
        </div>
      </div>

      <!-- SERVICES -->
      <div>
        <h4 class="text-white font-semibold mb-6">Layanan</h4>
        <ul class="space-y-3 text-white/60">
          <li><a href="#services" class="hover:text-white transition">Pembuatan Website</a></li>
          <li><a href="#services" class="hover:text-white transition">Desain Grafis</a></li>
          <li><a href="#services" class="hover:text-white transition">Digital Marketing</a></li>
          <li><a href="#services" class="hover:text-white transition">Pengembangan Aplikasi</a></li>
          <li><a href="#services" class="hover:text-white transition">Video Marketing</a></li>
          <li><a href="#services" class="hover:text-white transition">SEO & Optimasi</a></li>
        </ul>
      </div>

      <!-- LINKS -->
      <div>
        <h4 class="text-white font-semibold mb-6">Tautan</h4>
        <ul class="space-y-3 text-white/60">
          <li><a href="#" class="hover:text-white transition">Beranda</a></li>
          <li><a href="#about" class="hover:text-white transition">Tentang Kami</a></li>
          <li><a href="#services" class="hover:text-white transition">Layanan</a></li>
          <li><a href="#contact" class="hover:text-white transition">Kontak</a></li>
        </ul>
      </div>

      <!-- CONTACT -->
      <div>
        <h4 class="text-white font-semibold mb-6">Kontak</h4>
        <ul class="space-y-4 text-white/60">

          <li class="flex items-start gap-3">
            <span class="material-symbols-outlined text-white/40 mt-1">location_on</span>
            <span>Jl. B. Zein Hamid Medan Johor</span>
          </li>

          <li class="flex items-start gap-3">
            <span class="material-symbols-outlined text-white/40 mt-1">call</span>
            <a href="tel:+6281374514952" class="hover:text-white transition">
              +62 813 7451 4952
            </a>
          </li>

          <li class="flex items-start gap-3">
            <span class="material-symbols-outlined text-white/40 mt-1">mail</span>
            <a href="mailto:info@solusibersama.com" class="hover:text-white transition">
              info@solusibersama.com
            </a>
          </li>

        </ul>
      </div>
    </div>

    <!-- BOTTOM -->
    <div class="border-t border-white/10 pt-6 text-center text-white/40 text-sm">
      © {{ date('Y') }} <span class="text-white">SolusiBersama.com</span>. Hak Cipta Dilindungi.
    </div>

  </div>
</footer>



<!-- ========================================================= -->
<!--                   SERVICE DETAIL MODAL                   -->
<!-- ========================================================= -->
<div id="service-modal"
  class="fixed inset-0 hidden z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm">

  <div
    class="relative w-full max-w-3xl max-h-[90vh] overflow-y-auto rounded-2xl 
           bg-[#121212] border border-white/10 shadow-2xl p-8">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-6">
      <h3 id="modal-title" class="text-2xl font-bold text-white">
        Detail Layanan
      </h3>

      <button id="close-modal"
        class="text-white/50 hover:text-white text-3xl leading-none transition">
        &times;
      </button>
    </div>

    <!-- CONTENT -->
    <div id="modal-content" class="space-y-4 text-white/70 leading-relaxed"></div>

    <!-- CTA -->
    <div class="mt-8 flex flex-col sm:flex-row justify-end gap-3">
      <button id="whatsapp-order-btn"
        class="px-5 py-3 rounded-lg bg-green-600 text-white font-semibold
               hover:bg-green-700 transition"
        data-service="">
        Pesan via WhatsApp
      </button>

      <button id="order-now-btn"
        class="px-5 py-3 rounded-lg bg-white text-black font-semibold
               hover:bg-neutral-200 transition"
        data-service="">
        Pesan Sekarang
      </button>
    </div>
  </div>
</div>

<!-- ========================================================= -->
<!--                     ORDER FORM MODAL                     -->
<!-- ========================================================= -->
<div id="order-form-modal"
  class="fixed inset-0 hidden z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm">

  <div
    class="w-full max-w-2xl max-h-[90vh] overflow-y-auto rounded-2xl
           bg-[#121212] border border-white/10 shadow-2xl">

    <div class="p-8">

      <!-- HEADER -->
      <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-bold text-white">
          Form Pemesanan
        </h3>

        <button id="close-order-form"
          class="text-white/50 hover:text-white text-3xl leading-none transition">
          &times;
        </button>
      </div>

      <!-- FORM -->
      <form id="order-form" method="POST" action="{{ route('order.send') }}" class="space-y-5">
        @csrf

        @foreach ([
          ['Nama Lengkap','order-name','text'],
          ['Email','order-email','email'],
          ['Nomor Telepon','order-phone','tel']
        ] as [$label,$id,$type])
        <div>
          <label class="block mb-1 text-sm text-white/70">{{ $label }}</label>
          <input type="{{ $type }}" id="{{ $id }}" name="{{ $id }}" required
            class="w-full bg-[#1a1a1a] border border-white/10 rounded-lg px-4 py-3
                   text-white focus:ring-2 focus:ring-white/20 focus:border-white/40">
        </div>
        @endforeach

        <input type="hidden" id="order-service" name="order-service">

        <div>
          <label class="block mb-1 text-sm text-white/70">Kebutuhan Anda</label>
          <textarea id="order-requirements" name="order-requirements" rows="3" required
            class="w-full bg-[#1a1a1a] border border-white/10 rounded-lg px-4 py-3
                   text-white focus:ring-2 focus:ring-white/20"></textarea>
        </div>

        <div>
          <label class="block mb-1 text-sm text-white/70">Budget</label>
          <input type="text" id="order-budget" name="order-budget" required
            class="w-full bg-[#1a1a1a] border border-white/10 rounded-lg px-4 py-3 text-white">
        </div>

        <div>
          <label class="block mb-1 text-sm text-white/70">Deadline</label>
          <input type="date" id="order-deadline" name="order-deadline" required
            class="w-full bg-[#1a1a1a] border border-white/10 rounded-lg px-4 py-3 text-white">
        </div>

        <!-- ACTION -->
        <div class="flex flex-col sm:flex-row gap-3 pt-4">
          <button type="submit"
            class="flex-1 py-3 rounded-lg bg-white text-black font-bold hover:bg-neutral-200 transition">
            Kirim Pesanan
          </button>

          <button type="button" id="order-whatsapp-btn"
            class="flex-1 py-3 rounded-lg bg-green-600 text-white font-bold hover:bg-green-700 transition">
            WhatsApp
          </button>
        </div>

      </form>
    </div>
  </div>
</div>

<!-- ========================================================= -->
<!--                       SUCCESS MODAL                      -->
<!-- ========================================================= -->
<div id="success-modal"
  class="fixed inset-0 hidden z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm">

  <div
    class="bg-[#121212] border border-white/10 rounded-2xl shadow-2xl
           w-full max-w-md p-8 text-center">

    <div class="flex justify-center mb-6">
      <div class="bg-green-500/20 p-4 rounded-full">
        <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
            d="M5 13l4 4L19 7" />
        </svg>
      </div>
    </div>

    <h3 class="text-xl font-bold text-white mb-2">
      Berhasil Terkirim!
    </h3>

    <p class="text-white/60 mb-6">
      Pesan Anda telah kami terima. Kami akan segera menghubungi Anda.
    </p>

    <button id="close-success"
      class="w-full py-3 rounded-lg bg-white text-black font-bold hover:bg-neutral-200 transition">
      Tutup
    </button>
  </div>
</div>
