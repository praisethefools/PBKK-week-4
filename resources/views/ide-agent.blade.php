@extends('layouts.app')

@section('title', 'Ide-Riset Agentic AI' . ($isDark ? ' (Mode Gelap)' : ''))

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    {{-- ========================================================================= --}}
    {{-- TANTANGAN 1: TOGGLE TEMA DINAMIS (Slide 41)                              --}}
    {{-- Mengubah tampilan halaman berdasarkan parameter rute /ide-agent?mode=dark --}}
    {{-- ========================================================================= --}}
    {{-- Header Halaman dengan Tombol Switch Mode Gelap / Terang (Tantangan 1) --}}
    <div class="flex items-center justify-between pb-2 border-b {{ $isDark ? 'border-slate-800' : 'border-slate-200' }}">
        <div>
            <h1 class="text-xl font-bold tracking-tight {{ $isDark ? 'text-white' : 'text-slate-800' }}">
                Ide-Riset Agentic AI
            </h1>
            <p class="text-xs {{ $isDark ? 'text-slate-400' : 'text-slate-500' }}">
                Rancangan platform otomasi pencarian lowongan kerja dan pembuatan CV relevan.
            </p>
        </div>

        {{-- Tombol Switch Tema --}}
        <a href="{{ route('ide.agent', ['mode' => $isDark ? 'light' : 'dark']) }}"
           title="{{ $isDark ? 'Beralih ke Mode Terang' : 'Beralih ke Mode Gelap' }}"
           class="inline-flex items-center p-1 rounded-full border transition-colors {{ $isDark ? 'bg-slate-800 border-slate-700' : 'bg-slate-100 border-slate-300' }}">
            <span class="px-2.5 py-1 rounded-full text-xs flex items-center gap-1 transition-all {{ $isDark ? 'text-slate-400' : 'bg-white shadow-xs text-slate-800 font-semibold' }}">
                ☀️ Terang
            </span>
            <span class="px-2.5 py-1 rounded-full text-xs flex items-center gap-1 transition-all {{ $isDark ? 'bg-slate-700 shadow-xs text-white font-semibold' : 'text-slate-400' }}">
                🌙 Gelap
            </span>
        </a>
    </div>

    {{-- Notifikasi Sukses Form Submit via Komponen <x-status-banner> --}}
    @if (session('pesan_sukses'))
        <x-status-banner tipe="success">
            {{ session('pesan_sukses') }}
        </x-status-banner>
    @endif

    @if ($errors->any())
        <x-status-banner tipe="error">
            <p class="font-bold mb-1">Harap periksa kembali isian formulir:</p>
            <ul class="list-disc list-inside text-xs">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-status-banner>
    @endif

    {{-- ========================================================================= --}}
    {{-- VISUALISASI RANCANGAN PLATFORM AGENTIC AI KELOMPOK (Slide 39)            --}}
    {{-- Konsep: Pencari Lowongan Kerja, Pembuat CV Khusus, dan Apply via User     --}}
    {{-- ========================================================================= --}}
    <div class="rounded-xl border p-6 sm:p-8 transition-colors duration-200 {{ $isDark ? 'bg-slate-800 border-slate-700 text-slate-100' : 'bg-white border-slate-200 text-slate-800' }} shadow-xs">
        <div class="mb-5 pb-4 border-b {{ $isDark ? 'border-slate-700' : 'border-slate-100' }}">
            <span class="text-xs font-bold text-blue-600 block uppercase tracking-wider mb-1">
                Proyek Kelompok PBKK
            </span>
            <h2 class="text-xl font-bold tracking-tight">
                Rancangan Platform: AutoJob &amp; Tailored CV Assistant
            </h2>
            <p class="text-xs {{ $isDark ? 'text-slate-400' : 'text-slate-500' }} mt-1">
                Agen cerdas yang membantu pencarian lowongan kerja, meracik CV spesifik per posisi yang dilamar, dan mengirimkan lamaran setelah disetujui pengguna.
            </p>
        </div>

        {{-- Visualisasi Alur 4 Tahap --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
            @foreach ($tahapanPlatform as $tahap)
                <div class="rounded-lg p-4 border transition-colors {{ $isDark ? 'bg-slate-900 border-slate-700' : 'bg-slate-50 border-slate-200' }}">
                    <h3 class="font-bold text-sm mb-1.5 {{ $isDark ? 'text-blue-400' : 'text-blue-800' }}">
                        {{ $tahap['tahap'] }}
                    </h3>
                    <p class="text-xs {{ $isDark ? 'text-slate-300' : 'text-slate-600' }} leading-relaxed">
                        {{ $tahap['ringkasan'] }}
                    </p>
                </div>
            @endforeach
        </div>

        {{-- Catatan Prinsip Keamanan & Etika Alur --}}
        <div class="p-3.5 rounded-lg border text-xs {{ $isDark ? 'bg-slate-900/60 border-slate-700 text-slate-300' : 'bg-amber-50 border-amber-200 text-amber-900' }}">
            <strong>Prinsip Utama: Human-in-the-Loop.</strong> Agen hanya bertindak sebagai asisten pencari dan peracik dokumen. Keputusan pengiriman lamaran mutlak berada di tangan pengguna untuk menjaga keaslian data dan privasi pelamar.
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- DUA KOLOM: FORMULIR PENGUMPULAN IDE & DAFTAR RENCANA FITUR (Slide 39)    --}}
    {{-- ========================================================================= --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">

        {{-- Kolom 1: Formulir Pengumpulan Ide --}}
        <div class="rounded-xl border p-6 transition-colors duration-200 {{ $isDark ? 'bg-slate-800 border-slate-700 text-slate-100' : 'bg-white border-slate-200 text-slate-800' }} shadow-xs">
            <h2 class="text-base font-bold mb-1">
                Formulir Pengumpulan Ide Fitur
            </h2>
            <p class="text-xs {{ $isDark ? 'text-slate-400' : 'text-slate-500' }} mb-4">
                Sampaikan ide modul atau fitur tambahan untuk platform agen lowongan kerja ini.
            </p>

            <form action="{{ route('ide.store') }}" method="POST" class="space-y-3.5">
                {{-- Token CSRF --}}
                @csrf

                {{-- Menjaga query mode tetap aktif setelah pengiriman form --}}
                <input type="hidden" name="mode" value="{{ $mode }}">

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1 {{ $isDark ? '!text-slate-300' : '' }}">
                        Judul Ide <span class="text-rose-500">*</span>
                    </label>
                    <input type="text"
                           name="judul"
                           value="{{ old('judul') }}"
                           required
                           placeholder="Contoh: Ekstraksi Keahlian Otomatis dari Portofolio"
                           class="w-full text-xs px-3 py-2 rounded-lg border focus:outline-none focus:ring-1 {{ $isDark ? 'bg-slate-900 border-slate-700 text-white focus:ring-blue-500' : 'bg-white border-slate-300 text-slate-800 focus:ring-blue-600' }}">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1 {{ $isDark ? '!text-slate-300' : '' }}">
                            Kategori <span class="text-rose-500">*</span>
                        </label>
                        <select name="kategori"
                                class="w-full text-xs px-2.5 py-2 rounded-lg border focus:outline-none focus:ring-1 {{ $isDark ? 'bg-slate-900 border-slate-700 text-white focus:ring-blue-500' : 'bg-white border-slate-300 text-slate-800 focus:ring-blue-600' }}">
                            <option value="Pencarian Lowongan">Pencarian Lowongan</option>
                            <option value="Generasi CV">Generasi CV</option>
                            <option value="Persetujuan User">Persetujuan User</option>
                            <option value="Integrasi Email / API">Integrasi Email / API</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1 {{ $isDark ? '!text-slate-300' : '' }}">
                            Tingkat Urgensi <span class="text-rose-500">*</span>
                        </label>
                        <select name="urgensi"
                                class="w-full text-xs px-2.5 py-2 rounded-lg border focus:outline-none focus:ring-1 {{ $isDark ? 'bg-slate-900 border-slate-700 text-white focus:ring-blue-500' : 'bg-white border-slate-300 text-slate-800 focus:ring-blue-600' }}">
                            <option value="Rendah">Rendah</option>
                            <option value="Sedang">Sedang</option>
                            <option value="Tinggi">Tinggi</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1 {{ $isDark ? '!text-slate-300' : '' }}">
                        Deskripsi Singkat Ide <span class="text-rose-500">*</span>
                    </label>
                    <textarea name="deskripsi"
                              rows="3"
                              required
                              placeholder="Jelaskan bagaimana modul ini membantu mahasiswa atau pelamar kerja..."
                              class="w-full text-xs px-3 py-2 rounded-lg border focus:outline-none focus:ring-1 {{ $isDark ? 'bg-slate-900 border-slate-700 text-white focus:ring-blue-500' : 'bg-white border-slate-300 text-slate-800 focus:ring-blue-600' }}">{{ old('deskripsi') }}</textarea>
                </div>

                <button type="submit"
                        class="w-full py-2.5 px-4 rounded-lg text-xs font-semibold bg-blue-700 hover:bg-blue-800 text-white transition">
                    Kirimkan Ide ke Sistem
                </button>
            </form>
        </div>

        {{-- Kolom 2: Katalog Ide Riset yang Sudah Tercatat --}}
        <div class="space-y-3">
            <h2 class="text-base font-bold {{ $isDark ? 'text-slate-100' : 'text-slate-800' }}">
                Daftar Ide Fitur Terdaftar
            </h2>

            @forelse ($daftarIde as $ide)
                <x-info-card :title="$ide['judul']"
                             :badge="$ide['kategori']"
                             class="{{ $isDark ? '!bg-slate-800 !border-slate-700 !text-slate-100' : '' }}">
                    <p class="text-xs {{ $isDark ? 'text-slate-300' : 'text-slate-600' }}">
                        {{ $ide['deskripsi'] }}
                    </p>
                    <x-slot:footer>
                        <span class="text-xs {{ $isDark ? 'text-slate-400' : 'text-slate-500' }}">
                            Prioritas: <strong>{{ $ide['urgensi'] }}</strong>
                        </span>
                    </x-slot:footer>
                </x-info-card>
            @empty
                <p class="text-xs text-slate-400 italic">Belum ada ide yang didaftarkan.</p>
            @endforelse
        </div>

    </div>

</div>
@endsection
