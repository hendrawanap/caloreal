@extends('layouts.profile')

@section('content')
<div class="container mx-auto">
  <h1 class="font-semibold text-2xl text-primary">Kalkulator Asupan Kalori</h1>
  <div class="flex justify-between">
    @livewire('bmi-result', ['bmr' => auth()->user()->bmr])
    <div>
      @livewire('bmr-form')
      @livewire('bmr-result')
    </div>
  </div>
</div>
    
@endsection