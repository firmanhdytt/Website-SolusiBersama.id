@extends('layouts.app')

@section('title', 'Digital Marketing - SolusiBersama.com')

@section('content')
<header class="fixed top-0 left-0 right-0 z-50 border-b border-border-dark bg-background-dark/80 backdrop-blur-md">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-20">
      <a href="{{ url('/') }}" class="flex items-center gap-3">
        <div class="flex items-center justify-center w-10 h-10">
          <img src="/images/logo-putih.png" alt="SolusiBersama Icon" class="w-10 h-10">
        </div>
        <h2 class="text-white text-lg font-bold tracking-tight">
          SolusiBersama<span class="text-neutral-400">.com</span>
        </h2>
      </a>

      <nav class="hidden md:flex items-center gap-8">
        <a href="{{ url('/') }}" class="text-neutral-400 hover:text-white text-sm font-medium transition-colors">Beranda</a>
        <a href="{{ url('/#about') }}" class="text-neutral-400 hover:text-white text-sm font-medium transition-colors">Tentang Kami</a>
        <a href="{{ url('/#services') }}" class="text-white text-sm font-semibold transition-colors">Layanan</a>
        <a href="{{ url('/#faq') }}" class="text-neutral-400 hover:text-white text-sm font-medium transition-colors">FAQ</a>
        <a href="{{ url('/#contact') }}" class="text-neutral-400 hover:text-white text-sm font-medium transition-colors">Kontak</a>
      </nav>

      <div class="flex items-center gap-4">
        <a href="{{ route('login') }}" class="hidden md:flex items-center justify-center h-10 px-6 bg-white text-black text-sm font-bold rounded-lg hover:bg-neutral-200 transition">
          Login
        </a>
        <button id="mobile-menu-button" class="md:hidden text-white">
          <span class="material-symbols-outlined">menu</span>
        </button>
      </div>
    </div>
  </div>

  <div id="mobile-menu" class="md:hidden hidden border-t border-border-dark bg-background-dark px-6 py-4 space-y-4">
    <a href="{{ url('/') }}" class="block text-neutral-400 hover:text-white transition">Beranda</a>
    <a href="{{ url('/#about') }}" class="block text-neutral-400 hover:text-white transition">Tentang Kami</a>
    <a href="{{ url('/#services') }}" class="block text-white font-semibold transition">Layanan</a>
    <a href="{{ url('/#faq') }}" class="block text-neutral-400 hover:text-white transition">FAQ</a>
    <a href="{{ url('/#contact') }}" class="block text-neutral-400 hover:text-white transition">Kontak</a>
    <a href="{{ route('login') }}" class="block text-center bg-white text-black py-2 rounded-lg font-bold hover:bg-neutral-200 transition">Login</a>
  </div>
</header>

