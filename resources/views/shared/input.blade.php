@php

    $type ??= '';
    $label ??= '';
    $name ??= '';
    $value ??= '';
    $class ??= '';

@endphp



<label class="form-label text-white" for="{{ $label }}">{{ $label }}</label>
@if ($type == 'textarea')
    <textarea value="{{ $value }}" class="form-control {{ $class }}" name="{{ $name }}" cols="30"
        rows="10"></textarea>
@else
    <input value="{{ $value }}" class="form-control {{ $class }}" type="{{ $type }}"
     name="{{ $name }}">
@endif
