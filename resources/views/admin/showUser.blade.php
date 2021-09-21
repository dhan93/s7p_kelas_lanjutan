@extends('layouts.admin')

@section('title', 'Pengelolaan Registrasi')

@section('main')
  <h1 class="mt-2 mb-4 text-xl font-bold text-center">Detail</h1>
  <div class="grid grid-cols-2">
    <div class="col-span-2 mb-4 overflow-x-auto lg:col-span-1 ">
      <table class="min-w-min">
        <tr class="mb-2 border-b">
          <td class="px-2 align-top">Nama</td>
          <td class="font-semibold align-top">: {{$user->name}}</td>
        </tr>
        <tr class="mb-2 border-b">
          <td class="px-2 align-top">No. WhatsApp</td>
          <td class="font-semibold align-top">
            : <a href="https://wa.me/{{$user->phone}}" class="font-sans underline">
              {{$user->phone}}
            </a>
          </td>
        </tr>
        <tr class="mb-2 border-b">
          <td class="px-2 align-top">Status pendaftaran</td>
          <td class="font-semibold align-top">: {{$user->registration_status}}</td>
        </tr>
        <tr class="mb-2 border-b">
          <td class="px-2 align-top">Peserta free</td>
          <td class="font-semibold align-top">
            : {!!$user->get_free? '<span class="text-green-500">ya</span>':'tidak'!!}
          </td>
        </tr>
        <tr class="mb-2 border-b">
          <td class="px-2 align-top">Status notifikasi WA</td>
          <td class="font-semibold align-top">
            @if ($user->notif_status)
              @switch(strtolower($user->notif_status))
                  @case('success')
                      : <span class="text-green-500">Success</span>
                      @break
                  @case('resent')
                      : <span class="text-green-500">Had Resent by {{$message->sender_name}}</span>
                      @break
                  @default
                      : <span class="text-yellow-500">{{$user->notif_status}}</span>
              @endswitch
            @else
              : -
            @endif
          </td>
        </tr>
        @if (strtolower($user->notif_status) != 'success')
          <tr class="mb-2">
            <td class="px-2 align-top" colspan="2">Pesan Tidak terkirim:</td>
          </tr>
          <tr class="mt-2 mb-2">
            <td class="p-2 align-top" colspan="2">
              <textarea id="unsent_message" rows="5" class="w-full rounded-md" disabled>{{$message->message}}</textarea>
              <div class="flex">
                <div class="tooltip">
                  <button onclick="textCopy()" onmouseout="outFunc()" class="px-4 py-1 mt-4 bg-gray-200 rounded-md">
                    <span class="tooltiptext" id="myTooltip">Copy to clipboard</span>
                    Copy Message
                  </button>
                </div>
                <div class="text-right">
                  <a href="https://wa.me/{{$user->phone}}" id="myBtn" class="inline-block px-4 py-1 mt-4 ml-2 text-white bg-green-600 rounded-md" target="_blank">
                    Resend Message
                  </a>
                </div>
              </div>
            </td>
          </tr>
        @endif
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
        <input type="hidden" id="nominal">
      @endif
    </div>
  </div>
  
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <p>Apakah pesan sudah terkirim?</p>
      <div class="grid grid-cols-2">
        <form action="{{route('admin.message.resent')}}" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{$user->id}}">
          <button type="submit" class="w-40 px-4 py-1 mt-4 text-white bg-green-600 rounded-md">Sudah</button>
        </form>
        <button class="w-40 px-4 py-1 mt-4 text-white bg-yellow-500 rounded-md close">Batal</button>
      </div>
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

    function textCopy() {
      var copyText = document.getElementById("unsent_message");
      copyText.select();
      copyText.setSelectionRange(0, 99999);
      navigator.clipboard.writeText(copyText.value);
      
      var tooltip = document.getElementById("myTooltip");
      tooltip.innerHTML = "Message Copied";
    }

    function outFunc() {
      var tooltip = document.getElementById("myTooltip");
      tooltip.innerHTML = "Copy to clipboard";
    }


    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
@endsection