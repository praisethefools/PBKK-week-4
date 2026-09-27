@props(['tipe' => 'info'])

@php
    $kelasColor = [
        'success' => 'bg-emerald-50 border-emerald-500 text-emerald-900',
        'error'   => 'bg-rose-50 border-rose-500 text-rose-900',
        'warning' => 'bg-amber-50 border-amber-500 text-amber-900',
        'info'    => 'bg-blue-50 border-blue-600 text-blue-900',
    ][$tipe] ?? 'bg-slate-100 border-slate-400 text-slate-800';
@endphp

<div {{ $attributes->merge(['class' => "p-4 border-l-4 rounded-r-lg shadow-xs {$kelasColor}"]) }} role="alert">
    <div class="text-sm font-medium leading-relaxed">
        {{ $slot }}
    </div>
</div>
