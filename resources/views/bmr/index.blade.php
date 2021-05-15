@extends('layouts.master')

@section('title', 'Daking | Kalkulator Indeks Massa Tubuh')

@section('content')
    <div class="bg-ternary relative pt-40">
        <div class="container mx-auto h-96 sm:h-72">
            <h1 class="relative z-10 text-2xl font-semibold mb-3 text-primary sm:text-5xl">Indeks Massa Tubuh</h1>
            <p class="relative z-10 text-primary max-w-xl sm:text-lg">
                Indeks Massa Tubuh (IMT) adalah nilai ukur untuk mengetahui status gizi seseorang berdasarkan berat dan
                tinggi badannya.
            </p>
        </div>
        <img src="{{ asset('img/Image-BMI.png') }}" alt="alt" class="absolute bottom-0 right-0">
    </div>
    <div class="container mx-auto pt-10 pb-10 flex flex-wrap lg:flex-nowrap justify-between">
        <div class="mr-10 w-full lg:max-w-sm xl:max-w-lg">
            @livewire('bmr-form')
        </div>

        <div class="flex flex-shrink mt-4 lg:max-w-md mt-0 xl:max-w-2xl">
                @livewire('bmi-result')
        </div>
    </div>
@endsection
