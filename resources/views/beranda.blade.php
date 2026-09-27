@extends('layouts.app')

@section('title', 'Beranda Utama')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    {{-- Alert Sambutan Pengguna --}}
    @if (!empty($user))
        <x-status-banner tipe="success">
            <div class="flex items-center justify-between gap-4">
                <p>
                    Selamat datang kembali, <strong>{{ $user }}</strong>!
                </p>
                <a href="{{ route('beranda') }}" class="text-xs text-emerald-800 underline hover:no-underline">
                    Reset
                </a>
            </div>
        </x-status-banner>
    @else
        <x-status-banner tipe="info">
            Selamat datang di Portal Akademik PBKK. Gunakan navigasi untuk melihat Profil Mahasiswa atau Rancangan Ide Riset Agen AI.
        </x-status-banner>
    @endif

    {{-- Pengantar Halaman --}}
    <div class="bg-white rounded-xl border border-slate-200 p-6 sm:p-8 shadow-xs">
        <h1 class="text-2xl font-bold text-slate-800 tracking-tight mb-2">
            Portal Akademik &amp; Rancangan Agentic AI
        </h1>
        <p class="text-slate-600 text-sm leading-relaxed mb-6">
            Aplikasi web ini dibangun untuk memenuhi kriteria Tugas 4 mata kuliah Pemrograman Berbasis Kerangka Kerja (PBKK).
            Seluruh halaman diatur oleh satu master layout utama tanpa duplikasi struktur HTML.
        </p>

        {{-- Form Sapa Pengguna --}}
        <div class="bg-slate-50 border border-slate-200 rounded-lg p-4">
            <h2 class="text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">
                Sapa Pengguna
            </h2>
            <form action="{{ route('beranda') }}" method="GET" class="flex flex-col sm:flex-row gap-2">
                <input type="text"
                       name="user"
                       value="{{ $user ?? '' }}"
                       placeholder="Masukkan nama pengguna..."
                       class="flex-1 bg-white border border-slate-300 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:ring-1 focus:ring-blue-600">
                <button type="submit"
                        class="px-4 py-2 bg-blue-700 hover:bg-blue-800 text-white font-medium text-xs rounded-lg transition">
                    Kirim
                </button>
            </form>
        </div>
    </div>

    {{-- Modul Ringkasan Halaman dengan <x-info-card> --}}
    <div>
        <h2 class="text-base font-bold text-slate-800 mb-3">
            Menu Utama
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($ringkasan as $item)
                <x-info-card :title="$item['judul']">
                    <p class="text-xs text-slate-600 mb-3">
                        {{ $item['deskripsi'] }}
                    </p>
                    @if ($item['link'] !== '#')
                        <a href="{{ $item['link'] }}"
                           class="inline-block text-xs font-semibold text-blue-700 hover:underline">
                            {{ $item['linkText'] }} &rarr;
                        </a>
                    @else
                        <span class="inline-block text-xs font-semibold text-emerald-700">
                            {{ $item['linkText'] }} &#10003;
                        </span>
                    @endif
                </x-info-card>
            @endforeach
        </div>
    </div>

</div>
@endsection
