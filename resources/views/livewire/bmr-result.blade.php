<div>
    @isset($bmr)
        <div class="bg-gray-100 flex flex-col items-center px-14 py-8 mt-6 rounded-2xl">
            <div class="text-primary font-semibold text-lg ">Hasil Perhitungan Kalori</div>
            <div class="text-black text-3xl font-semibold mt-6">{{ round($bmr) }} kkal</div>
            <a href="{{ route('profile') }}"
                class="border-2 rounded-2xl border-primary bg-primary px-24 py-2 text-white text-sm mt-10 text-center whitespace-nowrap">Atur
                Menu Makanan</a>
        </div>
    @endisset
</div>
