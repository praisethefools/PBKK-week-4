<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Halaman Beranda (/)
     * Menangani Tantangan 2: membaca parameter 'user' dari URL (?user=...)
     */
    public function beranda(Request $request): View
    {
        $user = $request->query('user');

        $ringkasan = [
            [
                'judul' => 'Profil Mahasiswa',
                'deskripsi' => 'Data identitas akademik, riwayat mata kuliah, dan keahlian mahasiswa Teknik Informatika ITS.',
                'link' => route('profil'),
                'linkText' => 'Buka Profil',
            ],
            [
                'judul' => 'Riset Agentic AI',
                'deskripsi' => 'Konsep platform otomasi pencarian lowongan kerja, pembuatan CV relevan, dan proses apply dengan persetujuan user.',
                'link' => route('ide.agent'),
                'linkText' => 'Lihat Rancangan',
            ],
            [
                'judul' => 'Implementasi Tugas 4',
                'deskripsi' => 'Penggunaan master layout terpusat (@extends), komponen reusable (<x-info-card> & <x-status-banner>), dan bundler Vite.',
                'link' => '#',
                'linkText' => 'Spesifikasi Terpenuhi',
            ],
        ];

        return view('beranda', compact('user', 'ringkasan'));
    }

    /**
     * Halaman Profil Mahasiswa (/profil-mahasiswa)
     */
    public function profil(): View
    {
        $mahasiswa = [
            'nama' => 'Abdurrahman Arrafi Ravsan Zarnadi',
            'nrp' => '5025241241',
            'email' => '5025241241@student.its.ac.id',
            'departemen' => 'Departemen Teknik Informatika',
            'fakultas' => 'Fakultas Teknologi Elektro dan Informatika Cerdas (FTEIC)',
            'institusi' => 'Institut Teknologi Sepuluh Nopember (ITS)',
            'status' => 'Mahasiswa Aktif',
            'peran_kelompok' => 'vibe coding pecut claude',
            'deskripsi' => 'Mahasiswa Teknik Informatika ITS yang sedang menempuh mata kuliah Pemrograman Berbasis Kerangka Kerja (PBKK).',
        ];

        $mataKuliah = [
            [
                'kode' => 'IF4401',
                'nama' => 'Pemrograman Berbasis Kerangka Kerja',
                'sks' => 3,
                'dosen' => 'Dosen PBKK',
                'status' => 'Sedang Ditempuh',
            ],
            [
                'kode' => 'IF4301',
                'nama' => 'Pemrograman Berorientasi Objek',
                'sks' => 3,
                'dosen' => 'Dosen PBKK',
                'status' => 'Lulus',
            ],
            [
                'kode' => 'IF4202',
                'nama' => 'Struktur Data dan Algoritma',
                'sks' => 4,
                'dosen' => 'Dosen PBKK',
                'status' => 'Lulus',
            ],
            [
                'kode' => 'IF4305',
                'nama' => 'Basis Data',
                'sks' => 3,
                'dosen' => 'Dosen PBKK',
                'status' => 'Lulus',
            ],
        ];

        $keahlian = [
            'Laravel & PHP',
            'Blade Templating',
            'Tailwind CSS & Vite',
            'Python',
            'Git & GitHub',
            'Alur Integrasi AI',
        ];

        return view('profil', compact('mahasiswa', 'mataKuliah', 'keahlian'));
    }

    /**
     * Halaman Ide-Riset Agentic AI (/ide-agent)
     * Menangani Tantangan 1: toggle tema gelap via parameter ?mode=dark
     */
    public function ideAgent(Request $request): View
    {
        $mode = $request->query('mode', 'light');
        $isDark = ($mode === 'dark');

        // Visualisasi alur kerja platform kelompok
        $tahapanPlatform = [
            [
                'tahap' => '1. Crawling & Kurasi Lowongan',
                'ringkasan' => 'Agen otomatis mencari lowongan pekerjaan yang relevan dari berbagai portal kerja berdasarkan preferensi bidang, keahlian, dan kriteria yang ditentukan pengguna.',
            ],
            [
                'tahap' => '2. Pembuatan CV Khusus (Tailored CV)',
                'ringkasan' => 'Untuk setiap lowongan yang cocok, agen menganalisis kualifikasi yang dicari perusahaan dan otomatis menyesuaikan poin-poin relevan pada CV pengguna tanpa mengada-ada.',
            ],
            [
                'tahap' => '3. Pratinjau & Persetujuan Pengguna',
                'ringkasan' => 'Pengguna dapat meninjau lowongan dan draf CV yang telah disiapkan. Lamaran TIDAK AKAN pernah dikirim sebelum ada persetujuan langsung dari pengguna (Human-in-the-Loop).',
            ],
            [
                'tahap' => '4. Pengiriman Lamaran & Pelacakan',
                'ringkasan' => 'Setelah pengguna menekan tombol setuju (apply), agen mengirimkan berkas lamaran dan mencatat riwayat pengiriman ke dalam daftar pelacakan status.',
            ],
        ];

        // Daftar ide yang sudah ada
        $daftarIde = [
            [
                'judul' => 'Pencocok Kualifikasi Resume & Job Description',
                'kategori' => 'Analisis CV',
                'urgensi' => 'Tinggi',
                'deskripsi' => 'Modul agen untuk membandingkan kecocokan profil pelamar dengan kualifikasi lowongan dan memberikan skor relevansi sebelum pembuatan CV.',
            ],
            [
                'judul' => 'Format Generator CV Standar ATS',
                'kategori' => 'Generasi Dokumen',
                'urgensi' => 'Sedang',
                'deskripsi' => 'Modul untuk mengekspor CV hasil kurasi ke dalam format PDF ramah ATS yang rapi dan konsisten sesuai standar industri.',
            ],
            [
                'judul' => 'Pengingat Batas Akhir Lamaran Otomatis',
                'kategori' => 'Notifikasi',
                'urgensi' => 'Rendah',
                'deskripsi' => 'Fitur notifikasi terjadwal yang memberi tahu pengguna jika lowongan yang disimpan akan segera ditutup.',
            ],
        ];

        return view('ide-agent', compact('isDark', 'mode', 'tahapanPlatform', 'daftarIde'));
    }

    /**
     * Memproses formulir penambahan ide baru
     */
    public function simpanIde(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|min:3|max:100',
            'kategori' => 'required|string',
            'urgensi' => 'required|string',
            'deskripsi' => 'required|string|min:10',
        ]);

        $mode = $request->input('mode', 'light');

        return redirect()->route('ide.agent', ['mode' => $mode])
            ->with('pesan_sukses', "Ide '{$validated['judul']}' berhasil dicatat ke dalam daftar rencana pengembangan.");
    }
}
