@extends('layouts.master')

@section('BMI', 'Daking')

@section('content')
    <div class="container flex">
        <div class="flex-1 mt-10 mr-10">
            <div class="bg-ternary p-10 rounded-xl">

                <form action="{{ route('bmr.store') }}" method="POST" class="flex flex-col">
                    @csrf
                    <input type="radio" id="male" name="sex" value="male">
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="sex" value="female">
                    <label for="female">Female</label>
                    @error('sex') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

                    <label for="age">Usia</label>
                    <input type="text" name="age" id="age" class="p-2 rounded-lg">
                    @error('age') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

                    <label for="height">Tinggi</label>
                    <input type="text" name="height" id="height" class="p-2 rounded-lg">
                    @error('height') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

                    <label for="weight">Berat Badan</label>
                    <input type="text" name="weight" id="weight" class="p-2 rounded-lg">
                    @error('weight') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

                    <input type="submit" name="submit" value="Hitung"
                        class="border-2 rounded-2xl border-black bg-primary mt-4 px-9 py-2 text-white text-sm">

                </form>
            </div>
        </div>

        <div class="flex-1 mt-10">
            <div class="flex flex-col bg-ternary p-10 rounded-xl">
                @isset($bmi)
                    <h1 class="text-xl font-semibold mt-4">Indeks Massa Tubuh</h1>
                    <span class="text-lg mt-4">{{ $bmi['value'] }}</span>
                    <span class="text-lg mt-4">{{ $bmi['category'] }}</span>
                @endisset
            </div>
        </div>
    </div>
@endsection
