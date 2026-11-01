@props(['title', 'sub' => null, 'back' => null, 'backText' => 'Back'])
<!-- Start: Page heading -->
<div class="mb-6">
    @if ($back)
        <a href="{{ $back }}" class="inline-flex items-center text-sm text-slate-500 hover:text-slate-900 mb-3"><i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>{{ $backText }}</a>
    @endif
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-xl font-semibold">{{ $title }}</h1>
            @if ($sub)<p class="text-sm text-slate-500 mt-1">{{ $sub }}</p>@endif
        </div>
        {{ $slot }}
    </div>
</div>
<!-- End: Page heading -->
