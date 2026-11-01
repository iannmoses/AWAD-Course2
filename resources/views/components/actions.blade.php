@props(['show' => null, 'edit' => null, 'delete' => null, 'confirm' => 'Delete this record?'])
<span class="inline-flex items-center gap-3">
    @if ($show)
        <a href="{{ $show }}" class="text-[#2563eb]" title="View"><i data-lucide="eye" class="w-4 h-4 inline"></i></a>
    @endif
    @if ($edit)
        <a href="{{ $edit }}" class="text-[#2563eb]" title="Edit"><i data-lucide="edit" class="w-4 h-4 inline"></i></a>
    @endif
    @if ($delete)
        <form action="{{ $delete }}" method="POST" class="inline" onsubmit="return confirm(@js($confirm))">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600" title="Delete"><i data-lucide="trash-2" class="w-4 h-4 inline"></i></button>
        </form>
    @endif
</span>
