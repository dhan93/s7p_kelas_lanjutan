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
  <div class="pb-4 text-center">
    <p>Halo <strong>{{$userData->name}}</strong>..</p>
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
            <p>Saat ini status pendaftaran kamu adalah <span class="font-semibold text-blue-500">Menunggu Pembayaran infaq</span></p>
            <p>Silakan terlebih dahulu kirimkan infaq terbaikmu ke rekening yang tercantum di bawah ini.</p>
            <div class="p-3 mx-auto my-2 text-center border rounded-md">
              <p><strong>Bank Syariah Indonesia (BSI)</strong></p>
              <p class="font-sans">1148965000</p>
              <p>a.n WELLY NURLIANA</p>
            </div>
            <p>Jika sudah melakukan pembayaran, silakan konfirmasi transfer dengan klik tombol di bawah.</p>
            <a href="{{route('confirmation.index').'/?id='.$userData->phone}}" class="inline-block px-4 py-1 mt-4 text-white bg-pink-500 rounded-md">Konfirmasi Infaq</a>
            <p class="mt-4"><small>*Halaman ini bisa diakses kembali dari menu <strong>Status Pendaftaran</strong></small></p>
            @break
        @case('waiting')
            <p>Saat ini status pendaftaran kamu adalah <span class="font-semibold text-blue-500">Dalam Proses Verifikasi</span>.</p>
            <p>Kami akan memverifikasi pembayaranmu dalam waktu maksimal 2 x 24jam.</p>
            @break
        @case('registered')
            <p>Selamat, saat ini kamu telah sukses <span class="font-semibold text-green-500">Terdaftar</span>.</p>
            <p>Informasi selanjutnya akan kami sampaikan via WhatsApp.</p>
            @break
        @case('canceled')
            <p>Saat ini status pendaftaran kamu adalah <span class="font-semibold text-yellow-500">Dibatalkan</span>.</p>
            @break
        @default
            
    @endswitch
  </div>
@endsection