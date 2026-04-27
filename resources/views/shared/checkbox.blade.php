@php
$class ??= null;
$name  ??= '';
$label ??= ucfirst($name);
$value ??= false;
@endphp

<div class="admin-field {{ $class ?? '' }}">
    <label class="admin-label">{{ $label }}</label>
    <div class="form-check form-switch" style="padding-top:.3rem;">
        <input type="hidden" name="{{ $name }}" value="0">
        <input
            class="form-check-input @error($name) is-invalid @enderror"
            type="checkbox"
            role="switch"
            id="{{ $name }}"
            name="{{ $name }}"
            value="1"
            @checked(old($name, $value ?? false))
            style="width:2.4em; height:1.3em; cursor:pointer;"
        >
        <label class="form-check-label ms-2" for="{{ $name }}"
               style="color:var(--light-gray); font-size:.85rem; cursor:pointer;">
            Cocher si vendu
        </label>
    </div>

    @error($name)
        <div class="admin-invalid-feedback">{{ $message }}</div>
    @enderror
</div>