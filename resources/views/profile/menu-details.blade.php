@php
  
  $foodsArray = $menu->foods->toArray();
  // dd($foodsArray);
  $foodsData = array_map(function($v) {
    return [
      "id" => $v['id'],
      "foodname" => $v['foodname'],
      "calorie" => round($v['pivot']['quantity'] / $v['quantity'] * $v["calorie"]),
      "quantity" => round($v['pivot']['quantity']),
      "time" => $v['pivot']['time']
    ];
  }, $foodsArray);
  $sarapan = array_filter($foodsData, function($v) {
    return $v['time'] == 'Sarapan';
  });
  // dd($sarapan);
  $totalCalorie = array_sum(array_map(function($v) {
    return $v["calorie"];
  }, $foodsData));

@endphp

<div class="flex flex-col mt-3">
    <div class="flex justify-between bg-gray-50 rounded-xl px-4 py-5 text-xl font-semibold w-full">
        <div>{{ $menu->name }}</div>
        <div>{{ $totalCalorie }} <span class="text-base text-secondary">/ {{ auth()->user()->bmr->bmr }} kkal</span></div>
    </div>
    <div class="bg-gray-50 rounded-xl px-4 py-5 w-full mt-3">
        <div class="flex justify-between gap-x-4 text-sm text-center font-semibold">
            <button wire:click="updateFoodsTable('Sarapan')"
                class="flex-1 border py-3 rounded-xl {{ $selected === 'Sarapan' ? 'border-secondary bg-secondary' : 'border-primary' }}"
                id="btn-sarapan">Sarapan</button>
            <button wire:click="updateFoodsTable('Makan Siang')"
                class="flex-1 border py-3 rounded-xl {{ $selected === 'Makan Siang' ? 'border-secondary bg-secondary' : 'border-primary' }}"
                id="btn-makan-siang">Makan Siang</button>
            <button wire:click="updateFoodsTable('Makan Malam')"
                class="flex-1 border border-primary py-3 rounded-xl {{ $selected === 'Makan Malam' ? 'border-secondary bg-secondary' : 'border-primary' }}"
                id="btn-makan-malam">Makan Malam</button>
            <button wire:click="updateFoodsTable('Snack')"
                class="flex-1 border border-primary py-3 rounded-xl {{ $selected === 'Snack' ? 'border-secondary bg-secondary' : 'border-primary' }}"
                id="btn-snack">Snack</button>
        </div>
        @livewire('foods-table', ['foods' => $sarapan, 'menu' => $menu, 'time' => $selected, 'isUserMenu' => $isUserMenu])
    </div>
    @if ($showForm)
        @livewire('food-form', ['menu' => $menu, 'time' => $selected])
    @endif
    @if (!$isUserMenu)
    <div
        wire:click="duplicateRecMenu"
        class="self-end text-center  text-sm border rounded-xl border-black bg-primary px-3 sm:px-16 py-2 mt-2 text-white">
        Duplikat
    </div>
    @endif
</div>
