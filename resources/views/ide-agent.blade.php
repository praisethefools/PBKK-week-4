@extends('layouts.app')

@section('title', 'Ide-Riset Agentic AI' . ($isDark ? ' (Mode Gelap)' : ''))

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    {{-- Header Halaman dengan Tombol Switch Mode Gelap / Terang (Tantangan 1) --}}
    <div class="flex items-center justify-between pb-4 border-b {{ $isDark ? 'border-slate-800' : 'border-slate-200' }}">
        <div>
            <h1 class="text-xl font-bold tracking-tight {{ $isDark ? 'text-white' : 'text-slate-900' }}">
                Ide-Riset Agentic AI
            </h1>
            <p class="text-xs {{ $isDark ? 'text-slate-400' : 'text-slate-500' }} mt-0.5">
                Rancangan platform otomasi pencarian lowongan kerja dan pembuatan CV relevan.
            </p>
        </div>

        {{-- Switch Mode Gelap / Terang Tanpa Emotikon --}}
        <a href="{{ route('ide.agent', ['mode' => $isDark ? 'light' : 'dark']) }}"
           class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md border text-xs font-medium transition {{ $isDark ? 'bg-slate-800 border-slate-700 text-slate-200 hover:bg-slate-750' : 'bg-white border-slate-200 text-slate-700 hover:bg-slate-50 shadow-xs' }}">
            @if ($isDark)
                <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <span>Mode Gelap</span>
            @else
                <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                </svg>
                <span>Mode Terang</span>
            @endif
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
            <p class="font-semibold mb-1">Harap periksa kembali isian formulir:</p>
            <ul class="list-disc list-inside text-xs">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-status-banner>
    @endif

    {{-- Visualisasi Rancangan Platform Agentic AI Kelompok --}}
    <div class="rounded-lg border p-6 transition-colors duration-200 {{ $isDark ? 'bg-slate-800/90 border-slate-700 text-slate-100' : 'bg-white border-slate-200/90 text-slate-800 shadow-[0_1px_2px_rgba(0,0,0,0.03)]' }}">
        <div class="mb-5 pb-3 border-b {{ $isDark ? 'border-slate-700' : 'border-slate-100' }}">
            <span class="text-[11px] font-semibold text-blue-600 block uppercase tracking-wider mb-0.5">
                Proyek Kelompok PBKK
            </span>
            <h2 class="text-lg font-bold tracking-tight {{ $isDark ? 'text-white' : 'text-slate-900' }}">
                Rancangan Platform: AutoJob &amp; Tailored CV Assistant
            </h2>
            <p class="text-xs {{ $isDark ? 'text-slate-400' : 'text-slate-500' }} mt-1">
                Agen cerdas yang membantu pencarian lowongan kerja, meracik CV spesifik per posisi yang dilamar, dan mengirimkan lamaran setelah disetujui pengguna.
            </p>
        </div>

        {{-- Visualisasi Alur 4 Tahap --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 mb-5">
            @foreach ($tahapanPlatform as $tahap)
                <div class="rounded-md p-4 border transition-colors {{ $isDark ? 'bg-slate-900/80 border-slate-700/80' : 'bg-slate-50/70 border-slate-200/80' }}">
                    <h3 class="font-semibold text-xs sm:text-sm mb-1.5 {{ $isDark ? 'text-blue-400' : 'text-blue-900' }}">
                        {{ $tahap['tahap'] }}
                    </h3>
                    <p class="text-xs {{ $isDark ? 'text-slate-300' : 'text-slate-600' }} leading-relaxed">
                        {{ $tahap['ringkasan'] }}
                    </p>
                </div>
            @endforeach
        </div>

        {{-- Catatan Prinsip Keamanan & Etika Alur --}}
        <div class="p-3 rounded-md border text-xs {{ $isDark ? 'bg-slate-900/60 border-slate-700 text-slate-300' : 'bg-slate-50 border-slate-200 text-slate-700' }}">
            <strong>Prinsip Utama: Human-in-the-Loop.</strong> Agen bertindak sebagai asisten pencari dan pembuat draf dokumen. Keputusan pengiriman lamaran mutlak berada di tangan pengguna.
        </div>
    </div>

    {{-- Dua Kolom: Formulir Pengumpulan Ide & Daftar Rencana Fitur --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 items-start">

        {{-- Kolom 1: Formulir Pengumpulan Ide --}}
        <div class="rounded-lg border p-5 transition-colors duration-200 {{ $isDark ? 'bg-slate-800/90 border-slate-700 text-slate-100' : 'bg-white border-slate-200/90 text-slate-800 shadow-[0_1px_2px_rgba(0,0,0,0.03)]' }}">
            <h2 class="text-sm font-bold tracking-tight mb-1 {{ $isDark ? 'text-white' : 'text-slate-900' }}">
                Formulir Pengumpulan Ide Fitur
            </h2>
            <p class="text-xs {{ $isDark ? 'text-slate-400' : 'text-slate-500' }} mb-4">
                Sampaikan usulan modul atau alur kerja tambahan untuk pengembangan platform.
            </p>

            <form action="{{ route('ide.store') }}" method="POST" class="space-y-3">
                @csrf
                <input type="hidden" name="mode" value="{{ $mode }}">

                <div>
                    <label class="block text-xs font-medium mb-1 {{ $isDark ? 'text-slate-300' : 'text-slate-700' }}">
                        Judul Ide <span class="text-rose-500">*</span>
                    </label>
                    <input type="text"
                           name="judul"
                           value="{{ old('judul') }}"
                           required
                           placeholder="Nama modul atau ide fitur..."
                           class="w-full text-xs px-3 py-2 rounded-md border focus:outline-none focus:ring-1 {{ $isDark ? 'bg-slate-900 border-slate-700 text-white focus:ring-blue-500' : 'bg-white border-slate-300 text-slate-800 focus:ring-blue-700' }}">
                </div>

                <div class="grid grid-cols-2 gap-2.5">
                    <div>
                        <label class="block text-xs font-medium mb-1 {{ $isDark ? 'text-slate-300' : 'text-slate-700' }}">
                            Kategori <span class="text-rose-500">*</span>
                        </label>
                        <select name="kategori"
                                class="w-full text-xs px-2.5 py-2 rounded-md border focus:outline-none focus:ring-1 {{ $isDark ? 'bg-slate-900 border-slate-700 text-white focus:ring-blue-500' : 'bg-white border-slate-300 text-slate-800 focus:ring-blue-700' }}">
                            <option value="Pencarian Lowongan">Pencarian Lowongan</option>
                            <option value="Generasi CV">Generasi CV</option>
                            <option value="Persetujuan User">Persetujuan User</option>
                            <option value="Integrasi Email / API">Integrasi Email / API</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-medium mb-1 {{ $isDark ? 'text-slate-300' : 'text-slate-700' }}">
                            Prioritas <span class="text-rose-500">*</span>
                        </label>
                        <select name="urgensi"
                                class="w-full text-xs px-2.5 py-2 rounded-md border focus:outline-none focus:ring-1 {{ $isDark ? 'bg-slate-900 border-slate-700 text-white focus:ring-blue-500' : 'bg-white border-slate-300 text-slate-800 focus:ring-blue-700' }}">
                            <option value="Rendah">Rendah</option>
                            <option value="Sedang">Sedang</option>
                            <option value="Tinggi">Tinggi</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-medium mb-1 {{ $isDark ? 'text-slate-300' : 'text-slate-700' }}">
                        Deskripsi Alur / Fitur <span class="text-rose-500">*</span>
                    </label>
                    <textarea name="deskripsi"
                              rows="3"
                              required
                              placeholder="Uraikan bagaimana fitur ini bekerja dan manfaatnya..."
                              class="w-full text-xs px-3 py-2 rounded-md border focus:outline-none focus:ring-1 {{ $isDark ? 'bg-slate-900 border-slate-700 text-white focus:ring-blue-500' : 'bg-white border-slate-300 text-slate-800 focus:ring-blue-700' }}">{{ old('deskripsi') }}</textarea>
                </div>

                <button type="submit"
                        class="w-full py-2 px-4 rounded-md text-xs font-semibold bg-blue-800 hover:bg-blue-900 text-white transition">
                    Simpan Ide
                </button>
            </form>
        </div>

        {{-- Kolom 2: Katalog Ide Riset yang Sudah Tercatat --}}
        <div class="space-y-3">
            <h2 class="text-sm font-bold tracking-tight {{ $isDark ? 'text-white' : 'text-slate-900' }}">
                Daftar Usulan Fitur
            </h2>

            @forelse ($daftarIde as $ide)
                <x-info-card :title="$ide['judul']"
                             :badge="$ide['kategori']"
                             class="{{ $isDark ? '!bg-slate-800 !border-slate-700 !text-slate-100' : '' }}">
                    <p class="text-xs {{ $isDark ? 'text-slate-300' : 'text-slate-600' }}">
                        {{ $ide['deskripsi'] }}
                    </p>
                    <x-slot:footer>
                        <span class="text-[11px] {{ $isDark ? 'text-slate-400' : 'text-slate-500' }}">
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
