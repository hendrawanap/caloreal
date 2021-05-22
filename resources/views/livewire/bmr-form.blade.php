<div>
  <form wire:submit.prevent="setBmr" class="flex flex-col w-full">
    @csrf
    <label for="activity" class="text-primary font-semibold text-lg mb-3">Aktivitas</label>
    <div class="flex">
      <select
      wire:model="activity"
      type="text"
      class="w-full py-2 px-4 rounded-xl border border-primary bg-gray-50 placeholder-primary focus:placeholder-opacity-25"
      name="activity"
      id="activity"
      >
      @foreach ($activites as $key => $value)
      <option value="{{ $value }}">{{ $key }}</option>
      @endforeach
    </select>
    {{-- <div class="cursor-pointer relative">
      <span class="material-icons">help</span>
      <div class="invisible absolute z-10 bg-gray-300 text-center text-primary hover:visible">
        Hello
      </div>
    </div> --}}
  </div>
    <label for="target" class="text-primary font-semibold text-lg mt-8 mb-3">Target Berat Badan</label>
    <input
      wire:model="target"
      type="text"
      class="w-full py-2 px-4 rounded-xl border border-primary bg-gray-50 placeholder-primary focus:placeholder-opacity-25"
      name="target"
      id="target"
      placeholder="(berat badan sekarang: {{ auth()->user()->bmr->weight }} kg)"
    >

    <input
        type="submit"
        name="submit"
        value="Hitung Kalori"
        class="border-2 rounded-2xl border-primary bg-primary px-9 py-2 text-white text-sm mt-8 w-min"
      >
  </form>
</div>
