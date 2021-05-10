@extends('master')

@section('title', 'Daking')

@section('container')
<div class="bg-ternary">
  <div class="container mx-auto pt-20 pb-44">
    <h1 class="text-4xl font-bold mb-2 text-primary">Hitung Indeks Massa Tubuh</h1>
    <h1 class="text-4xl font-bold mb-10 text-primary">Asupan Kalori Harian</h1>
    <a class="border-2 rounded-xl border-black bg-primary px-9 py-2 text-white text-lg">Hitung Sekarang</a>
  </div>
</div>
<div class="container mt-10 mb-24 mx-auto">
  <h1 class="text-4xl font-bold text-center mb-10">Hidup Sehat Dari Sekarang</h1>
  <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-16 gap-y-10 px-6">
    @for ($i = 0; $i < 4; $i++)
      <div class="flex flex-col items-center">
        <div class="mb-10 rounded-full w-40 h-40 bg-gray-500"></div>
        <h5 class="text-xl font-semibold mb-2">Kalkulator IMT</h5>
        <p class="text-center">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita maiores commodi provident laborum? Possimus, ea?
        </p>
      </div>
    @endfor
  </div>
</div>
@endsection