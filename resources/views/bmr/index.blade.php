@extends('layouts.master')

@section('BMI', 'Daking')

@section('content')
    <div class="container flex">
        <div class="flex-1 mt-10 mr-10">
            <div class="bg-ternary p-10 rounded-xl">

                <form action="{{ route('bmr.store') }}" method="POST" class="flex flex-col">
                    @csrf
                    <div class="flex justify-around text-white">
                        <label for="male">
                            <div class="flex w-32 h-32 bg-primary items-center justify-center">Male</div>
                            <input type="radio" id="male" name="sex" value="male" @if (old('sex')) checked @endif>
                        </label>


                        <label for="female">
                            <div class="checked:bg-white flex w-32 h-32 bg-primary items-center justify-center">Female</div>
                            <input type="radio" id="female" name="sex" value="female" @if (old('sex')) checked @endif>
                        </label>
                    </div>

                    @error('sex') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

                    <label for="age">Usia</label>
                    <input type="text" name="age" id="age" class="p-2 rounded-lg" value="{{ old('age') }}">
                    @error('age') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

                    <label for="height">Tinggi</label>
                    <input type="text" name="height" id="height" class="p-2 rounded-lg" value="{{ old('height') }}"">
                                        @error('height') <span class=" text-sm text-red-500">{{ $message }}</span>
                    @enderror

                    <label for="weight">Berat Badan</label>
                    <input type="text" name="weight" id="weight" class="p-2 rounded-lg" value="{{ old('weight') }}">
                    @error('weight') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

                    <input type="submit" name="submit" value="Hitung"
                        class="border-2 rounded-2xl border-black bg-primary mt-4 px-9 py-2 text-white text-sm">

                </form>
            </div>
        </div>

        <div class="flex-1 mt-10">
            <div class="flex flex-col bg-ternary p-10 rounded-xl items-center">
                @isset($bmi)
                    <h1 class="text-xl font-semibold mt-4">Indeks Massa Tubuh</h1>
                    <div class="flex mt-6 w-40 h-40 rounded-full items-center justify-center bg-white">
                        <span class="text-4xl mt-4">{{ round($bmi['value'], 2) }}</span>
                    </div>
                    <span class="text-lg mt-4 font-semibold">{{ $bmi['category'] }}</span>
                    <p class="mt-4">
                        Untuk menjaga kesehatan badan, Anda perlu mengetahui terlebih dulu berapa banyak kalori yang dibutuhkan
                        tubuh per harinya. Agar tubuh mendapatkan sumber energi yang maksimal untuk beraktivitas.
                    </p>
                @endisset
            </div>
        </div>
    </div>
@endsection
