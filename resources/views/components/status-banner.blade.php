@props(['tipe' => 'info'])

@php
    $kelasColor = [
        'success' => 'bg-emerald-50/70 border-emerald-600 text-emerald-950',
        'error'   => 'bg-rose-50/70 border-rose-600 text-rose-950',
        'warning' => 'bg-amber-50/70 border-amber-600 text-amber-950',
        'info'    => 'bg-sky-50/70 border-sky-600 text-sky-950',
    ][$tipe] ?? 'bg-slate-100 border-slate-500 text-slate-900';
@endphp

<div {{ $attributes->merge(['class' => "p-3.5 sm:p-4 border-l-3 rounded-r-md shadow-[0_1px_2px_rgba(0,0,0,0.03)] {$kelasColor}"]) }} role="alert">
    <div class="text-xs sm:text-sm font-medium leading-relaxed">
        {{ $slot }}
    </div>
</div>
