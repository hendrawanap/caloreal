<div class="flex flex-1 flex-col text-primary">
    <div class="flex">
        <div class="flex flex-1 flex-col max-w-lg mr-12">
            <div wire:loading.remove class="text-xl font-semibold">List Menu Saya</div>
            <div wire:loading wire:target="setMenu" class="text-xl font-semibold">
                Loading...
            </div>
            <div class="relative px-5 mt-2">
                <button class="absolute z-10 left-0 top-16 material-icons p-2 bg-secondary rounded-full "
                    id="my-menu-prev">arrow_left</button>
                <div class="flex overflow-x-auto scrollbar-hide" id="my-menu">
                    @foreach ($menus as $menu)
                        <div wire:click="setMenu({{ $menu }})"
                            class="flex-shrink-0 w-48 h-36 bg-gray-50 hover:bg-gray-100 mr-2 rounded-xl p-3 cursor-pointer">
                            <div class="font-semibold text-lg">{{ $menu->name }}</div>
                            @foreach ($menu->foods->take(4) as $food)
                                <div class="ml-3 mt-1 text-sm">{{ $food->foodname }}</div>
                            @endforeach
                        </div>
                    @endforeach
                    <div
                        class="border border-dashed border-gray-500 flex-shrink-0 w-48 h-36 bg-gray-50 hover:bg-gray-100 mr-2 rounded-xl relative">
                        <div class="absolute left-0 right-0 bottom-8 text-center">Buat Menu</div>
                    </div>
                </div>
                <button class="absolute z-10 right-0 top-16 material-icons p-2 bg-secondary rounded-full"
                    id="my-menu-next">arrow_right</button>
            </div>
        </div>
        <div class="flex flex-1 flex-col max-w-lg">
            <div class="text-xl font-semibold">Rekomendasi Menu</div>
            <div class="relative px-5 mt-2">
                <button class="absolute left-0 top-16 material-icons p-2 bg-secondary rounded-full"
                    id="rec-menu-prev">arrow_left</button>
                <div class="flex overflow-x-auto" id="rec-menu">
                    <div class="flex-shrink-0 w-48 h-36 bg-gray-50 mr-2 rounded-xl p-3">
                        <div class="font-semibold text-lg">Menu 1</div>
                        <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
                        <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
                        <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
                        <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
                    </div>
                    <div class="flex-shrink-0 w-48 h-36 bg-gray-50 mr-2 rounded-xl p-3">
                        <div class="font-semibold text-lg">Menu 2</div>
                        <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
                        <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
                        <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
                        <div class="ml-3 mt-1 text-sm">Nasi goreng sehat</div>
                    </div>
                </div>
                <button class="absolute right-0 top-16 material-icons p-2 bg-secondary rounded-full"
                    id="rec-menu-next">arrow_right</button>
            </div>
        </div>
    </div>
    
    @livewire('menu-details', ['menu' => $menus[0]])
</div>
