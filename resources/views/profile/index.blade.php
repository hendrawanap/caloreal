@extends('layouts.profile')

@section('title', 'Daking | Profile')

@section('content')

<div class="container mx-auto flex">
  <div class="flex flex-col flex-shrink-0 w-56 mr-5">
    <div class="flex flex-col items-center p-4 bg-gray-50 rounded-xl text-primary">
      <div class="flex w-full items-center">
        <div class="rounded-full w-14 h-14 bg-gray-500 mr-4"></div>
        <div>
          <div class="text-xl font-semibold">
            {{ Auth::user()->name }}
          </div>
          <div class="text-sm font-medium">
            {{ $bmr->age }} Tahun
          </div>
        </div>
      </div>
      <div class="flex w-full justify-between text-sm mt-2">
        <div class="font-medium">Berat Badan</div>
        <div class="font-semibold">{{ $bmr->weight }} kg</div>
      </div>
      <div class="flex w-full justify-between text-sm mt-2">
        <div class="font-medium">Tinggi Badan</div>
        <div class="font-semibold">{{ $bmr->height }} cm</div>
      </div>
      <div class="flex mt-2 w-24 h-24 rounded-full items-center justify-center" style="background-color:#97FC95">
        <div class="flex w-20 h-20 rounded-full items-center justify-center bg-gray-50">
          <div class="text-xl font-semibold">{{ round($bmi['value'], 2) }}</div>
        </div>
      </div>
      <div class="text-xl font-semibold mt-2">1700 kkal</div>
      <a
        href="{{ route('bmr.index') }}"
        class="w-full text-center  text-sm border rounded-xl border-black bg-primary px-3 sm:px-9 py-2 mt-2 text-white"
      >
        Hitung Ulang
      </a>
    </div>
    <form class="mt-5" action="{{ route('logout') }}" method="POST" class="ml-2">
      @csrf
      <button href="{{ route('logout') }}"
          class="border rounded-2xl border-danger px-9 py-2 text-danger text-sm w-full font-semibold"
          type="submit">
          Log Out
      </button>
    </form>
  </div>
  <div class="flex flex-1 flex-col text-primary">
    <div class="flex">
      <div class="flex flex-1 flex-col max-w-lg mr-12">
        <div class="text-xl font-semibold">List Menu Saya</div>
        <div class="relative px-5 mt-2">
          <button class="absolute left-0 top-16 material-icons p-2 bg-secondary rounded-full" id="my-menu-prev">arrow_left</button>
          <div class="flex overflow-x-auto scrollbar-hide" id="my-menu">
            <div class="flex-shrink-0 w-48 h-36 bg-gray-50 mr-2 rounded-xl p-3">
              <div class="font-semibold text-lg">Menu 1</div>
              <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
              <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
              <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
              <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
            </div>
            <div class="flex-shrink-0 w-48 h-36 bg-gray-50 mr-2 rounded-xl p-3">
              <div class="font-semibold text-lg">Menu 2</div>
              <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
              <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
              <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
              <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
            </div>
            <div class="border border-dashed border-gray-500 flex-shrink-0  w-48 h-36 bg-gray-50 mr-2 rounded-xl relative">
              <div class="absolute left-0 right-0 bottom-8 text-center">Buat Menu</div>
            </div>
          </div>
          <button class="absolute right-0 top-16 material-icons p-2 bg-secondary rounded-full" id="my-menu-next">arrow_right</button>
        </div>
      </div>
      <div class="flex flex-1 flex-col max-w-lg">
        <div class="text-xl font-semibold">Rekomendasi Menu</div>
        <div class="relative px-5 mt-2">
          <button class="absolute left-0 top-16 material-icons p-2 bg-secondary rounded-full" id="rec-menu-prev">arrow_left</button>
          <div class="flex overflow-x-auto" id="rec-menu">
            <div class="flex-shrink-0 w-48 h-36 bg-gray-50 mr-2 rounded-xl p-3">
              <div class="font-semibold text-lg">Menu 1</div>
              <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
              <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
              <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
              <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
            </div>
            <div class="flex-shrink-0 w-48 h-36 bg-gray-50 mr-2 rounded-xl p-3">
              <div class="font-semibold text-lg">Menu 2</div>
              <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
              <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
              <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
              <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
            </div>
          </div>
          <button class="absolute right-0 top-16 material-icons p-2 bg-secondary rounded-full" id="rec-menu-next">arrow_right</button>
        </div>
      </div>
    </div>
    <div class="flex flex-col mt-3">
      <div class="flex justify-between bg-gray-50 rounded-xl px-4 py-5 text-xl font-semibold w-full">
        <div>Rekomendasi Menu 1</div>
        <div>1200 <span class="text-base text-secondary">/ 1700 kkal</span></div>
      </div>
      <div class="bg-gray-50 rounded-xl px-4 py-5 w-full mt-3">
        <div class="flex justify-between gap-x-4 text-sm text-center font-semibold">
          <div class="flex-1 border border-secondary bg-secondary py-3 rounded-xl">Sarapan</div>
          <div class="flex-1 border border-primary py-3 rounded-xl">Makan Siang</div>
          <div class="flex-1 border border-primary py-3 rounded-xl">Makan Malam</div>
          <div class="flex-1 border border-primary py-3 rounded-xl">Snack</div>
        </div>
        <table class="table-fixed w-full text-left mt-5">
          <thead class="border-b border-gray-400">
            <tr>
              <th class="w-1/2 text-lg font-semibold">Makanan</th>
              <th class="w-1/4 text-lg font-semibold">Porsi</th>
              <th class="w-1/4 text-lg font-semibold">Kalori</th>
            </tr>
          </thead>
          <tbody class="border-b border-gray-400 pb-2">
            <tr>
              <td class="py-2">Nasi Merah</td>
              <td class="py-2">150 gram</td>
              <td class="py-2">120 kkal</td>
            </tr>
            <tr>
              <td class="py-2">Nasi Merah</td>
              <td class="py-2">150 gram</td>
              <td class="py-2">120 kkal</td>
            </tr>
            <tr>
              <td class="py-2">Nasi Merah</td>
              <td class="py-2">150 gram</td>
              <td class="py-2">120 kkal</td>
            </tr>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th class="text-xl font-semibold">Total Kalori</th>
              <th></th>
              <th class="text-xl font-semibold">270 kkal</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="self-end text-center  text-sm border rounded-xl border-black bg-primary px-3 sm:px-16 py-2 mt-2 text-white">
        Duplikat
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById('my-menu-prev').addEventListener('click', () => prevMenu('my-menu'));
  document.getElementById('my-menu-next').addEventListener('click', () => nextMenu('my-menu'));
  document.getElementById('rec-menu-prev').addEventListener('click', () => prevMenu('rec-menu'));
  document.getElementById('rec-menu-next').addEventListener('click', () => nextMenu('rec-menu'));

  function nextMenu(id) {
    document.getElementById(id).scrollBy(200, 0);
  }
  function prevMenu(id) {
    document.getElementById(id).scrollBy(-200, 0);
  }
</script>
@endsection