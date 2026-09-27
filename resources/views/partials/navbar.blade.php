@php
    $isDark = ($mode ?? request()->query('mode')) === 'dark';
    $currentRoute = request()->route() ? request()->route()->getName() : '';
    $currentPath = request()->path();
    $toggleUrl = request()->fullUrlWithQuery(['mode' => $isDark ? 'light' : 'dark']);
@endphp

<header class="border-b transition-colors duration-300 {{ $isDark ? 'bg-slate-900 border-slate-800 text-slate-100' : 'bg-white border-slate-200/90 text-slate-800' }}">
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

            <!-- Navigasi Utama & Switch Button -->
            <div class="flex items-center gap-2 sm:gap-4">
                <nav class="flex items-center gap-1 text-xs sm:text-sm font-medium">
                    <a href="{{ route('beranda', request()->query()) }}"
                       class="px-3 py-1.5 rounded-md transition-colors {{ ($currentRoute === 'beranda' || $currentPath === '/' || $currentPath === 'beranda') ? ($isDark ? 'bg-slate-800 text-white font-semibold' : 'bg-slate-100 text-slate-900 font-semibold') : ($isDark ? 'text-slate-400 hover:text-slate-200' : 'text-slate-600 hover:text-slate-900') }}">
                        Beranda
                    </a>

                    <a href="{{ route('profil', request()->query()) }}"
                       class="px-3 py-1.5 rounded-md transition-colors {{ ($currentRoute === 'profil' || $currentPath === 'profil-mahasiswa') ? ($isDark ? 'bg-slate-800 text-white font-semibold' : 'bg-slate-100 text-slate-900 font-semibold') : ($isDark ? 'text-slate-400 hover:text-slate-200' : 'text-slate-600 hover:text-slate-900') }}">
                        Profil Mahasiswa
                    </a>

                    <a href="{{ route('ide.agent', request()->query()) }}"
                       class="px-3 py-1.5 rounded-md transition-colors {{ ($currentRoute === 'ide.agent' || $currentPath === 'ide-agent') ? ($isDark ? 'bg-slate-800 text-white font-semibold' : 'bg-slate-100 text-slate-900 font-semibold') : ($isDark ? 'text-slate-400 hover:text-slate-200' : 'text-slate-600 hover:text-slate-900') }}">
                        Ide-Riset Agent
                    </a>
                </nav>

                <!-- Divider pemisah halus -->
                <div class="h-4 w-px {{ $isDark ? 'bg-slate-700' : 'bg-slate-200' }}"></div>

                <!-- Animated Toggle Switch Button -->
                <a href="{{ $toggleUrl }}"
                   title="{{ $isDark ? 'Beralih ke Mode Terang' : 'Beralih ke Mode Gelap' }}"
                   class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border border-transparent transition-colors duration-300 ease-in-out focus:outline-none {{ $isDark ? 'bg-blue-600' : 'bg-slate-200' }}"
                   role="switch"
                   aria-checked="{{ $isDark ? 'true' : 'false' }}">
                    <span class="sr-only">Toggle Dark Mode</span>
                    <span class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow-sm ring-0 transition duration-300 ease-in-out {{ $isDark ? 'translate-x-5' : 'translate-x-0.5' }} flex items-center justify-center mt-0.5">
                        <!-- Icon Sun -->
                        <svg class="h-3 w-3 text-amber-500 transition-opacity duration-200 {{ $isDark ? 'opacity-0 hidden' : 'opacity-100 block' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <!-- Icon Moon -->
                        <svg class="h-3 w-3 text-slate-800 transition-opacity duration-200 {{ $isDark ? 'opacity-100 block' : 'opacity-0 hidden' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
</header>
