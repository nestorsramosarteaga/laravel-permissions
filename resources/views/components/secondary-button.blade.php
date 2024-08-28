<button
        {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-secondary text-uppercase fw-semibold text-gray-700 border shadow-sm px-4 py-2 rounded focus:ring focus:ring-primary focus:ring-offset-2 disabled opacity-75 transition']) }}>
    {{ $slot }}
</button>
