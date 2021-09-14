@extends('layouts.app')

@section('title', 'Registrasi')

@section('main')
  <div>
    <h1 class="mb-4 text-2xl font-bold text-center">Registrasi Kelas Shirah Shahabiyah</h1>
    
    {{-- @if(session('error'))
      <div class="flex p-4 mb-4 bg-red-100 rounded-lg">
        <svg class="w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <p class="ml-3 text-sm text-red-700">
          {{session('error')}}
        </p>
      </div>
    @endif --}}

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
    
    <form action="{{route('registration.create')}}" method="POST" class="">
      @csrf
      <div class="w-full">
        <label for="phone" class="font-semibold">No. WhatsApp</label>
        <input type="text" name="phone" id="phone" class="w-full font-sans border-gray-400 rounded-md focus:text-gray-700" placeholder="contoh: 6281234567890" required>
        <small>Nomor WhatsApp yang digunakan saat di Sekolah 7 Perempuan</small>
      </div>
      <div class="w-full text-center">
        <input type="submit" value="Lanjut" class="px-4 py-2 mx-auto mt-2 text-sm text-white bg-pink-500 rounded-md cursor-pointer">
      </div>
      <input type="hidden" name="recaptcha" id="recaptcha">
    </form>
  </div>
@endsection

@section('js-bottom')
  <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.sitekey') }}"></script>
  <script>
          grecaptcha.ready(function() {
              grecaptcha.execute('{{ config('services.recaptcha.sitekey') }}', {action: 'findID'}).then(function(token) {
                  if (token) {
                    document.getElementById('recaptcha').value = token;
                  }
              });
          });
  </script>
@endsection