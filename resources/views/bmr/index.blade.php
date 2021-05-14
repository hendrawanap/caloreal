@extends('layouts.master')

@section('title', 'Daking | Kalkulator Indeks Massa Tubuh')

@section('content')
<div class="bg-ternary relative pt-40">
  <div class="container mx-auto h-72">
    <h1 class="relative z-10 text-5xl font-semibold mb-3 text-primary">Indeks Massa Tubuh</h1>
    <p class="relative z-10 text-primary text-lg max-w-xl">
      Indeks Massa Tubuh (IMT) adalah nilai ukur untuk mengetahui status gizi seseorang berdasarkan berat dan tinggi badannya.
    </p>
  </div>
  <img src="{{ asset('img/Image-BMI.png') }}" alt="alt" class="absolute bottom-0 right-0">
</div>
<div class="container mx-auto pt-10 pb-10 flex flex-wrap lg:flex-nowrap justify-between">
    <div class="mr-10 w-full lg:max-w-lg">
      <form class="flex flex-col w-full" action="{{ route('bmr.store') }}" method="POST" class="flex flex-col">
          @csrf
          <div class="text-primary font-semibold text-lg mb-3">Jenis Kelamin</div>
          <div class="flex text-white">
              <label for="male" class="pr-4">
                  <div class="flex flex-col py-2 px-10 bg-gray-50 rounded-xl border border-primary items-center text-primary justify-center">
                    <img src="{{ asset('img/boy.png') }}" alt="alt">
                    Pria
                  </div>
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
                <div class="flex flex-col py-2 px-10 bg-gray-50 rounded-xl border border-primary items-center text-primary justify-center">
                  <img src="{{ asset('img/girl.png') }}" alt="alt">
                  Wanita
                </div>
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
            placeholder="(dalam tahun)"
          >
          @error('age') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

          <label class="text-primary font-semibold text-lg mt-8 mb-3" for="height">Tinggi Badan</label>
          <input
            class="w-full py-2 px-4 rounded-xl border border-primary bg-gray-50 placeholder-primary focus:placeholder-opacity-25"
            type="text"
            name="height"
            id="height"
            value="{{ old('height') }}"
            placeholder="(dalam cm)"
          >
          @error('height') <span class=" text-sm text-red-500">{{ $message }}</span> @enderror

          <label class="text-primary font-semibold text-lg mt-8 mb-3" for="weight">Berat Badan</label>
          <input
            class="w-full py-2 px-4 rounded-xl border border-primary bg-gray-50 placeholder-primary focus:placeholder-opacity-25"
            type="text"
            name="weight"
            id="weight"
            value="{{ old('weight') }}"
            placeholder="(dalam kg)"
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

    <div class="flex flex-shrink-0">
        <div class="flex flex-1 flex-col bg-gray-50 px-16 py-10 rounded-xl justify-center items-center max-w-xl shadow-lg">
            @isset($bmi)
                <h1 class="text-xl font-semibold mt-4 text-primary">Hasil Perhitungan IMT</h1>
                <div class="flex mt-6 w-40 h-40 rounded-full items-center justify-center bg-ternary">
                  <div class="flex w-32 h-32 rounded-full items-center justify-center bg-primary">
                    <div class="text-4xl text-white">{{ round($bmi['value'], 2) }}</div>
                  </div>
                </div>
                <span class="text-lg mt-4 font-semibold text-primary">{{ $bmi['category'] }}</span>
                <p class="mt-4 text-primary">
                    Untuk menjaga kesehatan badan, Anda perlu mengetahui terlebih dulu berapa banyak kalori yang dibutuhkan
                    tubuh per harinya. Agar tubuh mendapatkan sumber energi yang maksimal untuk beraktivitas.
                </p>
                <a
                  href="#"
                  class="w-full text-center border-2 rounded-xl border-black bg-primary px-9 py-2 mt-2 text-white"
                >
                  Atur Asupan Kalorimu
                </a>
            @endisset
        </div>
    </div>
</div>
@endsection
