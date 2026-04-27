@php
$type  ??= 'text';
$class ??= null;
$name  ??= '';
$value ??= '';
$label ??= ucfirst($name);
@endphp

<div class="admin-field {{ $class ?? '' }}">
    <label class="admin-label" for="{{ $name }}">{{ $label }}</label>

    @if($type === 'textarea')
        <textarea
            class="admin-input @error($name) is-invalid @enderror"
            id="{{ $name }}"
            name="{{ $name }}"
            rows="4"
        >{{ old($name, $value) }}</textarea>
    @else
        <input
            class="admin-input @error($name) is-invalid @enderror"
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            value="{{ old($name, $value) }}"
        >
    @endif

    @error($name)
        <div class="admin-invalid-feedback">{{ $message }}</div>
    @enderror
</div>