@props(['href', 'icon' => null])
<a href="{{ $href }}" class="inline-flex items-center px-4 py-2 bg-[#2563eb] rounded-lg text-sm font-medium text-white hover:bg-[#1d4ed8]">
    @if ($icon)<i data-lucide="{{ $icon }}" class="w-4 h-4 mr-2"></i>@endif
    {{ $slot }}
</a>
