<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <main class="container mt-4 p-10">
        <div class="col-md-4 d-flex justify-content-center mx-auto">
            <a href="/">
                <x-application-logo class="bi bi-icon" width="80" height="80" />
            </a>
        </div>

        <div class="col-md-4 mx-auto mt-4 overflow-hidden rounded bg-white p-3 shadow-sm">
            {{ $slot }}
        </div>
    </main>
</body>

</html>
