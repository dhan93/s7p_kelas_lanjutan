@extends('layouts.app')

@section('title', 'Konfirmasi')

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
    <h1 class="mb-4 text-2xl font-bold text-center">Konfirmasi Infaq</h1>
    <a href="{{route('confirmation.index')}}" class="inline-block px-2 py-1 mb-2 -mt-2 font-sans text-sm font-semibold text-pink-500 border border-pink-500 rounded-md">< kembali</a>

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
    

    @if (isset($userData))
      <form action="{{route('confirmation.update')}}" method="POST" enctype="multipart/form-data" id="confirmation_form" onsubmit="return nominalStripper()">    
    @else
      <form action="{{route('confirmation.index')}}" method="GET">  
    @endif
    
      @csrf
      <div class="w-full text-center">
        <p class="text-lg"><strong>Hai Puan {{$userData->name ?? ''}}..! </strong></p>
        <p>Terimakasih sudah mendaftar di Kelas Shirah Shahabiyah.</p>
        <p>Silakan melakukan konfirmasi pembayaran infaq dengan mengisi formulir di bawah ini.</p>
      </div>
      <div class="w-full mt-4">
        <label for="id" class="font-semibold">No. WhatsApp</label>
        <input type="text" name="id" id="id" class="w-full font-sans border-gray-400 rounded-md focus:text-gray-700" placeholder="contoh: 6281234567890" value="{{$userData->phone ?? ''}}" required {{isset($userData)?'disabled':''}}>
        @if (!isset($userData))
          <small>Nomor WhatsApp yang digunakan saat di Sekolah 7 Perempuan</small>    
        @endif        
      </div>

      @isset($userData)
        <div class="w-full mt-4">
          <label for="image" class="font-semibold">Bukti transfer</label>
          <input type="file" accept="image/png, image/jpeg" name="image" id="image" class="w-full p-2 font-sans border border-gray-400 rounded" required>
          <small>Ukuran maksimal 2MB, dengan format file jpg atau png</small>
        </div>

        <div class="w-full mt-4">
          <label for="dnominal" class="font-semibold">Nominal Transfer</label>
          <input type="text" name="dnominal" id="dnominal" class="w-full font-sans border border-gray-400 rounded" value="{{old('dnominal')}}" required>
          <small>Jumlah uang yang ditransfer</small>
        </div>
        <input type="hidden" name="phone" value="{{$userData->phone}}">
        <input type="hidden" name="id" value="{{$userData->id}}">
        <input type="hidden" name="nominal" id="nominal" value="" required>
      @endisset

      <div class="w-full text-center">
        <button type="submit" class="inline-block px-4 py-2 mx-auto mt-4 text-sm text-white bg-pink-500 rounded-md">
          {{isset($userData) ? 'Simpan' : 'Selanjutnya'}}
        </button>
      </div>

      
    </form>
  </div>
@endsection

@section('js-bottom')
    <script src="https://unpkg.com/vanilla-masker@1.1.1/build/vanilla-masker.min.js"></script>
    <script>
      VMasker(document.getElementById('dnominal')).maskMoney({
        // Decimal precision -> "90"
        precision: 0,
        // Decimal separator -> ",90"
        separator: ',',
        // Number delimiter -> "12.345.678"
        delimiter: '.',
        // Money unit -> "R$ 12.345.678,90"
        unit: 'Rp'
      });

      document.getElementById('confirmation_form').onsubmit(nominalStripper());
      
      function nominalStripper() {
        let nominal = document.getElementById('nominal');
        let dnominal = document.getElementById('dnominal');
        nominal.value = VMasker.toNumber(dnominal.value);
      }
    </script>
@endsection