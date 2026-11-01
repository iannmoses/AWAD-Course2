@props(['action', 'method' => 'POST', 'cancel', 'submit' => 'Save'])
<!-- Start: Form -->
<form action="{{ $action }}" method="POST" class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm max-w-2xl">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif
    <div class="p-6 space-y-5">
        {{ $slot }}
    </div>
    <div class="px-4 py-4 bg-white border-t border-slate-200 flex justify-between">
        <a href="{{ $cancel }}" class="px-4 py-2 border border-slate-200 rounded-lg text-sm text-slate-600 hover:bg-slate-100">Cancel</a>
        <button type="submit" class="px-4 py-2 bg-[#2563eb] rounded-lg text-sm font-medium text-white hover:bg-[#1d4ed8]">{{ $submit }}</button>
    </div>
</form>
<!-- End: Form -->
