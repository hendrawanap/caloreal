@extends('layouts.master')

@section('title', 'Daking | Kalkulator Indeks Massa Tubuh')

@section('content')

<div class="bg-ternary relative md:pt-40">
  <img src="{{ asset('img/Image-BMI.png') }}" alt="alt" class="pt-40 pb-10 px-10 md:max-h-72 lg:max-h-full md:absolute md:bottom-0 md:right-0 md:p-0">
  <div class="container mx-auto h-48 md:h-96 flex flex-col items-center md:block sm:h-72">
    <h1 class="relative z-20 text-2xl font-bold mb-2 text-center md:text-left text-primary tracking-wide sm:text-3xl md:text-4xl lg:text-5xl sm:font-semibold">Indeks Massa Tubuh</h1>
    <p class="relative z-20 text-primary max-w-md xl:max-w-xl text-center md:text-left sm:text-lg">
      Indeks Massa Tubuh (IMT) adalah nilai ukur untuk mengetahui status gizi seseorang berdasarkan berat dan tinggi badannya.
    </p>
  </div>
</div>
<div class="container mx-auto pt-10 pb-10 flex flex-wrap lg:flex-nowrap justify-between">
    <div class="container mx-auto pt-10 pb-10 flex flex-wrap lg:flex-nowrap justify-between">
        <div class="mr-10 w-full lg:max-w-sm xl:max-w-lg">
            @livewire('bmr-form')
        </div>
        <div class="flex flex-shrink mt-4 lg:max-w-md mt-0 xl:max-w-2xl">
            @livewire('bmi-result')
        </div>
    </div>
@endsection
