<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Laravel') }}</title>

      {{-- Styles --}}
      <link rel="stylesheet" href="{{ mix('css/app.css') }}">

      {{-- Scripts --}}
      <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="flex flex-col overflow-x-hidden font-serif text-gray-700 s7p-bg-img">
      {{-- navigation --}}
      @include('layouts.topnav')

      {{-- hero --}}
      <div class="relative flex flex-col items-center justify-center w-screen h-screen">
        <h1 class="text-3xl font-bold text-center text-pink-500">Pendaftaran<br>Kelas Shirah Shabiayah Season 1<br>sudah ditutup</h1>
        <h2 class="text-xl font-semibold text-center text-pink-400">Terimakasih atas antusiasme Puan-puan sekalian<br>dan nantikan Kelas Shirah Shahabiyah berikutnya</h2>
      </div>

      <div class="fixed bottom-0 hidden w-full grid-cols-2 lg:grid">
        <div>
          <img src="{{asset('images/cactus_left.png')}}" alt="" class="">
        </div>
        <div class="relative">
          <img src="{{asset('images/cactus_right.png')}}" alt="" class="absolute right-5">
        </div>        
      </div>
    </body>
</html>
