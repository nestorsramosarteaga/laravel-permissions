<x-app-layout>



    <div class="mx-auto w-4/5">
        <div class="mt-6 w-full max-w-sm rounded-lg bg-gray-200 p-6 shadow-lg">
            <!-- Título de la tarjeta -->
            <h2 class="mb-4 text-xl font-semibold text-gray-800">Create Permissions Page</h2>
            <!-- Botón con icono de agregar -->
            <a href="{{ url('permissions/create') }}"
               class="flex items-center rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-600">
                <!-- Icono de agregar (puedes usar un ícono de Font Awesome, Heroicons, etc.) -->
                <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add Permission
            </a>
            <div class="mt-5 flex flex-row bg-red-200 p-4">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology
                    acquisitions 2021</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                    acquisitions of 2021 so far, in reverse chronological order.</p>
            </div>
        </div>
    </div>



</x-app-layout>
