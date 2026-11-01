@props(['name', 'sub' => null])
@php
    $initials = \Illuminate\Support\Str::of($name)->explode(' ')->filter()->take(2)
        ->map(fn ($word) => \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($word, 0, 1)))->implode('');
@endphp
<div class="flex items-center gap-3">
    <div class="w-8 h-8 rounded-full bg-blue-50 text-[#2563eb] flex items-center justify-center text-xs font-semibold shrink-0">{{ $initials }}</div>
    <div>
        <div class="text-sm">{{ $name }}</div>
        @if ($sub)<div class="text-xs text-slate-500">{{ $sub }}</div>@endif
    </div>
</div>
