@extends('layouts.admin')

@section('title', 'Pengelolaan Registrasi')

@section('main')
  <div class="w-full overflow-x-auto">
    <table class="w-full border-b stripped">
      <thead>
        <tr class="border-b">
          {{-- nama --}}
          <th>Nama</th>
          {{-- phone --}}
          <th>No. WhatsApp</th>
          {{-- get free --}}
          <th>Peserta free</th>
          {{-- status notif --}}
          <th>Status Notif WA</th>
          {{-- bukti transfer --}}
          <th>Detail</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($users as $user)
        <tr>
          <td class="p-1">{{$user->name}}</td>
          <td class="p-1 text-center">{{$user->phone}}</td>
          <td class="p-1 text-center">{!!$user->get_free? '<i class="mx-auto text-green-500 gg-check-o"></i>':'-' !!}</td>
          <td class="p-1 text-center">{{$user->notif_status}}</td>
          <td class="p-1 text-center">
            <a href="{{route('admin.user.show', $user->id)}}" class="flex justify-center px-4 py-2 mx-auto text-sm text-white bg-pink-500 rounded-md">
              <i class="mr-2 gg-eye"></i> <span class="">view</span>
            </a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
  <div class="mt-4">
    {{ $users->links() }}
  </div>
  
@endsection