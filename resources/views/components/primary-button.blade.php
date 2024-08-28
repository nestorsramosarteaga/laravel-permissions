<button
        {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-dark text-uppercase fw-semibold text-white px-4 py-2 rounded border-0 hover-bg-gray-700 focus-bg-gray-700 active-bg-gray-900 focus-ring transition']) }}>
    {{ $slot }}
</button>
