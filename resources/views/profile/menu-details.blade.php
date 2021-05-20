@php
    $sarapan = $menu->sarapan;
    $makanSiang = $menu->makanSiang;
    $makanMalam = $menu->makanMalam;
    $snack = $menu->snack;
    // $foods = $makanSiang;
@endphp

<div class="flex flex-col mt-3">
  <div class="flex justify-between bg-gray-50 rounded-xl px-4 py-5 text-xl font-semibold w-full">
      <div>{{ $menu->name }}</div>
      <div>{{ $menu->total_calorie }} <span class="text-base text-secondary">/ 1700 kkal</span></div>
  </div>
  <div class="bg-gray-50 rounded-xl px-4 py-5 w-full mt-3">
      <div class="flex justify-between gap-x-4 text-sm text-center font-semibold">
          <button wire:click="setFoods({{ $sarapan }})" class="flex-1 border border-secondary bg-secondary py-3 rounded-xl">Sarapan</button>
          <button wire:click="setFoods({{ $makanSiang }})" class="flex-1 border border-primary py-3 rounded-xl">Makan Siang</button>
          <button wire:click="setFoods({{ $makanMalam }})" class="flex-1 border border-primary py-3 rounded-xl">Makan Malam</button>
          <button wire:click="setFoods({{ $snack }})" class="flex-1 border border-primary py-3 rounded-xl">Snack</button>
      </div>
      @livewire('foods-table', ['foods' => $sarapan])
      @livewire('foods-table', ['foods' => $makanSiang])
      @livewire('foods-table', ['foods' => $makanMalam])
      @livewire('foods-table', ['foods' => $snack])
  </div>
  <div
      class="self-end text-center  text-sm border rounded-xl border-black bg-primary px-3 sm:px-16 py-2 mt-2 text-white">
      Duplikat
  </div>
</div>