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
    <h1 class="mb-4 text-2xl font-bold text-center">Registrasi Kelas Lanjutan Sekolah 7 Perempuan</h1>
    <a href="{{route('registration.index')}}" class="inline-block px-2 py-1 mb-2 -mt-2 font-sans text-sm font-semibold text-pink-500 border border-pink-500 rounded-md">< kembali</a>
    <form action="{{route('registration.update', $user->id)}}" method="POST" class="">
      @csrf
      @method('PATCH')
      <div class="w-full text-center">
        <p class="text-lg"><strong>Hai Puan {{$user->name}}..! </strong></p>
        @if ($user->get_free)
          <p>Karena Puan pernah lulus di Sekolah 7 Perempuan, sebagai rewardnya Puan berhak untuk mengikuti kelas ini secara <strong>gratis</strong>.</p>
          <br>
          <p>Silakan klik tombol Lanjut mendaftar jika Puan berminat untuk mendaftar sekarang.</p>
        @else
          <p>Sebagai Alumni Sekolah 7 Perempuan, Puan boleh mengikuti kelas ini dengan terlebih dahulu <strong>memberikan infaq terbaik</strong> Puan.</p>
          <p class="mt-2">Insya Allah infaq Puan akan bermanfaat untuk perjuangan dakwah Islam.</p>
          <br>
          <p>Silakan klik tombol Lanjut mendaftar jika Puan berminat untuk mendaftar sekarang.</p>          
        @endif
      </div>

      <div class="w-full text-center">
        <button type="submit" class="inline-block px-4 py-2 mx-auto mt-4 text-sm text-white bg-pink-500 rounded-md">
          Lanjut Mendaftar
        </button>
      </div>

      {{-- <input type="hidden" name="userID" value="{{$user->id}}"> --}}
    </form>
  </div>
@endsection