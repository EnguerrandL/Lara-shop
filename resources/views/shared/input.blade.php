@php

    $type ??= '';
    $label ??= '';
    $name ??= '';
    $value ??= '';
    $class ??= '';

@endphp



<label class="form-label text-white" for="{{ $label }}">{{ $label }}</label>
@if ($type == 'textarea')
    <textarea  @error($name) is-invalid  @enderror   class="form-control {{ $class }}" name="{{ $name }}" cols="30"
        rows="10">{{ old($name, $value)}}</textarea>
@else
    <input  @error($name) is-invalid  @enderror value="{{ old($name, $value)}}" class="form-control {{ $class }}" type="{{ $type }}"
     name="{{ $name }}">
@endif
@error($name)
    <div class="invalid-feedback">
        {{ $message }}

    </div>
 @enderror 