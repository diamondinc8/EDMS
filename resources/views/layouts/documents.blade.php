<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main class="py-4">
        <div class="d-flex">
            <div class="p-2 flex-xl-shrink-0">
                <a href="" class="btn btn-secondary">Орешки биг боб</a>
            </div>
            <div class="p-2 w-100">
                @yield('content')
            </div>
        </div>
    </main>
    </div>
</body>

</html>
