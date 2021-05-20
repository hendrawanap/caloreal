@php
// $sarapan = $menu->sarapan;
// $makanSiang = $menu->makanSiang;
// $makanMalam = $menu->makanMalam;
// $snack = $menu->snack;
@endphp

<div class="flex flex-col mt-3">
    <div class="flex justify-between bg-gray-50 rounded-xl px-4 py-5 text-xl font-semibold w-full">
        <div>{{ $menu->name }}</div>
        <div>{{ $menu->foods->sum('calorie') }} <span class="text-base text-secondary">/ 1700 kkal</span></div>
    </div>
    <div class="bg-gray-50 rounded-xl px-4 py-5 w-full mt-3">
        <div class="flex justify-between gap-x-4 text-sm text-center font-semibold">
            <button wire:click="updateFoodsTable('sarapan')"
                class="flex-1 border py-3 rounded-xl {{ $selected === 'sarapan' ? 'border-secondary bg-secondary' : 'border-primary' }}"
                id="btn-sarapan">Sarapan</button>
            <button wire:click="updateFoodsTable('makanSiang')"
                class="flex-1 border py-3 rounded-xl {{ $selected === 'makanSiang' ? 'border-secondary bg-secondary' : 'border-primary' }}"
                id="btn-makan-siang">Makan Siang</button>
            <button wire:click="updateFoodsTable('makanMalam')"
                class="flex-1 border border-primary py-3 rounded-xl {{ $selected === 'makanMalam' ? 'border-secondary bg-secondary' : 'border-primary' }}"
                id="btn-makan-malam">Makan Malam</button>
            <button wire:click="updateFoodsTable('snack')"
                class="flex-1 border border-primary py-3 rounded-xl {{ $selected === 'snack' ? 'border-secondary bg-secondary' : 'border-primary' }}"
                id="btn-snack">Snack</button>
        </div>
        @livewire('foods-table', ['foods' => $menu->sarapan])
    </div>
    <div
        class="self-end text-center  text-sm border rounded-xl border-black bg-primary px-3 sm:px-16 py-2 mt-2 text-white">
        Duplikat
    </div>
</div>
