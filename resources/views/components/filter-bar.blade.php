@props(['action'])
<!-- Start: Filters -->
<form action="{{ $action }}" method="GET" class="bg-white border border-slate-200 rounded-xl p-4 mb-6 grid grid-cols-1 sm:grid-cols-3 gap-3 shadow-sm">
    {{ $slot }}
    <button type="submit" class="px-4 py-2.5 bg-[#2563eb] rounded-xl text-sm font-medium text-white hover:bg-[#1d4ed8]">Filter</button>
</form>
<!-- End: Filters -->
