@props(['color' => 'slate'])
@php
    $colors = [
        'blue' => 'bg-blue-50 text-[#2563eb]',
        'amber' => 'bg-amber-50 text-[#d97706]',
        'green' => 'bg-emerald-50 text-emerald-700',
        'slate' => 'bg-slate-100 text-slate-600',
        'red' => 'bg-red-50 text-red-600',
    ];
@endphp
<span class="text-xs px-2 py-1 rounded-full {{ $colors[$color] ?? $colors['slate'] }}">{{ $slot }}</span>
