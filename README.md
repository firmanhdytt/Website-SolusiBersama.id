# 🌐 SolusiBersama.id - Website & Management System

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Vite](https://img.shields.io/badge/Vite-6.x-646CFF?style=for-the-badge&logo=vite&logoColor=white)](https://vitejs.dev)
[![License](https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge)](LICENSE)

**SolusiBersama.id** adalah platform berbasis web yang dikembangkan menggunakan **Laravel 12** untuk mengelola layanan digital, pemesanan (*orders*), sistem pembayaran & piutang, timeline pengerjaan proyek, serta laporan keuangan dan manajemen klien secara terintegrasi.

---

## ✨ Fitur Utama

### 📱 Public / Landing Page
- **Halaman Utama (Landing Page)**: Informasi layanan dan penawaran SolusiBersama.id.
- **Formulir Pemesanan Layanan**: Klien dapat langsung melakukan pemesanan layanan secara daring.
- **Formulir Kontak**: Klien dapat mengirimkan pesan langsung ke admin.

### 📊 Admin Dashboard & Analytical Insights
- **Key Performance Indicators (KPI)**: Ringkasan total order, proyek aktif, transaksi bulanan, order lunas, serta kalkulasi sisa piutang.
- **Monitoring Tenggat Waktu (Deadline Alert)**: Pengingat otomatis untuk order yang mendekati deadline (*near deadline*) atau sudah melewati deadline (*overdue*).
- **Grafik & Visualisasi**: Visualisasi tren pendapatan harian dan grafik distribusi pendapatan per jenis layanan.

### 📋 Manajemen Pemesanan (Order Management)
- **Pelacakan Status Order**: Update status pengerjaan (*Pending*, *Proses*, *Selesai*).
- **Manajemen Status Pembayaran**: Pengelolaan status pembayaran (*Belum*, *DP*, *Lunas*).
- **Atur Tenggat Waktu**: Penetapan dan penyesuaian deadline proyek.

### 💳 Manajemen Pembayaran & Invoicing
- **Pencatatan Transaksi**: Pengelolaan riwayat pembayaran DP maupun pelunasan per order.
- **Export Invoice & Pembayaran**: Ekspor bukti pembayaran dan rincian transaksi dalam format **PDF** dan **Excel**.

### 🗓️ Timeline & Kalender Proyek
- **Visualisasi Timeline**: Kalender pengerjaan untuk memantau progres dan jadwal rilis tiap proyek.

### 👥 Manajemen Klien & Laporan
- **Database Klien**: Rekapitulasi riwayat transaksi dan data kontak klien.
- **Laporan Keuangan & Proyek**: Ekspor laporan lengkap ke format **Excel** menggunakan Maatwebsite Excel.

### 🔐 Otentikasi & Keamanan
- Autentikasi Admin terproteksi middleware.
- Manajemen Profil & Pembaruan kata sandi Admin.

---

## 🛠️ Teknologi & Dependensi Utama

- **Framework Back-End**: [Laravel 12](https://laravel.com)
- **Bahasa Pemrograman**: PHP ^8.2
- **Front-End Build Tool**: [Vite](https://vitejs.dev) + Tailwind CSS / Blade Templates
- **Ekspor Dokumen PDF**: `barryvdh/laravel-dompdf`
- **Ekspor Spreadsheet**: `maatwebsite/excel`
- **Database**: MySQL / MariaDB / SQLite

---

## ⚙️ Persyaratan Sistem (Prerequisites)

Pastikan lingkungan pengembangan Anda telah memenuhi persyaratan berikut:

- **PHP** >= 8.2 (dengan ekstensi `pdo`, `mbstring`, `openssl`, `gd`, `zip`, `xml` diaktifkan)
- **Composer** >= 2.x
- **Node.js** >= 18.x & **NPM**
- **MySQL / MariaDB** (atau SQLite)

---

## 🚀 Panduan Instalasi & Memulai

Ikuti langkah-langkah di bawah ini untuk menjalankan proyek di lingkungan lokal (misal: XAMPP):

### 1. Clone Repositori
```bash
git clone https://github.com/firmanhdytt/Website-SolusiBersama.id.git
cd Website-SolusiBersama.id
```

### 2. Instal Dependensi Composer & NPM
```bash
composer install
npm install
```

### 3. Konfigurasi Lingkungan (.env)
Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```
Sesuaikan konfigurasi database pada file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=solusibersama
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Jalankan Migrasi & Database Seeder
```bash
php artisan migrate --seed
```

### 6. Build Aset Front-End
Untuk mode pengembangan (*development*):
```bash
npm run dev
```
Atau untuk *production build*:
```bash
npm run build
```

### 7. Jalankan Server Lokal
```bash
php artisan serve
```
Akses aplikasi melalui peramban web di: `http://127.0.0.1:8000`

---

## 📁 Struktur Direktori Utama

```text
solusibersama/
├── app/
│   ├── Http/Controllers/    # Controller utama (Order, Payment, Dashboard, Profile, Client, dll.)
│   └── Models/              # Model Eloquent (User, Order, Payment, Contact)
├── config/                  # Konfigurasi aplikasi
├── database/
│   ├── migrations/          # Struktur tabel database
│   └── seeders/             # Data awal database
├── public/                  # Aset publik (gambar, CSS/JS hasil build)
├── resources/
│   ├── views/               # Blade Templates (Landing page & Admin Dashboard)
│   └── js / css             # Source file aset Vite
├── routes/
│   ├── web.php              # Definisi route aplikasi web
│   └── console.php          # CLI Commands
└── storage/                 # Storage ter-upload & file export
```

---

## 📄 Lisensi

Proyek ini dirilis di bawah lisensi [MIT License](LICENSE).

---

## 👨‍💻 Pengembang

Dikembangkan untuk **SolusiBersama.id** oleh [firmanhdytt](https://github.com/firmanhdytt).

