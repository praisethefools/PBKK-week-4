@props([
    'title' => null,
    'badge' => null,
])

<div {{ $attributes->merge(['class' => 'bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden']) }}>
    @if ($title || isset($header) || $badge)
        <div class="px-5 py-3.5 border-b border-slate-100 flex items-center justify-between gap-3 bg-slate-50/50">
            <div>
                @if (isset($header))
                    {{ $header }}
                @elseif ($title)
                    <h3 class="font-semibold text-slate-800 text-sm sm:text-base">{{ $title }}</h3>
                @endif
            </div>

            @if ($badge)
                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800">
                    {{ $badge }}
                </span>
            @endif
        </div>
    @endif

    <div class="p-5 text-sm text-slate-600 leading-relaxed space-y-2">
        {{ $slot }}
    </div>

    @if (isset($footer))
        <div class="px-5 py-3 border-t border-slate-100 bg-slate-50/30 text-xs text-slate-500">
            {{ $footer }}
        </div>
    @endif
</div>
