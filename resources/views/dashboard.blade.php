<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-semibold fs-3 text-dark lh-sm">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="container-xl px-sm-4 px-lg-5 min-h-full px-3">
            <div class="overflow-hidden rounded bg-white shadow-lg">
                <div class="text-dark p-4">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
