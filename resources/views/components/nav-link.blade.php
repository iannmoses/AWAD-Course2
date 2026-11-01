@props(['href', 'active' => false, 'icon'])
<a href="{{ $href }}" class="sidebar-item {{ $active ? 'active border-l-3 border-[#2563eb] bg-blue-50 text-[#2563eb]' : 'border-l-3 border-transparent text-slate-500' }} flex items-center p-2 rounded-lg hover:bg-slate-50 hover:text-slate-900 group text-sm transition-all duration-200 pl-3">
    <i data-lucide="{{ $icon }}" class="w-5 h-5 {{ $active ? 'text-[#2563eb]' : 'text-slate-400 group-hover:text-[#2563eb]' }} transition-colors"></i>
    <span class="ms-3 text-sm font-medium">{{ $slot }}</span>
</a>
