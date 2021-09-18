@extends('layouts.app')

@section('title', 'Pengelolaan Registrasi')

@section('main')
  <table>
    <thead>
      <th>
        {{-- nama --}}
        <td>Nama</td>
        {{-- phone --}}
        <td>No. WhatsApp</td>
        {{-- get free --}}
        <td>Peserta free</td>
        {{-- bukti transfer --}}
        <td>Bukti Transfer</td>
        {{-- approval --}}
        <td>approval</td>
      </th>
    </thead>
  </table>
@endsection