<div>
  <form wire:submit.prevent="store" class="flex flex-col w-full" action="{{ route('bmr.store') }}" method="POST" class="flex flex-col">
      @csrf
      <div class="text-primary font-semibold text-lg mb-3">Jenis Kelamin</div>
      <div class="flex flex-shrink-0 text-white">
          <label for="male" class="mr-4">
              <div class="flex flex-col py-2 px-2 bg-gray-50 rounded-xl border border-primary items-center text-primary justify-center sm:px-10">
                <img src="{{ asset('img/boy.png') }}" alt="alt">
                Pria
              </div>
              <input
                wire:model="sex"
                class="w-full py-2 px-4 rounded-xl border border-primary bg-gray-50 placeholder-primary focus:placeholder-opacity-25"
                type="radio"
                id="male"
                name="sex"
                value="male"
                @if (old('sex')) checked @endif
              >
          </label>

          <label for="female">
            <div class="flex flex-col py-2 px-2 bg-gray-50 rounded-xl border border-primary items-center text-primary justify-center sm:px-10">
              <img src="{{ asset('img/girl.png') }}" alt="alt">
              Wanita
            </div>
            <input
              wire:model="sex"
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
        wire:model="age"
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
        wire:model="height"
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
        wire:model="weight"
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
