@props(['label', 'name', 'type' => 'text', 'value' => null, 'placeholder' => '', 'required' => true, 'readonly' => false, 'hint' => null])
<div>
    <label for="{{ $name }}" class="block text-sm font-medium text-slate-600 mb-2">{{ $label }} @if ($required)<span class="text-[#d97706]">*</span>@endif</label>
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
        @if ($type !== 'password') value="{{ old($name, $value) }}" @endif
        placeholder="{{ $placeholder }}" @required($required) @readonly($readonly)
        class="input-field {{ $errors->has($name) ? 'border-red-300' : '' }} {{ $readonly ? 'bg-slate-50' : '' }}">
    @if ($hint)<p class="text-xs text-slate-500 mt-2">{{ $hint }}</p>@endif
    @error($name)<p class="text-xs text-red-600 mt-2">{{ $message }}</p>@enderror
</div>
