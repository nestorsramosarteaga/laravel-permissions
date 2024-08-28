@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border shadow-sm rounded focus:border-primary focus:ring focus:ring-primary',
]) !!}>
