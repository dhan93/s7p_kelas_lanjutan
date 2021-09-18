@extends('layouts.app')

@section('title', 'Status Pendaftaran')

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
    <h1 class="mb-4 text-2xl font-bold text-center">Status Pendaftaran</h1>
    <a href="{{route('welcome')}}" class="inline-block px-2 py-1 mb-2 -mt-2 font-sans text-sm font-semibold text-pink-500 border border-pink-500 rounded-md">< kembali</a>
    
    <form action="{{route('status')}}" method="GET">  
      @csrf
      {{-- <div class="w-full text-center">
        <p class="text-lg"><strong>Hai Puan {{$userData->name ?? ''}}..! </strong></p>
        <p>Terimakasih sudah mendaftar di Kelas Shirah Shahabiyah.</p>
        <p>Silakan melakukan konfirmasi pembayaran infaq dengan mengisi formulir di bawah ini.</p>
      </div> --}}
      <div class="w-full mt-4">
        <label for="id" class="font-semibold">No. WhatsApp</label>
        <input type="text" name="id" id="id" class="w-full font-sans border-gray-400 rounded-md focus:text-gray-700" placeholder="contoh: 6281234567890" required >
        <small>Nomor WhatsApp yang digunakan saat di Sekolah 7 Perempuan</small>
      </div>

      <div class="w-full text-center">
        <button type="submit" class="inline-block px-4 py-2 mx-auto mt-4 text-sm text-white bg-pink-500 rounded-md">
          Selanjutnya
        </button>
      </div>
    </form>
  </div>
@endsection

@section('js-bottom')

@endsection