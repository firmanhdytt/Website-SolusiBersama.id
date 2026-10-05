@extends('layouts.app')

@section('title', 'Website Development - SolusiBersama.com')

@section('content')
<!-- Header / Navbar -->
<header class="fixed top-0 left-0 right-0 z-50 border-b border-border-dark bg-background-dark/80 backdrop-blur-md">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-20">
      <!-- LOGO -->
      <a href="{{ url('/') }}" class="flex items-center gap-3">
        <div class="flex items-center justify-center w-10 h-10">
          <img src="/images/logo-putih.png" alt="SolusiBersama Icon" class="w-10 h-10">
        </div>
        <h2 class="text-white text-lg font-bold tracking-tight">
          SolusiBersama<span class="text-neutral-400">.com</span>
        </h2>
      </a>

      <!-- DESKTOP MENU -->
      <nav class="hidden md:flex items-center gap-8">
        <a href="{{ url('/') }}" class="text-neutral-400 hover:text-white text-sm font-medium transition-colors">Beranda</a>
        <a href="{{ url('/#about') }}" class="text-neutral-400 hover:text-white text-sm font-medium transition-colors">Tentang Kami</a>
        <a href="{{ url('/#services') }}" class="text-white text-sm font-semibold transition-colors">Layanan</a>
        <a href="{{ url('/#faq') }}" class="text-neutral-400 hover:text-white text-sm font-medium transition-colors">FAQ</a>
        <a href="{{ url('/#contact') }}" class="text-neutral-400 hover:text-white text-sm font-medium transition-colors">Kontak</a>
      </nav>

      <!-- CTA + MOBILE BUTTON -->
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

  <!-- MOBILE MENU -->
  <div id="mobile-menu" class="md:hidden hidden border-t border-border-dark bg-background-dark px-6 py-4 space-y-4">
    <a href="{{ url('/') }}" class="block text-neutral-400 hover:text-white transition">Beranda</a>
    <a href="{{ url('/#about') }}" class="block text-neutral-400 hover:text-white transition">Tentang Kami</a>
    <a href="{{ url('/#services') }}" class="block text-white font-semibold transition">Layanan</a>
    <a href="{{ url('/#faq') }}" class="block text-neutral-400 hover:text-white transition">FAQ</a>
    <a href="{{ url('/#contact') }}" class="block text-neutral-400 hover:text-white transition">Kontak</a>
    <a href="{{ route('login') }}" class="block text-center bg-white text-black py-2 rounded-lg font-bold hover:bg-neutral-200 transition">Login</a>
  </div>
</header>

