@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'd-inline-flex align-items-center px-1 pt-1 me-1 border-bottom border-primary text-decoration-none text-secondary fw-medium'
            : 'd-inline-flex align-items-center px-1 pt-1 me-1 border-bottom border-transparent text-decoration-none text-secondary fw-medium';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
