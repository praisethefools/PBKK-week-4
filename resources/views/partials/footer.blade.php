@php
    $isDark = ($mode ?? request()->query('mode')) === 'dark';
@endphp

<footer class="mt-auto border-t py-6 transition-colors duration-200 {{ $isDark ? 'bg-slate-900 border-slate-800 text-slate-400' : 'bg-white border-slate-200 text-slate-600' }}">
    <div class="container mx-auto px-4 sm:px-6 text-center text-xs space-y-1">
        <p class="font-medium {{ $isDark ? 'text-slate-300' : 'text-slate-700' }}">
            &copy; {{ date('Y') }} Departemen Teknik Informatika ITS. Hak Cipta Dilindungi.
        </p>
        <p class="text-slate-400">
            Pemrograman Berbasis Kerangka Kerja (PBKK) &mdash; Institut Teknologi Sepuluh Nopember, Surabaya
        </p>
    </div>
</footer>
