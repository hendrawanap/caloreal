@extends('layouts.profile')

@section('title', 'Daking | Profile')

@section('content')

<div class="container mx-auto flex">
  <div class="flex flex-col w-60">
    <div class="flex flex-col items-center p-4 bg-gray-50 rounded-xl text-primary">
      <div class="flex w-full items-center">
        <div class="rounded-full w-16 h-16 bg-white mr-4"></div>
        <div>
          <div class="text-xl font-semibold">
            {{ Auth::user()->name }}
          </div>
          <div class="text-sm">
            20 Tahun
          </div>
        </div>
      </div>
      <div class="flex w-full justify-between text-sm mt-2">
        <div>Berat Badan</div>
        <div class="font-medium">60 kg</div>
      </div>
      <div class="flex w-full justify-between text-sm mt-2">
        <div>Tinggi Badan</div>
        <div class="font-medium">160 cm</div>
      </div>
      <div class="flex mt-2 w-24 h-24 rounded-full items-center justify-center" style="background-color:#97FC95">
        <div class="flex w-20 h-20 rounded-full items-center justify-center bg-gray-50">
          <div class="text-xl font-semibold">24.5</div>
        </div>
      </div>
      <div class="text-xl font-semibold mt-2">1700 kkal</div>
      <a
        href="#"
        class="w-full text-center  text-sm border rounded-xl border-black bg-primary px-3 sm:px-9 py-2 mt-2 text-white"
      >
        Hitung Ulang
      </a>
    </div>
    <form class="mt-5" action="{{ route('logout') }}" method="POST" class="ml-2">
      @csrf
      <button href="{{ route('logout') }}"
          class="border rounded-2xl border-danger px-9 py-2 text-danger text-sm w-full"
          type="submit">
          Log Out
      </button>
    </form>
  </div>
  <div class="flex flex-col">

  </div>
</div>

@endsection