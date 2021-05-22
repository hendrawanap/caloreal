@php
// $sarapan = $menu->sarapan;
// $makanSiang = $menu->makanSiang;
// $makanMalam = $menu->makanMalam;
// $snack = $menu->snack;
@endphp

<div class="flex flex-col mt-3">
    <div class="flex justify-between bg-gray-50 rounded-xl px-4 py-5 text-xl font-semibold w-full">
        <div>{{ $menu->name }}</div>
        <div>{{ $menu->foods->sum('calorie') }} <span class="text-base text-secondary">/ {{ auth()->user()->bmr->bmr }} kkal</span></div>
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
        @livewire('foods-table', ['foods' => $menu->sarapan, 'menu' => $menu, 'time' => $selected])
    </div>
    @if ($showForm)
        @livewire('food-form', ['menu' => $menu, 'time' => $selected])
    @endif
    <div
        class="self-end text-center  text-sm border rounded-xl border-black bg-primary px-3 sm:px-16 py-2 mt-2 text-white">
        {{ $isUserMenu ? 'Simpan' : 'Duplikat' }}
    </div>
</div>
