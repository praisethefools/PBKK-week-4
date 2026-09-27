# Tugas 4 PBKK — Aplikasi Multi-View Profil Akademik & Platform Agentic AI

Aplikasi web akademik berbasis **Laravel 13**, **Blade Templating**, dan **Vite (Tailwind CSS)** yang dibangun untuk memenuhi kriteria penilaian **Tugas 4 (CPMK-1: 25%)** mata kuliah Pemrograman Berbasis Kerangka Kerja (PBKK), Departemen Teknik Informatika ITS.

---

## 👤 Identitas Mahasiswa

- **Nama:** Abdurrahman Arrafi Ravsan Zarnadi
- **NRP:** 5025241241
- **Email:** 5025241241@student.its.ac.id
- **Departemen:** Teknik Informatika — FTEIC ITS
- **Peran:** vibe coding pecut claude

---

## 📌 Rangkuman Singkat Aplikasi

Aplikasi mengelola tiga halaman utama melalui satu master layout terpusat dan satu `PageController`:

1. **Beranda (`/` atau `/beranda`):**
   - Menampilkan ringkasan akses navigasi dan formulir sapa pengguna.
   - **Tantangan 2 (Alert Status Interaktif):** Mendeteksi parameter URL `?user=...` (contoh: `/beranda?user=Andi`) dan menampilkan banner sambutan personal secara dinamis melalui komponen `<x-status-banner>`.
2. **Profil Mahasiswa (`/profil-mahasiswa`):**
   - Menampilkan data akademik dan peran kelompok menggunakan komponen kartu kustom `<x-info-card>`.
   - Menampilkan tabel rencana studi yang diiterasi menggunakan directive Blade `@forelse` dan variabel bantu `$loop` (`$loop->iteration`, `$loop->first`).
3. **Ide-Riset Agentic AI (`/ide-agent`):**
   - Menampilkan rancangan platform kelompok **AutoJob & Tailored CV Assistant** (pencari lowongan kerja, peracik CV sesuai lowongan, persetujuan user *Human-in-the-Loop*, dan tracking).
   - Menyediakan formulir pengumpulan ide fitur baru dengan pengamanan `@csrf`.
   - **Tantangan 1 (Toggle Tema Dinamis):** Dilengkapi tombol switch animasi mulus di samping navbar untuk beralih antara Mode Terang dan Mode Gelap (`/ide-agent?mode=dark`).

---

## ⚙️ Panduan Setup & Menjalankan Aplikasi

Pastikan sistem Anda telah terpasang **PHP >= 8.2**, **Composer**, dan **Node.js (NPM)**.

### 1. Kloning Repositori
```bash
git clone <url-repositori-anda>
cd "PBKK Week 4 Tugas"
```

### 2. Pasang Dependensi Backend (Composer)
```bash
composer install
```

### 3. Konfigurasi Environment
Salin berkas contoh environment dan buat application key:
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Pasang Dependensi Frontend & Kompilasi Aset (Vite)
Aplikasi menggunakan bundler lokal Vite tanpa tautan CDN mentah:
```bash
npm install
npm run build
```
> *Catatan: Jalankan `npm run dev` jika ingin mengaktifkan Hot Module Replacement (HMR) selama pengembangan.*

### 5. Jalankan Server Lokal
```bash
php artisan serve
```
Aplikasi dapat diakses melalui browser pada alamat: **http://127.0.0.1:8000**

---

## 🧪 Menjalankan Pengujian Otomatis (PHPUnit)

Untuk memvalidasi seluruh rute, pewarisan master layout, komponen Blade, dan kedua tantangan rute dinamis:
```bash
php artisan test --filter=MultiViewAcademicTest
```
Seluruh 6 skenario pengujian dipastikan **100% lolos (PASS)**.

---

## 📁 Struktur Berkas Utama

```text
├── app/Http/Controllers/
│   └── PageController.php           # Controller tunggal untuk seluruh 3 view & form
├── resources/views/
│   ├── layouts/
│   │   └── app.blade.php            # Master layout terpusat (@yield, @vite, @include)
│   ├── partials/
│   │   ├── navbar.blade.php         # Navbar dengan switch button tema dinamis
│   │   └── footer.blade.php         # Footer resmi ITS
│   ├── components/
│   │   ├── info-card.blade.php      # Komponen kustom <x-info-card>
│   │   └── status-banner.blade.php  # Komponen kustom <x-status-banner>
│   ├── beranda.blade.php            # View Beranda (Challenge 2)
│   ├── profil.blade.php             # View Profil Mahasiswa & Tabel MK
│   └── ide-agent.blade.php          # View Ide Agent & Form (Challenge 1)
├── routes/
│   └── web.php                      # Rute web terarah ke PageController
└── tests/Feature/
    └── MultiViewAcademicTest.php    # Unit & feature testing
```

---
&copy; 2026 Departemen Teknik Informatika ITS. Hak Cipta Dilindungi.
