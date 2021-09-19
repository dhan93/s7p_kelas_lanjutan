@php
    $faq = [
      [
        "q"=>"Apa itu Kelas Shirah Shahabiyah?",
        "a"=>"Kelas Shirah Shahabiyah ini merupakan kelas istimewa yang diselenggarakan secara online oleh Sekolah 7 Perempuan yang mempelajari tentang Shirah Shahabiyah."
      ],
      [
        "q"=>"Siapa saja kah yang bisa mengikuti Kelas Shirah Shahabiyah?",
        "a"=>"Seluruh Alumni Sekolah 7 Perempuan Season 1, 2, dan 3."
      ],
      [
        "q"=>"Apa saja syarat untuk bisa mengikuti Kelas Shirah Shahabiyah?",
        "a"=>"Untuk bisa mengikuti Kelas Shirah Shahabiyah, nomor kamu harus terlebih dahulu terdaftar di Sekolah 7 Perempuan sebagai bukti bahwa kamu adalah salah satu Alumni Sekolah 7 Perempuan."
      ],
      [
        "q"=>"Bagaimana jika nomor lama saya yang terdaftar di Sekolah 7 Perempuan sudah tidak aktif?",
        "a"=>"Silakan hubungi via WhatsApp ke nomor <a href='https://wa.me/6285693935273' class='font-sans underline'>0856-9393-5273</a> dengan melampirkan nama, nomor WhatsApp lama, dan nomor WhatsApp baru yang aktif."
      ],
      [
        "q"=>"Apakah tujuan utama dari Kelas Shirah Shahabiyah?",
        "a"=>"Membentuk pribadi perempuan yang dirindukan syurga dengan menjadikan shahabiyah sebagai teladan."
      ],
      [
        "q"=>"Mengapa kita harus mempelajari Shirah Shahabiyah?",
        "a"=>"Semua perempuan punya banyak amanah peran. Begitu pun dengan para shahabiyah, tak bisa lepas dari multiperan yang merupakan amanah Allah SWT. Walaupun beliau mempunyai peran yang sangat dominan (bahkan terkenal), namun peran - peran lainnya pun dijalankan dengan sangat baik.<br><br>Shahabiyah merupakan teladan perempuan yang perlu kita resapi kisahnya. Mulai peran sebagai hamba hingga kontribusinya unuk umat. Dari beliau kita sebagai perempuan dapat belajar berbagai macam kondisi, keadaan dan juga perjuangan yang luar biasa. Semoga dengan mempelajari shihah shahabiyah, perempuan bisa menjadi sosok yang dinantikan syurga seperti para shahabiyah."
      ],
      [
        "q"=>"Apa Saja materi yang dibahas dalam Kelas Shirah Shahabiyah?",
        "a"=>"<ol class='list-decimal list-inside'><li>Siapakah Shahabiyah itu?</li><li>Mengenal Keluarga Terdekat Rasul</li><li>Mengenal Sosok Istri Rasul Lainnya</li><li>Mengenal Sosok Shahabiyah Lain Yang Berprestasi</li></ol>"
      ],
      [
        "q"=>"Siapa pembicara dalam Kelas Shirah Shahabiyah?",
        "a"=>"Ustadzah Meri"
      ],
      [
        "q"=>"Bagaimana teknis pembelajaran Kelas Shirah Shahabiyah?",
        "a"=>"Pembelajaran di Kelas Shirah Shahabiyah dilaksanakan secara online melalui live zoom dan live youtube."
      ],
      [
        "q"=>"Kapan penyelenggaraan Kelas Shirah Shahabiyah?",
        "a"=>"Bulan September 2021, 4 kali pertemuan dalam 2 pekan."
      ],
      [
        "q"=>"Kapan saja jadwal Kelas Shirah Shahabiyah?",
        "a"=>"<ul class='list-disc list-inside'><li>Tanggal 25 September 2021 pukul 13.30 WIB</li><li>Tanggal 26 September 2021 pukul 13.30 WIB</li><li>Tanggal 2 Oktober 2021 pukul 13.30 WIB</li><li>Tanggal 3 Oktober 2021 pukul 13.30 WIB</li></ul>"
      ],
      [
        "q"=>"Berapa biaya pendaftaran untuk mengikuti Kelas Shirah Shahabiyah?",
        "a"=>"Kelas ini dapat diikuti dengan memberikan infaq terbaik, berapapun nominalnya. Untuk alumni yang pernah berhasil lulus dalam Sekolah 7 Perempuan, dapat mengikuti kelas ini secara gratis sebagai apresiasi dari Sekolah 7 Perempuan."
      ],
    ]
@endphp

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
      <div class="relative flex items-center w-screen h-screen">
        <img src="{{asset('images/pemateri1.png')}}" alt="Kelas Shirah Shahabiyah bersama Ustadzah Meri" class="w-10/12 h-auto mx-auto sm:w-2/3 md:w-auto md:h-2/3">
      </div>

      {{-- Welcome --}}
      <div id="daftar" class="relative z-10 flex flex-row items-center w-full min-h-screen p-2 pt-16 mx-auto text-center md:w-2/3 xl:w-1/2">
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

      {{-- FAQ --}}
      <div id="faq" class="relative z-10 flex flex-row items-center w-full min-h-screen p-2 pt-20 mx-auto text-center md:w-2/3 xl:w-1/2">
        <div class="p-4 bg-white shadow-md rounded-xl">
          <h1 class="mb-2 text-2xl font-bold"><i>Frequently Asked Question</i></h1>
          @foreach ($faq as $item)
            <button class="mt-2 accordion">{{$item['q']}}</button>
            <div class="text-left border panel">
              {!!$item['a']!!}
            </div>
          @endforeach
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
