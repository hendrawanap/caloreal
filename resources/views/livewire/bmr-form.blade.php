<div class="sm:w-80">
    <form wire:submit.prevent="setBmr" class="flex flex-col w-full">
        @csrf
        <label for="activity" class="text-primary font-semibold text-lg mb-3">Aktivitas</label>
        <div class="flex">
            <select wire:model="activity" type="text"
                class="w-full py-2 px-4 rounded-lg border border-primary bg-gray-50 placeholder-primary focus:placeholder-opacity-25 appearance-none"
                name="activity" id="activity">
                <option value="">Pilih Aktivitas</option>
                @foreach ($activites as $key => $value)
                    <option value="{{ $value }}">{{ $key }}</option>
                @endforeach
            </select>
        </div>
        <label for="target" class="text-primary font-semibold text-lg mt-8 mb-3">Target Berat Badan</label>
        <input wire:model="target" type="text"
            class="w-full py-2 px-4 rounded-lg border border-primary bg-gray-50 placeholder-primary focus:placeholder-opacity-25"
            name="target" id="target" placeholder="(dalam kg)">
            <div class="mt-2">
              <div>Berat badan ideal: {{ $beratIdeal['min'] . ' ~ ' . $beratIdeal['max'].' kg' }}</div>
              <div>Berat badan sekarang: {{ auth()->user()->bmr->weight }} kg</div>
            </div>

        <input type="submit" name="submit" value="Hitung Kalori"
            class="border-2 rounded-2xl border-primary bg-primary px-9 py-2 text-white text-sm mt-8 w-min">
    </form>
</div>
