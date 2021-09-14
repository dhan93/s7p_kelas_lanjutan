<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Laravel') }}</title>

      {{-- Styles --}}
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">

      {{-- Scripts --}}
      <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="flex flex-col overflow-x-hidden font-serif antialiased text-gray-700 s7p-bg-img">
      <div class="fixed top-0 z-20 grid w-full grid-cols-2 p-2 text-pink-400" style="background: rgba(251, 207, 232, 0.7)">
        <div class="w-full">
          <img src="{{asset('images/logo_7perempuan_300.png')}}" alt="7 perempuan" class="w-auto h-10">
        </div>
        <div class="w-full mt-2 font-semibold text-right">
          <a href="#daftar" class="p-2 mr-2 hover:text-pink-300">Daftar</a>
          <a href="#faq" class="p-2 hover:text-pink-300">F.A.Q.</a>
        </div>
      </div>
      <div class="relative flex items-center w-screen h-screen">
        <img src="{{asset('images/pemateri1.png')}}" alt="Kelas Shirah Shahabiyah bersama Ustadzah Meri" class="w-10/12 h-auto mx-auto sm:w-2/3 md:w-auto md:h-2/3">
      </div>
      <div id="daftar" class="relative z-10 flex flex-row items-center w-full min-h-screen p-2 mx-auto text-center md:w-1/2">
        <div class="p-4 bg-white shadow-md rounded-xl">
          <h1 class="text-2xl font-bold">Selamat Datang...!</h1>
          <p>Assalamu'alaikum Warahmatullahi Wabarakatuh</p>
          <br>
          <p>Hai Puan Shalihah..</p>
          <p>Berjumpa lagi dengan Sekolah 7 Perempuan..</p>
          <br>
          <p>Kali ini Sekolah 7 Perempuan akan mengadakan <strong>Kelas Shirah Shahabiyah</strong>..</p>
          <p>Pastinya sudah tidak sabar lagi untuk ikut Kelas Spesial ini kan? Iya dong..</p>
          <br>
          <p>Spesial untuk seluruh Alumni Siswa Sekolah 7 Perempuan Season 1, 2 dan 3 bisa ikutan kelas bersama Ustadzah Meri ini..</p>
          <p>Insya Allah kita akan belajar selama 2 pekan dengan 4 kali pertemuan zoom..</p>
          <br>
          <p>Silahkan daftarkan diri Puan yaa, klik link daftar yang ada di bawah..</p>
          <br>
          <p>Bismillah..</p>
          <p>Semoga dengan mempelajari shirah shahabiyah, Puan bisa belajar untuk menjadi sosok yang dinantikan syurga seperti para shahabiyah..</p>

          <a href="{{route('registration.index')}}" class="inline-block px-4 py-1 mt-4 text-white bg-pink-500 rounded-md">Daftar Sekarang</a>
        </div>
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
