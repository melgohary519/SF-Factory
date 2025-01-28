<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">



    @livewireStyles
</head>

<body>

    @php
        $currentRoute = Route::currentRouteName();
    @endphp

    @if ($currentRoute != "login")
        @livewire("components.side-bar")
    @endif

    <div class="content">

        @if ($currentRoute != "login")
            @livewire("components.nav-bar")
        @endif

        {{ $slot }}

        @if ($currentRoute != "login")
            @livewire("components.footer")
        @endif

    </div>



    @livewireScripts

</body>

</html>
