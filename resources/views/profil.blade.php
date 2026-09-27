@extends('layouts.app')

@section('title', 'Profil Mahasiswa')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    {{-- Header Banner Profil Mahasiswa --}}
    <div class="bg-white rounded-lg border border-slate-200/90 p-6 shadow-[0_1px_2px_rgba(0,0,0,0.04)]">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-5 border-b border-slate-100">
            <div>
                <span class="inline-block px-2 py-0.5 rounded text-[11px] font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200/60 mb-2">
                    {{ $mahasiswa['status'] }}
                </span>
                <h1 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight">
                    {{ $mahasiswa['nama'] }}
                </h1>
                <p class="text-xs sm:text-sm text-slate-500 font-mono mt-0.5">
                    NRP: {{ $mahasiswa['nrp'] }} &bull; {{ $mahasiswa['email'] }}
                </p>
            </div>

            <div class="text-left sm:text-right text-xs">
                <span class="text-slate-400 block">Departemen</span>
                <span class="font-semibold text-slate-800 block">{{ $mahasiswa['departemen'] }}</span>
                <span class="text-slate-500 block">{{ $mahasiswa['institusi'] }}</span>
            </div>
        </div>

        <div class="pt-4 text-xs sm:text-sm text-slate-600 leading-relaxed">
            <p>{{ $mahasiswa['deskripsi'] }}</p>
        </div>
    </div>

    {{-- Detail Akademik & Peran Kelompok Menggunakan <x-info-card> --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <x-info-card title="Informasi Akademik" badge="FTEIC ITS">
            <dl class="space-y-2 text-xs">
                <div>
                    <dt class="text-slate-400">Institusi:</dt>
                    <dd class="font-semibold text-slate-800">{{ $mahasiswa['institusi'] }}</dd>
                </div>
                <div>
                    <dt class="text-slate-400">Fakultas:</dt>
                    <dd class="font-medium text-slate-700">{{ $mahasiswa['fakultas'] }}</dd>
                </div>
                <div>
                    <dt class="text-slate-400">Departemen:</dt>
                    <dd class="font-medium text-slate-700">{{ $mahasiswa['departemen'] }}</dd>
                </div>
            </dl>
        </x-info-card>

        <x-info-card title="Peran Kelompok Agentic AI" badge="Tugas 4">
            <div class="space-y-2 text-xs">
                <div>
                    <span class="text-slate-400 block">Peran Utama:</span>
                    <span class="font-semibold text-slate-900 text-sm block mt-0.5">{{ $mahasiswa['peran_kelompok'] }}</span>
                </div>
                <div>
                    <span class="text-slate-400 block">Fokus Proyek:</span>
                    <p class="text-slate-600 mt-0.5">
                        Pengembangan alur kerja otomasi pencarian lowongan kerja, kustomisasi CV per posisi lowongan, dan mekanisme approval sebelum lamaran dikirimkan.
                    </p>
                </div>
            </div>
        </x-info-card>
    </div>

    {{-- Tabel Mata Kuliah dengan Implementasi Looping Blade ($loop->iteration, $loop->first, $loop->last) --}}
    <div class="bg-white rounded-lg border border-slate-200/90 p-5 sm:p-6 shadow-[0_1px_2px_rgba(0,0,0,0.04)]">
        <div class="mb-4">
            <h2 class="text-sm sm:text-base font-bold text-slate-900">
                Daftar Mata Kuliah Terkait
            </h2>
            <p class="text-xs text-slate-500">
                Riwayat rencana studi menggunakan directive <code>@@forelse</code> dan variabel bantu <code>$loop</code> (Slide 31 &amp; 35).
            </p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs sm:text-sm">
                <thead>
                    <tr class="border-b border-slate-200 text-slate-500 text-[11px] uppercase tracking-wider font-semibold">
                        <th class="py-2.5 px-3">No</th>
                        <th class="py-2.5 px-3">Kode</th>
                        <th class="py-2.5 px-3">Nama Mata Kuliah</th>
                        <th class="py-2.5 px-3">SKS</th>
                        <th class="py-2.5 px-3">Dosen Pengampu</th>
                        <th class="py-2.5 px-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($mataKuliah as $mk)
                        <tr class="{{ $loop->first ? 'bg-slate-50/80 font-medium' : '' }} hover:bg-slate-50/50 transition">
                            <td class="py-2.5 px-3 font-mono text-slate-400 text-xs">
                                {{ $loop->iteration }}
                            </td>
                            <td class="py-2.5 px-3 font-mono text-slate-600 text-xs">
                                {{ $mk['kode'] }}
                            </td>
                            <td class="py-2.5 px-3 text-slate-900 font-medium">
                                {{ $mk['nama'] }}
                            </td>
                            <td class="py-2.5 px-3 font-mono text-slate-700">
                                {{ $mk['sks'] }}
                            </td>
                            <td class="py-2.5 px-3 text-slate-700">
                                {{ $mk['dosen'] }}
                            </td>
                            <td class="py-2.5 px-3">
                                <span class="inline-block px-2 py-0.5 rounded text-[11px] {{ $mk['status'] === 'Sedang Ditempuh' ? 'bg-blue-50 text-blue-800 border border-blue-200/60 font-medium' : 'bg-slate-100 text-slate-700' }}">
                                    {{ $mk['status'] }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-4 text-center text-slate-400 italic">
                                Belum ada mata kuliah yang dicatat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Keahlian Teknis --}}
    <x-info-card title="Penguasaan Perangkat Lunak &amp; Teknologi">
        <div class="flex flex-wrap gap-1.5 pt-1">
            @foreach ($keahlian as $skill)
                <span class="inline-block px-2.5 py-1 rounded text-xs bg-slate-50 text-slate-700 border border-slate-200">
                    {{ $skill }}
                </span>
            @endforeach
        </div>
    </x-info-card>

</div>
@endsection
