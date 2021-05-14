@extends('layouts.master')

@section('title', 'Daking')

@php
$features = [
  1 => ['title' => 'Kalkulator IMT',
        'content' => 'Hitung Indeks Massa Tubuh (IMT) dengan kalkulator ini dan cek apakah berat badanmu ideal atau tidak.',
        'src' => 'img/weight-scale.png'],
  2 => ['title' => 'Atur Menu Makanan',
        'content' => 'Susunlah menu makananmu sesuai kebutuhan dan rekomendasi asupan kalori dari perhitungan kami',
        'src' => 'img/scale.png'],
  3 => ['title' => 'Asupan Kalori Harian',
        'content' => 'Ketahui rekomendasi asupan kalori harianmu dengan menghitung menggunakan kalkulator IMT',
        'src' => 'img/calories-calculator.png'],
  4 => ['title' => 'Rekomendasi Menu',
        'content' => 'Tersedia rekomendasi menu makanan yang sehat, praktis, dan mudah dibuat untuk hidup lebih sehat',
        'src' => 'img/fruits.png']
];
@endphp

@section('content')
<div class="bg-ternary relative pt-40">
  <div class="container mx-auto h-96">
    <h1 class="relative z-10 text-5xl font-semibold mb-2 text-primary">Hitung Indeks Massa Tubuh</h1>
    <h1 class="relative z-10 text-5xl font-semibold mb-10 text-primary">Asupan Kalori Harian</h1>
    <a href="{{ route('bmr.index') }}" class="relative z-10 border-2 rounded-xl border-black bg-primary px-9 py-2 text-white text-lg">Hitung Sekarang</a>
  </div>
  <img src="{{ asset('img/heading-1.png') }}" alt="alt" class="absolute bottom-0 right-0">
  <img src="{{ asset('img/Vector-1.png') }}" alt="alt" class="absolute z-10 bottom-0 left-0">
  <img src="{{ asset('img/Vector-2.png') }}" alt="alt" class="absolute bottom-0 left-0">
</div>
<div class="container mt-10 mb-24 mx-auto max-w-6xl">
  <h1 class="text-5xl font-semibold text-center text-primary mb-10">Hidup Sehat Dari Sekarang</h1>
  <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-48 gap-y-10">
    @foreach ($features as $feature)
      <div class="flex flex-col items-center">
        <img class="mb-10 w-40 h-40" src="{{ asset($feature['src']) }}">
        <h5 class="text-xl font-semibold mb-2 text-primary">{{ $feature['title'] }}</h5>
        <p class="text-center text-primary">
          {{ $feature['content'] }}
        </p>
      </div>
    @endforeach
  </div>
</div>
@endsection