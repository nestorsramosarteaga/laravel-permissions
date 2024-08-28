<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white shadow-sm">
            <div class="px-md-5 px-lg-4 container px-4 py-3">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Content -->
    <main class="container mt-4 p-10">
        {{ $slot }}
    </main>
</body>

</html>
