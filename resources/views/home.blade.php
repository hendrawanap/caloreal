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
<div class="bg-ternary relative md:pt-40">
  <img src="{{ asset('img/heading-1.png') }}" alt="alt" class="pt-40 pb-10 px-10 md:max-h-96 lg:max-h-full md:absolute md:bottom-0 md:right-0 md:p-0">
  <div class="container mx-auto h-96 flex flex-col items-center md:block">
    <h1 class="relative z-20 text-2xl font-bold mb-2 text-center md:text-left text-primary tracking-wide sm:text-3xl md:text-4xl lg:text-5xl sm:font-semibold">Hitung Indeks Massa Tubuh</h1>
    <h1 class="relative z-20 text-2xl font-bold mb-10 text-center md:text-left text-primary tracking-wide sm:text-3xl md:text-4xl lg:text-5xl sm:font-semibold">Asupan Kalori Harian</h1>
    <a href="{{ route('bmr.index') }}" class="relative z-20 border rounded-2xl border-primary bg-primary px-9 py-3 text-white text tracking-wider">Hitung Sekarang</a>
  </div>
  <img src="{{ asset('img/Vector-1.png') }}" alt="alt" class="hidden absolute z-10 bottom-0 left-0 md:block">
  <img src="{{ asset('img/Vector-2.png') }}" alt="alt" class="hidden absolute bottom-0 left-0 md:block">
</div>
<div class="container mt-16 mb-24 mx-auto max-w-6xl sm:px-24">
  <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold sm:font-semibold text-center text-primary mb-12">Hidup Sehat Dari Sekarang</h1>
  <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-16 md:gap-x-32 lg:gap-x-48 gap-y-10">
    @foreach ($features as $feature)
      <div class="flex flex-col items-center">
        <img class="w-40 h-40" src="{{ asset($feature['src']) }}">
        <h5 class="text-lg md:text-xl font-semibold mt-4 mb-2 text-primary text-center">{{ $feature['title'] }}</h5>
        <p class="text-center text-primary">
          {{ $feature['content'] }}
        </p>
      </div>
    @endforeach
  </div>
</div>
@endsection