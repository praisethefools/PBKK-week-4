@props([
    'title' => null,
    'badge' => null,
])

<div {{ $attributes->merge(['class' => 'bg-white rounded-lg border border-slate-200/90 shadow-[0_1px_2px_rgba(0,0,0,0.04)] overflow-hidden transition-all']) }}>
    @if ($title || isset($header) || $badge)
        <div class="px-5 py-3 border-b border-slate-100 flex items-center justify-between gap-3 bg-slate-50/60">
            <div>
                @if (isset($header))
                    {{ $header }}
                @elseif ($title)
                    <h3 class="font-semibold text-slate-900 text-sm tracking-tight">{{ $title }}</h3>
                @endif
            </div>

            @if ($badge)
                <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium bg-slate-100 text-slate-700 border border-slate-200/80">
                    {{ $badge }}
                </span>
            @endif
        </div>
    @endif

    <div class="p-5 text-sm text-slate-600 leading-relaxed space-y-2">
        {{ $slot }}
    </div>

    @if (isset($footer))
        <div class="px-5 py-2.5 border-t border-slate-100 bg-slate-50/40 text-xs text-slate-500">
            {{ $footer }}
        </div>
    @endif
</div>
