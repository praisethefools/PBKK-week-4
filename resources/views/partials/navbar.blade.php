@php
    $isDark = ($mode ?? request()->query('mode')) === 'dark';
    $currentRoute = request()->route() ? request()->route()->getName() : '';
    $currentPath = request()->path();
@endphp

<header class="border-b transition-colors duration-200 {{ $isDark ? 'bg-slate-900 border-slate-800 text-slate-100' : 'bg-white border-slate-200 text-slate-800' }}">
    <div class="container mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between h-16">
            <!-- Brand & Identitas ITS -->
            <a href="{{ route('beranda') }}" class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-lg bg-blue-700 text-white flex items-center justify-center font-bold text-sm tracking-tight">
                    ITS
                </div>
                <div>
                    <span class="font-bold text-sm sm:text-base tracking-tight block leading-tight">
                        Portal Akademik PBKK
                    </span>
                    <span class="text-xs text-slate-500 font-normal block">
                        Teknik Informatika ITS
                    </span>
                </div>
            </a>

            <!-- Navigasi Utama -->
            <nav class="flex items-center gap-1 sm:gap-2 text-xs sm:text-sm font-medium">
                <a href="{{ route('beranda') }}"
                   class="px-3 py-2 rounded-lg transition-colors {{ ($currentRoute === 'beranda' || $currentPath === '/' || $currentPath === 'beranda') ? ($isDark ? 'bg-slate-800 text-blue-400 font-semibold' : 'bg-blue-50 text-blue-700 font-semibold') : ($isDark ? 'text-slate-300 hover:text-white' : 'text-slate-600 hover:text-slate-900') }}">
                    Beranda
                </a>

                <a href="{{ route('profil') }}"
                   class="px-3 py-2 rounded-lg transition-colors {{ ($currentRoute === 'profil' || $currentPath === 'profil-mahasiswa') ? ($isDark ? 'bg-slate-800 text-blue-400 font-semibold' : 'bg-blue-50 text-blue-700 font-semibold') : ($isDark ? 'text-slate-300 hover:text-white' : 'text-slate-600 hover:text-slate-900') }}">
                    Profil Mahasiswa
                </a>

                <a href="{{ route('ide.agent') }}"
                   class="px-3 py-2 rounded-lg transition-colors {{ ($currentRoute === 'ide.agent' || $currentPath === 'ide-agent') ? ($isDark ? 'bg-slate-800 text-blue-400 font-semibold' : 'bg-blue-50 text-blue-700 font-semibold') : ($isDark ? 'text-slate-300 hover:text-white' : 'text-slate-600 hover:text-slate-900') }}">
                    Ide-Riset Agent
                </a>
            </nav>
        </div>
    </div>
</header>
