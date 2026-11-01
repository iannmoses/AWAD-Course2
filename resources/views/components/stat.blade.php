@props(['icon', 'color' => 'blue', 'number', 'label'])
@php
    $colors = ['blue' => ['bg-blue-50', 'text-[#2563eb]'], 'amber' => ['bg-amber-50', 'text-[#d97706]'], 'green' => ['bg-emerald-50', 'text-emerald-600']];
    [$bg, $text] = $colors[$color] ?? $colors['blue'];
@endphp
<div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm">
    <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-lg {{ $bg }} flex items-center justify-center"><i data-lucide="{{ $icon }}" class="w-5 h-5 {{ $text }}"></i></div>
        <div>
            <p class="text-2xl font-bold">{{ $number }}</p>
            <p class="text-sm text-slate-500">{{ $label }}</p>
        </div>
    </div>
</div>
