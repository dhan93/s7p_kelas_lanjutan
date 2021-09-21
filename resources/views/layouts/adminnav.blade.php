<nav class="grid w-full grid-cols-3 p-2 mb-4 text-pink-400" style="background: rgba(251, 207, 232, 0.7)">
  <a class="block col-span-1" href="{{route('welcome')}}">
    <img src="{{asset('images/logo_7perempuan_300.png')}}" alt="7 perempuan" class="w-auto h-10">
  </a>
  <div class="block col-span-2 text-right">
    <form method="POST" action="{{ route('logout') }}" class="inline-block">
      @csrf
      <a href="{{route('logout')}}"
        onclick="event.preventDefault();
        this.closest('form').submit();"
        class="font-semibold text-pink-500 cursor-pointer"
      >
          {{ __('Log Out') }}
      </a>
    </form>
    <button id="menu_button" class="inline px-4 py-1 mx-4 font-sans font-semibold border border-pink-400 rounded-md" onclick="expander('menu_items')">Status Pendaftaran</button>
  </div>
  <div id="menu_items" class="flex-col hidden col-span-3 p-2 mt-2 font-semibold rounded-md bg-red-50">
    <ul class="flex flex-col md:flex-row md:justify-end">
      <li>
        <a href="{{route('admin.dashboard')}}?status=waiting" class="p-2 md:mr-2 hover:text-pink-300">Perlu Verifikasi</a>
      </li>
      <li>
        <a href="{{route('admin.dashboard')}}?status=registering" class="p-2 md:mr-2 hover:text-pink-300">Menunggu Transfer</a>
      </li>
      <li>
        <a href="{{route('admin.dashboard')}}?status=registered" class="p-2 md:mr-2 hover:text-pink-300">Terdaftar</a>
      </li>
      <li>
        <a href="{{route('admin.dashboard')}}?status=all" class="p-2 hover:text-pink-300">Semua</a>
      </li>
    </ul>
  </div>  
</nav>

<script>
  function expander(id) {
    let target = document.getElementById(id);
    target.classList.toggle("hidden");
  }
</script>