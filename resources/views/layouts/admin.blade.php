<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="block">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        {{-- icons --}}
        <link href="https://css.gg/css?=|arrow-right|check-o|chevron-left|eye|menu" rel="stylesheet">

        {{-- vue --}}
        <script src="https://unpkg.com/vue@next"></script>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-serif antialiased text-gray-700 s7p-bg-img">
        @include('layouts.adminnav')
        <div class="w-full p-4 mx-auto bg-white rounded-md">
            @if(session('success'))
              <div class="p-2 text-center text-white bg-green-400 rounded-md">
                {{ session('success') }}
              </div>
            @endif
            <main>
                @yield('main')
            </main>
        </div>
        @yield('js-bottom')
    </body>
</html>
