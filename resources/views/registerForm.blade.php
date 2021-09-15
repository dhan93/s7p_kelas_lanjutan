@extends('layouts.app')

@section('title', 'Registrasi')

@section('main')
  @if ($errors->any())
      <div class="px-4 py-2 text-red-900 bg-red-300 rounded-md {{$class ?? '' }}">
          <ul class="list-disc list-inside">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  <div>
    <h1 class="mb-4 text-2xl font-bold text-center">Registrasi Kelas Shirah Shahabiyah</h1>
    <a href="{{route('registration.index')}}" class="inline-block px-2 py-1 mb-2 -mt-2 font-sans text-sm font-semibold text-pink-500 border border-pink-500 rounded-md">< kembali</a>
    <form action="" method="POST" class="">
      @csrf
      <div class="w-full text-center">
        <p class="text-lg"><strong>Hai {{$user->name}}..! </strong></p>
        @if ($user->get_free)
          <p>Karena kamu pernah lulus di Sekolah 7 Perempuan, sebagai rewardnya Kamu berhak untuk mengikuti kelas ini secara <strong>gratis</strong>.</p>
          <br>
          <p>Silakan klik tombol Lanjut mendaftar jika Kamu berminat untuk mendaftar sekarang.</p>
        @else
          <p>Sebagai Alumni Sekolah 7 Perempuan, Kamu boleh mengikuti kelas ini dengan memberikan infaq terbaik kamu.</p>
          <p class="mt-2">Insya Allah infaqmu akan bermanfaat untuk perjuangan dakwah Islam.</p>
          <br>
          <p>Silakan klik tombol Lanjut mendaftar jika Kamu berminat untuk mendaftar sekarang.</p>          
        @endif
      </div>
      <div class="w-full text-center">
        <a href="" class="inline-block px-4 py-2 mx-auto mt-4 text-sm text-white bg-pink-500 rounded-md">
          Lanjut Mendaftar
        </a>
      </div>
    </form>
  </div>
@endsection