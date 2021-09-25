<nav class="fixed top-0 z-20 grid w-full grid-cols-3 p-2 text-pink-400" style="background: rgba(251, 207, 232, 0.7)">
  <a class="block col-span-1" href="{{route('welcome')}}">
    <img src="{{asset('images/logo_7perempuan_300.png')}}" alt="7 perempuan" class="w-auto h-10">
  </a>
  <div class="block col-span-2 text-right md:hidden">
    <button id="menu_button" class="inline-block px-4 py-1 mx-4 font-sans font-semibold border border-pink-400 rounded-md " onclick="expander('menu_items')">Menu</button>
  </div>
  <div id="menu_items" class="flex-col hidden col-span-3 p-2 mt-2 font-semibold rounded-md bg-red-50 md:bg-transparent md:p-0 md:text-right md:block md:col-span-2">
    <ul class="flex flex-col md:flex-row md:justify-end">
      {{-- <li>
        <a href="{{route('welcome')}}#daftar" class="p-2 mr-2 hover:text-pink-300 menu-item">Daftar</a>
      </li>
      <li>
        <a href="{{route('status')}}" class="p-2 mr-2 hover:text-pink-300 menu-item">Status Pendaftaran</a>
      </li>
      <li>
        <a href="{{route('welcome')}}#faq" class="p-2 hover:text-pink-300 menu-item">F.A.Q.</a>
      </li> --}}
      <li>
        <a href="https://wa.me/6285693935273" class="p-2" target="_blank">Bantuan</a>
      </li>
    </ul>
  </div>  
</nav>

<script>
  function expander(id) {
    let target = document.getElementById(id);
    target.classList.toggle("hidden");
  }

  let menuItems = document.getElementsByClassName('menu-item');
  for (let i = 0; i < menuItems.length; i++) {
    menuItems[i].addEventListener('click', function () {
      document.getElementById('menu_items').classList.add('hidden');
    })
  }
</script>