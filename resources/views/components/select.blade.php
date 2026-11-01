@props(['label', 'name', 'options', 'selected' => null, 'placeholder' => null, 'hint' => null])
@php
    $items = array_is_list($options) ? array_combine($options, $options) : $options;
@endphp
<div>
    <label for="{{ $name }}" class="block text-sm font-medium text-slate-600 mb-2">{{ $label }} <span class="text-[#d97706]">*</span></label>
    <select id="{{ $name }}" name="{{ $name }}" required class="input-field {{ $errors->has($name) ? 'border-red-300' : '' }}">
        @if ($placeholder)<option value="">{{ $placeholder }}</option>@endif
        @foreach ($items as $value => $text)
            <option value="{{ $value }}" @selected((string) old($name, $selected) === (string) $value)>{{ $text }}</option>
        @endforeach
    </select>
    @if ($hint)<p class="text-xs text-slate-500 mt-2">{{ $hint }}</p>@endif
    @error($name)<p class="text-xs text-red-600 mt-2">{{ $message }}</p>@enderror
</div>
