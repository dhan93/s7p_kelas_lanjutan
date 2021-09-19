<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        {{-- icons --}}
        <link href="https://css.gg/css?=|arrow-right|check-o|chevron-left|menu" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="flex items-center font-serif antialiased text-gray-700 s7p-bg-img">
        @include('layouts.topnav')
        <div class="w-4/5 p-4 mx-auto mt-16 bg-white rounded-md">
            
            <main>
                @yield('main')
            </main>
        </div>
        @yield('js-bottom')
    </body>
</html>