<!-- MAIN CONTENT -->
<main class="relative pt-24 bg-background-dark">

  <!-- HERO SECTION -->
  <section class="relative py-16 md:py-24 overflow-hidden">
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
      <div class="absolute top-1/3 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-[650px] aspect-square bg-[radial-gradient(circle,rgba(59,130,246,0.1),transparent_70%)] opacity-80 blur-3xl"></div>
      <div class="absolute inset-0 opacity-15" style="background-image: radial-gradient(rgba(255,255,255,0.15) 1px, transparent 1px); background-size: 24px 24px;"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-3xl mx-auto text-center space-y-6">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-blue-500/20 bg-blue-500/10 text-blue-400 text-xs font-semibold uppercase tracking-wider">
          <span class="material-symbols-outlined text-[16px]">language</span>
          Layanan Website Development
        </div>
        <h1 class="text-4xl md:text-6xl font-black text-white tracking-tight leading-tight">
          Website Profesional & Responsif untuk Bisnis Anda
        </h1>
        <p class="text-lg md:text-xl text-neutral-400 leading-relaxed">
          Bangun kehadiran digital yang kuat dengan website modern, cepat, dan mudah diakses di seluruh perangkat.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
          <button class="order-btn w-full sm:w-auto h-14 px-8 rounded-lg bg-white text-black font-bold hover:bg-neutral-200 transition flex items-center justify-center gap-2" data-service="website">
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
            Mengapa Perusahaan Anda Membutuhkan Website Profesional?
          </h2>
          <p class="text-neutral-400 leading-relaxed">
            Website merupakan etalase utama bisnis Anda di dunia digital. Melalui pembuatan website yang tepat, bisnis Anda dapat meningkatkan kredibilitas, mempermudah calon pelanggan memahami layanan, serta membuka peluang pasar tanpa batas waktu.
          </p>
          <p class="text-neutral-400 leading-relaxed">
            Kami merancang website dengan pendekatan arsitektur informasi terstruktur, visual yang elegan, dan optimasi kecepatan tinggi untuk memberikan pengalaman terbaik bagi pengguna.
          </p>
        </div>

        <div class="p-8 rounded-2xl bg-surface-dark border border-border-dark space-y-6">
          <h3 class="text-xl font-bold text-white">Cakupan Layanan Website:</h3>
          <ul class="space-y-4">
            <li class="flex items-start gap-3 text-neutral-300">
              <span class="material-symbols-outlined text-emerald-400 mt-1">check_circle</span>
              <span><strong>Company Profile:</strong> Website identitas perusahaan yang terpercaya.</span>
            </li>
            <li class="flex items-start gap-3 text-neutral-300">
              <span class="material-symbols-outlined text-emerald-400 mt-1">check_circle</span>
              <span><strong>Landing Page Produk:</strong> Halaman khusus promosi produk dengan konversi tinggi.</span>
            </li>
            <li class="flex items-start gap-3 text-neutral-300">
              <span class="material-symbols-outlined text-emerald-400 mt-1">check_circle</span>
              <span><strong>Website Katalog / E-Commerce:</strong> Penjualan produk dengan sistem katalog ringkas.</span>
            </li>
            <li class="flex items-start gap-3 text-neutral-300">
              <span class="material-symbols-outlined text-emerald-400 mt-1">check_circle</span>
              <span><strong>Integrasi Sistem:</strong> Form kontak, WhatsApp, dan panel kelola konten.</span>
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
        <h2 class="text-3xl font-bold text-white mb-4">Fitur & Yang Anda Dapatkan</h2>
        <p class="text-neutral-400">Setiap proyek website dikerjakan dengan standar kualitas terbaik.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="p-6 rounded-xl bg-surface-dark border border-border-dark space-y-3">
          <div class="w-12 h-12 rounded-lg bg-blue-500/10 text-blue-400 flex items-center justify-center mb-4">
            <span class="material-symbols-outlined">devices</span>
          </div>
          <h3 class="text-lg font-bold text-white">Desain Responsif</h3>
          <p class="text-sm text-neutral-400">Tampilan menyesuaikan secara sempurna di smartphone, tablet, maupun komputer.</p>
        </div>

        <div class="p-6 rounded-xl bg-surface-dark border border-border-dark space-y-3">
          <div class="w-12 h-12 rounded-lg bg-emerald-500/10 text-emerald-400 flex items-center justify-center mb-4">
            <span class="material-symbols-outlined">bolt</span>
          </div>
          <h3 class="text-lg font-bold text-white">Performa Cepat</h3>
          <p class="text-sm text-neutral-400">Kode bersih dan optimasi gambar untuk pemuatan halaman ekstra cepat.</p>
        </div>

        <div class="p-6 rounded-xl bg-surface-dark border border-border-dark space-y-3">
          <div class="w-12 h-12 rounded-lg bg-purple-500/10 text-purple-400 flex items-center justify-center mb-4">
            <span class="material-symbols-outlined">search</span>
          </div>
          <h3 class="text-lg font-bold text-white">SEO Friendly</h3>
          <p class="text-sm text-neutral-400">Struktur meta tag dan heading yang mudah diindeks oleh mesin pencari Google.</p>
        </div>

        <div class="p-6 rounded-xl bg-surface-dark border border-border-dark space-y-3">
          <div class="w-12 h-12 rounded-lg bg-amber-500/10 text-amber-400 flex items-center justify-center mb-4">
            <span class="material-symbols-outlined">chat</span>
          </div>
          <h3 class="text-lg font-bold text-white">Integrasi WhatsApp</h3>
          <p class="text-sm text-neutral-400">Tombol kontak langsung terhubung ke WhatsApp bisnis untuk mempercepat respon.</p>
        </div>

        <div class="p-6 rounded-xl bg-surface-dark border border-border-dark space-y-3">
          <div class="w-12 h-12 rounded-lg bg-pink-500/10 text-pink-400 flex items-center justify-center mb-4">
            <span class="material-symbols-outlined">security</span>
          </div>
          <h3 class="text-lg font-bold text-white">Keamanan Terjamin</h3>
          <p class="text-sm text-neutral-400">Perlindungan dari standar SSL serta konfigurasi keamanan bawaan yang tangguh.</p>
        </div>

        <div class="p-6 rounded-xl bg-surface-dark border border-border-dark space-y-3">
          <div class="w-12 h-12 rounded-lg bg-indigo-500/10 text-indigo-400 flex items-center justify-center mb-4">
            <span class="material-symbols-outlined">admin_panel_settings</span>
          </div>
          <h3 class="text-lg font-bold text-white">Panel Kelola / Admin</h3>
          <p class="text-sm text-neutral-400">Kemudahan dalam memperbarui konten, teks, atau produk secara mandiri.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- EST IMASI HARGA -->
  <section class="py-16 border-t border-border-dark bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <div class="max-w-2xl mx-auto space-y-6">
        <h2 class="text-3xl font-bold text-white">Estimasi Biaya Layanan</h2>
        <div class="p-8 rounded-2xl bg-surface-dark border border-border-dark space-y-4">
          <span class="text-neutral-400 text-sm font-semibold uppercase tracking-wider block">Mulai Dari</span>
          <div class="text-4xl md:text-5xl font-black text-white">Rp 2.500.000</div>
          <p class="text-sm text-neutral-400">Biaya akhir disesuaikan dengan skop fitur, jumlah halaman, dan kebutuhan integrasi.</p>
          <button class="order-btn px-8 py-3 bg-white text-black font-bold rounded-lg hover:bg-neutral-200 transition" data-service="website">
            Pesan via Formulir
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ KHUSUS LAYANAN -->
  <section class="py-16 border-t border-border-dark bg-background-dark">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-3xl font-bold text-white text-center mb-12">FAQ Layanan Website</h2>
      <div class="space-y-4">
        <div class="faq-item rounded-xl bg-surface-dark border border-border-dark overflow-hidden">
          <button class="faq-toggle w-full p-6 text-left flex justify-between items-center text-white font-semibold hover:bg-neutral-800/40 transition">
            <span>Apakah bisa meminta desain custom?</span>
            <span class="material-symbols-outlined faq-icon text-neutral-400 transition-transform">expand_more</span>
          </button>
          <div class="faq-content hidden px-6 pb-6 text-neutral-400 text-sm leading-relaxed border-t border-neutral-800/50 pt-4">
            Ya, seluruh tata letak dan skema warna disesuaikan dengan identitas brand serta preferensi bisnis Anda.
          </div>
        </div>

        <div class="faq-item rounded-xl bg-surface-dark border border-border-dark overflow-hidden">
          <button class="faq-toggle w-full p-6 text-left flex justify-between items-center text-white font-semibold hover:bg-neutral-800/40 transition">
            <span>Apakah domain dan hosting sudah termasuk?</span>
            <span class="material-symbols-outlined faq-icon text-neutral-400 transition-transform">expand_more</span>
          </button>
          <div class="faq-content hidden px-6 pb-6 text-neutral-400 text-sm leading-relaxed border-t border-neutral-800/50 pt-4">
            Paket standar dapat menyertakan konfigurasi domain & hosting, atau menggunakan infrastruktur server milik Anda sendiri.
          </div>
        </div>

        <div class="faq-item rounded-xl bg-surface-dark border border-border-dark overflow-hidden">
          <button class="faq-toggle w-full p-6 text-left flex justify-between items-center text-white font-semibold hover:bg-neutral-800/40 transition">
            <span>Berapa lama proses pembuatan website?</span>
            <span class="material-symbols-outlined faq-icon text-neutral-400 transition-transform">expand_more</span>
          </button>
          <div class="faq-content hidden px-6 pb-6 text-neutral-400 text-sm leading-relaxed border-t border-neutral-800/50 pt-4">
            Waktu pengerjaan berkisar antara 3 hingga 10 hari kerja tergantung kompleksitas konten serta kelengkapan materi dari klien.
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- BOTTOM CTA -->
  <section class="py-16 border-t border-border-dark bg-background-dark text-center">
    <div class="max-w-4xl mx-auto px-4 space-y-6">
      <h2 class="text-3xl md:text-4xl font-bold text-white">Butuh Website Profesional untuk Bisnis Anda?</h2>
      <p class="text-neutral-400">Diskusikan ide proyek Anda sekarang dan dapatkan penawaran terbaik dari tim kami.</p>
      <button class="order-btn px-8 py-4 bg-white text-black font-bold rounded-lg hover:bg-neutral-200 transition text-lg inline-flex items-center gap-2" data-service="website">
        <span>Konsultasikan Project</span>
        <span class="material-symbols-outlined">arrow_forward</span>
      </button>
    </div>
  </section>
</main>

<!-- FOOTER -->
<footer class="bg-background-dark border-t border-border-dark pt-16 pb-8">
  <div class="max-w-7xl mx-auto px-4 text-center text-neutral-500 text-sm">
    © {{ date('Y') }} SolusiBersama.com. Hak Cipta Dilindungi.
  </div>
</footer>

<!-- MODAL ORDER FORM INTEGRATION -->
@include('partials.order-modals')

@endsection
