<div class="sm:w-80">
    <form wire:submit.prevent="setBmr" class="flex flex-col w-full">
        @csrf
        <label for="activity" class="text-primary font-semibold text-lg mb-3">Aktivitas</label>
        <div class="relative inline-block w-full text-gray-700 mt-2 mb-4">
            <select wire:model="activity" type="text"
                class="w-full py-2 px-4 rounded-lg border border-primary bg-gray-50 placeholder-primary focus:placeholder-opacity-25 appearance-none"
                name="activity" id="activity">
                <option value="">Pilih Aktivitas</option>
                @foreach ($activites as $key => $value)
                    <option value="{{ $value }}">{{ $key }}</option>
                @endforeach
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                    <path
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </div>
        </div>
        <label for="target" class="text-primary font-semibold text-lg mt-4 mb-3">Target Berat Badan</label>
        <input wire:model="target" type="text"
            class="w-full py-2 px-4 rounded-lg border border-primary bg-gray-50 placeholder-primary focus:placeholder-opacity-25"
            name="target" id="target" placeholder="(dalam kg)">
            <div class="mt-2">
              <div>Berat badan ideal: {{ $beratIdeal['min'] . ' ~ ' . $beratIdeal['max'].' kg' }}</div>
              <div>Berat badan sekarang: {{ auth()->user()->bmr->weight }} kg</div>
            </div>

        <input type="submit" name="submit" value="Hitung Kalori"
            class="border-2 cursor-pointer rounded-2xl border-primary bg-primary px-9 py-2 text-white text-sm mt-8 w-min">
    </form>
</div>
