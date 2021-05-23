@extends('layouts.bmr')

@section('title', 'Daking | Kalkulator Kalori')

@section('content')
<div class="container mx-auto mb-4">
  <h1 class="font-semibold text-3xl text-primary mb-7">Kalkulator Asupan Kalori</h1>
  <div class="flex flex-wrap lg:flex-nowrap gap-x-10 xl:gap-x-20">
    <div class="mr-10 w-full lg:max-w-sm xl:max-w-lg">
      @livewire('bmi-result', ['bmr' => auth()->user()->bmr->bmi])
    </div>
    <div class="flex flex-col flex-shrink mt-4 lg:max-w-md lg:mt-0 xl:max-w-2xl">
      @livewire('bmr-form')
      @livewire('bmr-result')
    </div>
    
  </div>
</div>
    
@endsection