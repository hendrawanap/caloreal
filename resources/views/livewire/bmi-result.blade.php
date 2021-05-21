@php
  $warna = [
    'Sangat Kurus' => '#95ACFC',
    'Kurus Ringan' => '#95F0FC',
    'Normal' => '#97FC95',
    'Gemuk Ringan' => '#FCEC95',
    'Sangat Gemuk' => '#FCA295',
  ]
@endphp

<div>
    @isset($bmi)
    <div class="flex flex-col bg-gray-50 px-8 sm:px-16 py-5 sm:py-10 rounded-xl justify-center items-center lg:max-w-xl shadow-lg">
      <h1 class="text-xl font-semibold mt-4 text-primary text-center">Hasil Perhitungan IMT</h1>
      <div class="flex mt-6 w-40 h-40 rounded-full items-center justify-center" style="background-color: {{ $warna[$bmi['category']] }}">
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
        href="{{ route("bmr.index")}}"
        class="w-full text-center border rounded-xl border-black bg-primary px-3 sm:px-9 py-2 mt-2 text-white"
      >
        Atur Asupan Kalorimu
      </a>
    </div>
    @endisset
</div>