<div>
    @isset($bmr)
        <div class="bg-gray-100 flex flex-col px-4 py-4">
            <div class="text-primary font-semibold text-lg ">Hasil Perhitungan Kalori</div>
            <div class="text-black text-2xl font-semibold">{{ $bmr }} kkal</div>
            <a href="{{ route('profile') }}"
                class="border-2 rounded-2xl border-primary bg-primary px-9 py-2 text-white text-sm mt-10 text-center">Atur
                Menu Makanan</a>
        </div>
    @endisset
</div>
