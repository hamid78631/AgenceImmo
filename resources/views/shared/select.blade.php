@php
$class ??= null;
$name  ??= '';
$value ??= collect();
$label ??= ucfirst($name);
@endphp

<div class="admin-field {{ $class ?? '' }}">
    <label class="admin-label" for="{{ $name }}">{{ $label }}</label>

    <select name="{{ $name }}[]" id="{{ $name }}" multiple>
        @foreach($options as $k => $v)
            <option @selected($value->contains($k)) value="{{ $k }}">{{ $v }}</option>
        @endforeach
    </select>

    @error($name)
        <div class="admin-invalid-feedback">{{ $message }}</div>
    @enderror
</div>