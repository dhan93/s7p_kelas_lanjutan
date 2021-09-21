@php
  $status = '';
  $statusStyle = 'info';
    switch ($userData->registration_status) {
      // 'non registrant','registering','waiting','registered','canceled' 	
      case 'non registrant':
        $status = 'belum Terdaftar';
        $statusId = 0;
        break;
      case 'registering':
        $status = 'menunggu pembayaran infaq';
        $statusId = 1;
        break;
      case 'waiting':
        $status = 'dalam proses konfirmasi';
        $statusId = 2;
        break;
      case 'registered':
        $status = 'terdafatar';
        $statusId = 3;
        $statusStyle = 'green';
        break;
      case 'canceled':
        $status = 'dibatalkan';
        $statusId = 3;
        $statusStyle = 'yellow';
        break;
      default:
        $status = 'unknown';
        $statusId = 99;
        break;
    }
@endphp

@extends('layouts.app')

@section('title', 'Registrasi')

@section('main')
  <h1 class="mb-4 text-2xl font-bold text-center">Status Pendaftaran</h1>
  <a href="{{route('welcome')}}" class="inline-block px-2 py-1 mb-2 -mt-2 font-sans text-sm font-semibold text-pink-500 border border-pink-500 rounded-md">< kembali</a>

  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <div class="flex p-4 mb-4 bg-red-100 rounded-lg">
        <svg class="w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <p class="ml-3 text-sm text-red-700">
          {{$error}}
        </p>
      </div>
    @endforeach
  @endif

  @if (session('error'))
    <div class="flex p-4 mb-4 bg-red-100 rounded-lg">
      <svg class="w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
      <p class="ml-3 text-sm text-red-700">
        {{ session('error') }}    
      </p>
    </div>
  @endif

  <div class="pb-4 text-center">
    <p>Halo Puan <strong>{{$userData->name}}</strong>..</p>
    @switch($userData->registration_status)
        @case('non registrant')
            <p>Saat ini status pendaftaran kamu adalah <span class="font-semibold text-blue-500">Belum Terdaftar</span></p>
            <p>Silakan klik tombol di bawah untuk memulai registrasi</p>
            <form action="{{route('registration.create')}}" method="POST" class="">
              @csrf
              <input type="hidden" name="phone" value="{{$userData->phone}}">
              <button type="submit" class="inline-block px-4 py-1 mt-4 text-white bg-pink-500 rounded-md">Daftar Sekarang</button>
            </form>
            @break
        @case('registering')
            <p>Saat ini status pendaftaran Puan adalah <span class="font-semibold text-blue-500">Menunggu Pembayaran infaq</span></p>
            <p>Silakan terlebih dahulu kirimkan infaq terbaikmu ke rekening yang tercantum di bawah ini.</p>
            <div class="p-3 mx-auto my-2 text-center border rounded-md">
              <p><strong>Bank Syariah Indonesia (BSI)</strong></p>
              <p class="font-sans">7145870067</p>
              <p>a.n WELLY NURLIANA</p>
            </div>
            <p>Jika sudah melakukan pembayaran, silakan konfirmasi transfer dengan klik tombol di bawah.</p>
            <a href="{{route('confirmation.index').'/?id='.$userData->phone}}" class="inline-block px-4 py-1 mt-4 text-white bg-pink-500 rounded-md">Konfirmasi Infaq</a>
            <p class="mt-4"><small>*Halaman ini bisa diakses kembali dari menu <strong>Status Pendaftaran</strong></small></p>
            @break
        @case('waiting')
            <p>Saat ini status pendaftaran Puan adalah <span class="font-semibold text-blue-500">Dalam Proses Verifikasi</span>.</p>
            <p>Kami akan memverifikasi pembayaranmu dalam waktu maksimal 2 x 24jam.</p>
            @break
        @case('registered')
            <p>Selamat, saat ini Puan telah sukses <span class="font-semibold text-green-500">Terdaftar</span>.</p>
            <p>Informasi selanjutnya akan kami sampaikan via WhatsApp.</p>
            @if ($userData->get_free && !$userData->donor)
              <br>
              <p>Puan juga boleh menunjukkan infaq terbaik puan dengan melakukan transfer ke rekening</p>
                <div class="p-3 mx-auto my-2 text-center border rounded-md">
                  <p><strong>Bank Syariah Indonesia (BSI)</strong></p>
                  <p class="font-sans">7145870067</p>
                  <p>a.n WELLY NURLIANA</p>
                </div>
              <p>Konfirmasi transfer dapat dilakukan dengan klik tombol di bawah.</p>
              <a href="{{route('confirmation.index').'/?id='.$userData->phone}}" class="inline-block px-4 py-1 mt-4 text-white bg-pink-500 rounded-md">Konfirmasi Infaq</a>
              <p class="mt-4"><small>*Halaman ini bisa diakses kembali dari menu <strong>Status Pendaftaran</strong></small></p>
            @endif
            @break
        @case('canceled')
            <p>Saat ini status pendaftaran kamu adalah <span class="font-semibold text-yellow-500">Dibatalkan</span>.</p>
            @break
        @default
            
    @endswitch
  </div>
@endsection