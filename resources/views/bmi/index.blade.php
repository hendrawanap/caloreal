@extends('layouts.master')

@section('BMI', 'Daking')

@section('content')
    <div class="container flex">
        <div class="flex-1 mt-10 mr-10">
            <div class="bg-ternary p-10 rounded-xl">
                <form action="{{ route('bmi') }}" method="GET" class="flex flex-col">
                    <label for="height">Tinggi</label>
                    <input type="text" name="height" id="height" class="p-2 rounded-lg">
                    <label for="weight">Berat Badan</label>
                    <input type="text" name="weight" id="weight" class="p-2 rounded-lg">
                    <input type="submit" name="submit" value="Hitung"
                        class="border-2 rounded-2xl border-black bg-primary mt-4 px-9 py-2 text-white text-sm">
                </form>
            </div>
        </div>

        <div class="flex-1 mt-10">
            <div class="flex flex-col bg-ternary p-10 rounded-xl">
                <h1 class="text-xl font-semibold mt-4">Indeks Massa Tubuh Kamu</h1>
                <span class="text-lg mt-4">{{ $total ?? '' }}</span>
                <span class="text-lg mt-2">{{ $bmi->category ?? '' }}</span>
                <span class="text-lg mt-2">{{ $bmi->description ?? '' }}</span>
            </div>
        </div>
    </div>
@endsection
