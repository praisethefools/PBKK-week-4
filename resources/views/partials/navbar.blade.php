@php
    $isDark = ($mode ?? request()->query('mode')) === 'dark';
    $currentRoute = request()->route() ? request()->route()->getName() : '';
    $currentPath = request()->path();
@endphp

<header class="border-b transition-colors duration-200 {{ $isDark ? 'bg-slate-900 border-slate-800 text-slate-100' : 'bg-white border-slate-200/90 text-slate-800' }}">
    <div class="container mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between h-14 sm:h-16">
            <!-- Brand & Identitas ITS -->
            <a href="{{ route('beranda') }}" class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-md bg-blue-800 text-white flex items-center justify-center font-bold text-xs tracking-wider">
                    ITS
                </div>
                <div>
                    <span class="font-bold text-sm tracking-tight block leading-tight {{ $isDark ? 'text-white' : 'text-slate-900' }}">
                        Portal Akademik PBKK
                    </span>
                    <span class="text-[11px] text-slate-500 font-normal block">
                        Departemen Teknik Informatika
                    </span>
                </div>
            </a>

            <!-- Navigasi Utama -->
            <nav class="flex items-center gap-1 text-xs sm:text-sm font-medium">
                <a href="{{ route('beranda') }}"
                   class="px-3 py-1.5 rounded-md transition-colors {{ ($currentRoute === 'beranda' || $currentPath === '/' || $currentPath === 'beranda') ? ($isDark ? 'bg-slate-800 text-white font-semibold' : 'bg-slate-100 text-slate-900 font-semibold') : ($isDark ? 'text-slate-400 hover:text-slate-200' : 'text-slate-600 hover:text-slate-900') }}">
                    Beranda
                </a>

                <a href="{{ route('profil') }}"
                   class="px-3 py-1.5 rounded-md transition-colors {{ ($currentRoute === 'profil' || $currentPath === 'profil-mahasiswa') ? ($isDark ? 'bg-slate-800 text-white font-semibold' : 'bg-slate-100 text-slate-900 font-semibold') : ($isDark ? 'text-slate-400 hover:text-slate-200' : 'text-slate-600 hover:text-slate-900') }}">
                    Profil Mahasiswa
                </a>

                <a href="{{ route('ide.agent') }}"
                   class="px-3 py-1.5 rounded-md transition-colors {{ ($currentRoute === 'ide.agent' || $currentPath === 'ide-agent') ? ($isDark ? 'bg-slate-800 text-white font-semibold' : 'bg-slate-100 text-slate-900 font-semibold') : ($isDark ? 'text-slate-400 hover:text-slate-200' : 'text-slate-600 hover:text-slate-900') }}">
                    Ide-Riset Agent
                </a>
            </nav>
        </div>
    </div>
</header>
