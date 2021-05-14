@extends('layouts.master')

@section('title', 'Daking | Kalkulator Indeks Massa Tubuh')

@section('content')
<div class="bg-ternary relative pt-40">
  <div class="container mx-auto h-72">
    <h1 class="relative z-10 text-5xl font-semibold mb-3 text-primary">Indeks Massa Tubuh</h1>
    <p class="text-primary text-lg max-w-xl">
      Indeks Massa Tubuh (IMT) adalah nilai ukur untuk mengetahui status gizi seseorang berdasarkan berat dan tinggi badannya.
    </p>
  </div>
  <img src="{{ asset('img/Image-BMI.png') }}" alt="alt" class="absolute bottom-0 right-0">
</div>
    <div class="container mx-auto pb-10 flex">
        <div class="flex-1 mt-10 mr-10 max-w-md">
          <form action="{{ route('bmr.store') }}" method="POST" class="flex flex-col">
              @csrf
              <div class="text-primary font-semibold text-lg mb-3">Jenis Kelamin</div>
              <div class="flex text-white">
                  <label for="male" class="pr-4">
                      <div class="flex w-32 h-32 bg-primary items-center justify-center">Pria</div>
                      <input
                        class="w-full py-2 px-4 rounded-xl border border-primary bg-gray-50 placeholder-primary focus:placeholder-opacity-25"
                        type="radio"
                        id="male"
                        name="sex"
                        value="male"
                        @if (old('sex')) checked @endif
                      >
                  </label>


                  <label for="female">
                      <div class="checked:bg-white flex w-32 h-32 bg-primary items-center justify-center">Wanita</div>
                      <input
                        class="w-full py-2 px-4 rounded-xl border border-primary bg-gray-50 placeholder-primary focus:placeholder-opacity-25"
                        type="radio"
                        id="female"
                        name="sex"
                        value="female"
                        @if (old('sex')) checked @endif
                      >
                  </label>
              </div>

              @error('sex') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

              <label class="text-primary font-semibold text-lg mt-8 mb-3" for="age">Usia</label>
              <input
                class="w-full py-2 px-4 rounded-xl border border-primary bg-gray-50 placeholder-primary focus:placeholder-opacity-25"
                type="text"
                name="age"
                id="age"
                value="{{ old('age') }}"
              >
              @error('age') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

              <label class="text-primary font-semibold text-lg mt-8 mb-3" for="height">Tinggi</label>
              <input
                class="w-full py-2 px-4 rounded-xl border border-primary bg-gray-50 placeholder-primary focus:placeholder-opacity-25"
                type="text"
                name="height"
                id="height"
                value="{{ old('height') }}"
              >
              @error('height') <span class=" text-sm text-red-500">{{ $message }}</span> @enderror

              <label class="text-primary font-semibold text-lg mt-8 mb-3" for="weight">Berat Badan</label>
              <input
                class="w-full py-2 px-4 rounded-xl border border-primary bg-gray-50 placeholder-primary focus:placeholder-opacity-25"
                type="text"
                name="weight"
                id="weight"
                value="{{ old('weight') }}"
              >
              @error('weight') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

              <input
                type="submit"
                name="submit"
                value="Hitung IMT"
                class="border-2 rounded-2xl border-primary bg-primary mt-4 px-9 py-2 text-white text-sm mt-10 w-min"
              >

          </form>
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
