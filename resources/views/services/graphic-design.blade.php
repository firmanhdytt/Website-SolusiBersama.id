@extends('layouts.app')

@section('title', 'Desain Grafis & Branding - SolusiBersama.com')

@section('content')
<!-- Header / Navbar -->
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
        <a href="{{ url('/#case-studies') }}" class="text-neutral-400 hover:text-white text-sm font-medium transition-colors">Studi Kasus</a>
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
    <a href="{{ url('/#services') }}" class="block text-white font-semibold transition">Layanan</a>
    <a href="{{ url('/#case-studies') }}" class="block text-neutral-400 hover:text-white transition">Studi Kasus</a>
    <a href="{{ url('/#faq') }}" class="block text-neutral-400 hover:text-white transition">FAQ</a>
    <a href="{{ url('/#contact') }}" class="block text-neutral-400 hover:text-white transition">Kontak</a>
    <a href="{{ route('login') }}" class="block text-center bg-white text-black py-2 rounded-lg font-bold hover:bg-neutral-200 transition">Login</a>
  </div>
</header>

<main class="relative pt-24 bg-background-dark">
  <!-- HERO SECTION -->
  <section class="relative py-16 md:py-24 overflow-hidden">
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
      <div class="absolute top-1/3 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-[650px] aspect-square bg-[radial-gradient(circle,rgba(236,72,153,0.1),transparent_70%)] opacity-80 blur-3xl"></div>
      <div class="absolute inset-0 opacity-15" style="background-image: radial-gradient(rgba(255,255,255,0.15) 1px, transparent 1px); background-size: 24px 24px;"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-3xl mx-auto text-center space-y-6">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-pink-500/20 bg-pink-500/10 text-pink-400 text-xs font-semibold uppercase tracking-wider">
          <span class="material-symbols-outlined text-[16px]">design_services</span>
          Layanan Desain Grafis & Branding
        </div>
        <h1 class="text-4xl md:text-6xl font-black text-white tracking-tight leading-tight">
          Desain Visual Profesional untuk Identitas Brand Anda
        </h1>
        <p class="text-lg md:text-xl text-neutral-400 leading-relaxed">
          Tingkatkan daya tarik dan kepercayaan pelanggan dengan desain komunikasi visual yang estetis, modern, dan konsisten.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
          <button class="order-btn w-full sm:w-auto h-14 px-8 rounded-lg bg-white text-black font-bold hover:bg-neutral-200 transition flex items-center justify-center gap-2" data-service="design">
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

  <!-- DETAIL PENJELASAN -->
  <section id="details" class="py-16 border-t border-border-dark bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="space-y-6">
          <h2 class="text-3xl font-bold text-white tracking-tight">
            Membangun Karakter Visual yang Kuat & Memikat
          </h2>
          <p class="text-neutral-400 leading-relaxed">
            Identitas visual adalah kesan pertama pelanggan terhadap bisnis Anda. Desain grafis yang dirancang secara profesional membantu mengomunikasikan nilai brand secara tepat, membedakan bisnis Anda dari pesaing, dan menciptakan kesan profesional yang bertahan lama.
          </p>
          <p class="text-neutral-400 leading-relaxed">
            Tim desainer kami fokus menghadirkan aset visual yang relevan dengan tren pasar tanpa mengorbankan fungsionalitas dan konsistensi pesan bisnis Anda.
          </p>
        </div>

        <div class="p-8 rounded-2xl bg-surface-dark border border-border-dark space-y-6">
          <h3 class="text-xl font-bold text-white">Cakupan Layanan Desain Grafis:</h3>
          <ul class="space-y-4">
            <li class="flex items-start gap-3 text-neutral-300">
              <span class="material-symbols-outlined text-pink-400 mt-1">check_circle</span>
              <span><strong>Logo & Brand Identity:</strong> Pembuatan logo dan pedoman warna brand.</span>
            </li>
            <li class="flex items-start gap-3 text-neutral-300">
              <span class="material-symbols-outlined text-pink-400 mt-1">check_circle</span>
              <span><strong>Social Media Feeds:</strong> Template postingan Instagram, Facebook, & Carousel.</span>
            </li>
            <li class="flex items-start gap-3 text-neutral-300">
              <span class="material-symbols-outlined text-pink-400 mt-1">check_circle</span>
              <span><strong>Materi Promosi & Cetak:</strong> Brosur, spanduk, kartu nama, & flyer promosi.</span>
            </li>
            <li class="flex items-start gap-3 text-neutral-300">
              <span class="material-symbols-outlined text-pink-400 mt-1">check_circle</span>
              <span><strong>Packaging Design:</strong> Desain kemasan produk yang unik dan menjual.</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- FITUR / YANG DIDAPATKAN -->
  <section class="py-16 border-t border-border-dark bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center max-w-3xl mx-auto mb-16">
        <h2 class="text-3xl font-bold text-white mb-4">Fitur & Keunggulan Layanan</h2>
        <p class="text-neutral-400">Hasil karya desain dengan standar siap pakai untuk berbagai media.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="p-6 rounded-xl bg-surface-dark border border-border-dark space-y-3">
          <div class="w-12 h-12 rounded-lg bg-pink-500/10 text-pink-400 flex items-center justify-center mb-4">
            <span class="material-symbols-outlined">palette</span>
          </div>
          <h3 class="text-lg font-bold text-white">Custom Sesuai Brand</h3>
          <p class="text-sm text-neutral-400">Desain dibuat eksklusif mengikuti skema warna dan karakteristik bisnis Anda.</p>
        </div>

        <div class="p-6 rounded-xl bg-surface-dark border border-border-dark space-y-3">
          <div class="w-12 h-12 rounded-lg bg-emerald-500/10 text-emerald-400 flex items-center justify-center mb-4">
            <span class="material-symbols-outlined">folder_zip</span>
          </div>
          <h3 class="text-lg font-bold text-white">File Master Lengkap</h3>
          <p class="text-sm text-neutral-400">Penyertaan file mentah beresolusi tinggi (AI, PSD, PNG, JPG, PDF).</p>
        </div>

        <div class="p-6 rounded-xl bg-surface-dark border border-border-dark space-y-3">
          <div class="w-12 h-12 rounded-lg bg-amber-500/10 text-amber-400 flex items-center justify-center mb-4">
            <span class="material-symbols-outlined">print</span>
          </div>
          <h3 class="text-lg font-bold text-white">Siap Cetak & Digital</h3>
          <p class="text-sm text-neutral-400">Format khusus disesuaikan baik untuk kebutuhan cetak offset maupun unggahan digital.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ESTIMASI HARGA -->
  <section class="py-16 border-t border-border-dark bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <div class="max-w-2xl mx-auto space-y-6">
        <h2 class="text-3xl font-bold text-white">Estimasi Biaya Layanan</h2>
        <div class="p-8 rounded-2xl bg-surface-dark border border-border-dark space-y-4">
          <span class="text-neutral-400 text-sm font-semibold uppercase tracking-wider block">Mulai Dari</span>
          <div class="text-4xl md:text-5xl font-black text-white">Rp 500.000</div>
          <p class="text-sm text-neutral-400">Biaya akhir disesuaikan dengan jenis materi visual, jumlah variasi, dan revisi.</p>
          <button class="order-btn px-8 py-3 bg-white text-black font-bold rounded-lg hover:bg-neutral-200 transition" data-service="design">
            Pesan via Formulir
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ KHUSUS LAYANAN -->
  <section class="py-16 border-t border-border-dark bg-background-dark">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-3xl font-bold text-white text-center mb-12">FAQ Desain Grafis</h2>
      <div class="space-y-4">
        <div class="faq-item rounded-xl bg-surface-dark border border-border-dark overflow-hidden">
          <button class="faq-toggle w-full p-6 text-left flex justify-between items-center text-white font-semibold hover:bg-neutral-800/40 transition">
            <span>Berapa opsi konsep yang saya dapatkan?</span>
            <span class="material-symbols-outlined faq-icon text-neutral-400 transition-transform">expand_more</span>
          </button>
          <div class="faq-content hidden px-6 pb-6 text-neutral-400 text-sm leading-relaxed border-t border-neutral-800/50 pt-4">
            Jumlah konsep awal bervariasi sesuai paket pilihan, umumnya 2 hingga 3 pilihan alternatif desain.
          </div>
        </div>

        <div class="faq-item rounded-xl bg-surface-dark border border-border-dark overflow-hidden">
          <button class="faq-toggle w-full p-6 text-left flex justify-between items-center text-white font-semibold hover:bg-neutral-800/40 transition">
            <span>Apakah saya mendapatkan file mentah/vector?</span>
            <span class="material-symbols-outlined faq-icon text-neutral-400 transition-transform">expand_more</span>
          </button>
          <div class="faq-content hidden px-6 pb-6 text-neutral-400 text-sm leading-relaxed border-t border-neutral-800/50 pt-4">
            Ya, seluruh file master vektor (.AI / .EPS / .PSD) diserahkan penuh setelah pengerjaan selesai.
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- BOTTOM CTA -->
  <section class="py-16 border-t border-border-dark bg-background-dark text-center">
    <div class="max-w-4xl mx-auto px-4 space-y-6">
      <h2 class="text-3xl md:text-4xl font-bold text-white">Siap Memperkuat Tampilan Brand Anda?</h2>
      <p class="text-neutral-400">Diskusikan kebutuhan desain visual bisnis Anda bersama tim kami.</p>
      <button class="order-btn px-8 py-4 bg-white text-black font-bold rounded-lg hover:bg-neutral-200 transition text-lg inline-flex items-center gap-2" data-service="design">
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
