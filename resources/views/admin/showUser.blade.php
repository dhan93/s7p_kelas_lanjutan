@extends('layouts.admin')

@section('title', 'Pengelolaan Registrasi')

@section('main')
  <h1 class="mt-2 mb-4 text-xl font-bold text-center">Detail</h1>
  <div class="grid grid-cols-2">
    <div class="col-span-2 mb-4 overflow-x-auto lg:col-span-1 ">
      <table class="min-w-min">
        <tr class="mb-2">
          <td class="px-2">Nama</td>
          <td class="font-semibold">: {{$user->name}}</td>
        </tr>
        <tr class="mb-2">
          <td class="px-2">No. WhatsApp</td>
          <td class="font-semibold">
            : <a href="https://wa.me/{{$user->phone}}" class="font-sans underline">
              {{$user->phone}}
            </a>
          </td>
        </tr>
        <tr class="mb-2">
          <td class="px-2">Status pendaftaran</td>
          <td class="font-semibold">: {{$user->registration_status}}</td>
        </tr>
        <tr class="mb-2">
          <td class="px-2">Status notifikasi WA</td>
          <td class="font-semibold">: {{$user->notif_status ?? '-'}}</td>
        </tr>
        <tr class="mb-2">
          <td class="px-2">Peserta free</td>
          <td class="font-semibold">
            : {!!$user->get_free? '<span class="text-green-500">ya</span>':'tidak'!!}
          </td>
        </tr>
      </table>
      @if ($user->registration_status == 'waiting')
        <div class="mt-4">
          <form action="{{route('admin.user.update.status')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
            <button class="justify-center inline-block px-4 py-2 mx-auto text-sm text-white bg-pink-500 rounded-md">approve</button>
          </form>
        </div>          
      @endif
    </div>
    
    <div class="col-span-2 lg:col-span-1">
      <h3 class="mb-2 text-lg font-semibold">Bukti Transfer</h3>
      
      @if ($user->registration)
        <p class="mb-2">Nominal Transfer : <input type="text" id="nominal" class="font-sans font-semibold" value="{{$user->registration->nominal}}" disabled></p>
        @php
          $image = str_replace("public", "storage", $user->registration->file_path)
        @endphp
          <img class="h-auto w-96" src="{{asset($image)}}" alt="bukti transfer">
      @else
        belum ada bukti transfer
      @endif
    </div>
  </div>
  
@endsection

@section('js-bottom')
  <script src="https://unpkg.com/vanilla-masker@1.1.1/build/vanilla-masker.min.js"></script>
  <script>
    VMasker(document.getElementById('nominal')).maskMoney({
      // Decimal precision -> "90"
      precision: 0,
      // Decimal separator -> ",90"
      separator: ',',
      // Number delimiter -> "12.345.678"
      delimiter: '.',
      // Money unit -> "R$ 12.345.678,90"
      unit: 'Rp'
    });
  </script>
@endsection