@props(['headers' => []])
<div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[640px]">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50">
                    @foreach ($headers as $label => $align)
                        <th class="py-3 px-4 text-{{ $align }} text-sm font-semibold text-slate-500">{{ $label }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div>