<main class="relative pt-24 bg-background-dark">
  <section class="relative py-16 md:py-24 overflow-hidden">
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
      <div class="absolute top-1/3 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-[650px] aspect-square bg-[radial-gradient(circle,rgba(249,115,22,0.1),transparent_70%)] opacity-80 blur-3xl"></div>
      <div class="absolute inset-0 opacity-15" style="background-image: radial-gradient(rgba(255,255,255,0.15) 1px, transparent 1px); background-size: 24px 24px;"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-3xl mx-auto text-center space-y-6">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-orange-500/20 bg-orange-500/10 text-orange-400 text-xs font-semibold uppercase tracking-wider">
          <span class="material-symbols-outlined text-[16px]">campaign</span>
          Layanan Digital Marketing
        </div>
        <h1 class="text-4xl md:text-6xl font-black text-white tracking-tight leading-tight">
          Strategi Pemasaran Digital Terukur untuk Bisnis Anda
        </h1>
        <p class="text-lg md:text-xl text-neutral-400 leading-relaxed">
          Jangkau audiens potensial yang lebih luas dan bangun interaksi aktif menggunakan kampanye digital yang tepat sasaran.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
          <button class="order-btn w-full sm:w-auto h-14 px-8 rounded-lg bg-white text-black font-bold hover:bg-neutral-200 transition flex items-center justify-center gap-2" data-service="marketing">
            <span>Konsultasikan Project</span>
            <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
          </button>
          <a href="#details" class="w-full sm:w-auto h-14 px-8 rounded-lg border border-neutral-800 bg-neutral-900/60 text-white font-bold hover:bg-neutral-800 transition flex items-center justify-center">
            Pelajari Selengkapnya
          </a>
        </div>
      </div>
    </div>
  </section>

  <section id="details" class="py-16 border-t border-border-dark bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="space-y-6">
          <h2 class="text-3xl font-bold text-white tracking-tight">
            Memperluas Jangkauan Pasar di Era Digital
          </h2>
          <p class="text-neutral-400 leading-relaxed">
            Pemasaran digital memegang peranan krusial dalam menghubungkan produk atau layanan Anda dengan konsumen yang aktif mencari solusi secara online.
          </p>
          <p class="text-neutral-400 leading-relaxed">
            Kami menyusun perancangan kampanye iklan, pengelolaan konten media sosial, serta strategi pencarian terarah guna memastikan pesan brand Anda sampai ke audiens yang tepat.
          </p>
        </div>

        <div class="p-8 rounded-2xl bg-surface-dark border border-border-dark space-y-6">
          <h3 class="text-xl font-bold text-white">Cakupan Layanan Digital Marketing:</h3>
          <ul class="space-y-4">
            <li class="flex items-start gap-3 text-neutral-300">
              <span class="material-symbols-outlined text-orange-400 mt-1">check_circle</span>
              <span><strong>Social Media Management:</strong> Perencanaan & riset ide konten harian.</span>
            </li>
            <li class="flex items-start gap-3 text-neutral-300">
              <span class="material-symbols-outlined text-orange-400 mt-1">check_circle</span>
              <span><strong>Paid Advertising (Ads):</strong> Google Ads, Meta Ads (FB & IG) terarah.</span>
            </li>
            <li class="flex items-start gap-3 text-neutral-300">
              <span class="material-symbols-outlined text-orange-400 mt-1">check_circle</span>
              <span><strong>Content Strategy:</strong> Riset tren audiens dan penyusunan kalender editorial.</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="py-16 border-t border-border-dark bg-background-dark text-center">
    <div class="max-w-2xl mx-auto space-y-6">
      <h2 class="text-3xl font-bold text-white">Estimasi Biaya Layanan</h2>
      <div class="p-8 rounded-2xl bg-surface-dark border border-border-dark space-y-4">
        <span class="text-neutral-400 text-sm font-semibold uppercase tracking-wider block">Mulai Dari</span>
        <div class="text-4xl md:text-5xl font-black text-white">Rp 1.500.000</div>
        <p class="text-sm text-neutral-400">Biaya bulanan atau berbasis proyek sesuai skala kampanye pemasaran.</p>
        <button class="order-btn px-8 py-3 bg-white text-black font-bold rounded-lg hover:bg-neutral-200 transition" data-service="marketing">
          Pesan via Formulir
        </button>
      </div>
    </div>
  </section>

  <section class="py-16 border-t border-border-dark bg-background-dark text-center">
    <div class="max-w-4xl mx-auto px-4 space-y-6">
      <h2 class="text-3xl md:text-4xl font-bold text-white">Siap Tingkatkan Kehadiran Digital Bisnis Anda?</h2>
      <p class="text-neutral-400">Konsultasikan strategi pemasaran digital yang tepat bersama SolusiBersama.</p>
      <button class="order-btn px-8 py-4 bg-white text-black font-bold rounded-lg hover:bg-neutral-200 transition text-lg inline-flex items-center gap-2" data-service="marketing">
        <span>Konsultasikan Project</span>
        <span class="material-symbols-outlined">arrow_forward</span>
      </button>
    </div>
  </section>
</main>

<footer class="bg-background-dark border-t border-border-dark pt-16 pb-8">
  <div class="max-w-7xl mx-auto px-4 text-center text-neutral-500 text-sm">
    © {{ date('Y') }} SolusiBersama.com. Hak Cipta Dilindungi.
  </div>
</footer>

@include('partials.order-modals')

@endsection
