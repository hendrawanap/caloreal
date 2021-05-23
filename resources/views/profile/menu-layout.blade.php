<div class="flex flex-1 flex-col text-primary mt-8 lg:mt-0">
    <div class="flex flex-wrap max-w-xs sm:max-w-xl xl:flex-nowrap lg:max-w-2xl xl:max-w-4xl">
        <div class="w-full xl:w-1/2 mr-0 xl:mr-12">
            <div class="flex justify-between">
                <div class="text-xl font-semibold">List Menu Saya</div>
                <div wire:loading wire:target="setMenu" class="text-xl font-semibold">
                    Loading...
                </div>
            </div>
            <div class="relative px-5 mt-2">
                <button class="absolute z-10 left-0 top-16 material-icons p-2 bg-secondary rounded-full "
                    id="my-menu-prev">arrow_left</button>
                <div class="flex overflow-x-auto scrollbar-hide" id="my-menu">
                    @foreach ($userMenus as $userMenu)

                        <div class="relative">
                            <div wire:click="showEditMenu({{ $userMenu->id }})"
                                class="absolute top-3 right-5 cursor-default flex items-center text-sm"><span
                                    class="material-icons">edit</span></div>
                            <div wire:click="destroyMenu({{ $userMenu->id }})"
                                class="absolute bottom-3 right-5 cursor-default flex items-center text-sm"><span
                                    class="material-icons">delete</span></div>
                            <div wire:click="setMenu({{ $userMenu }}, {{ true }})"
                                class="flex-shrink-0 w-48 h-36 hover:bg-gray-200 mr-2 rounded-xl p-3 cursor-pointer {{ $selected == $userMenu->name ? 'bg-gray-200' : 'bg-gray-50' }}">
                                <div class="font-semibold text-lg">{{ $userMenu->name }}</div>
                                @foreach ($userMenu->foods->take(4) as $food)
                                    <div class="ml-3 mt-1 text-sm">{{ $food->foodname }}</div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <div wire:click="$set('showForm', 'true')"
                        class="border border-dashed border-gray-500 flex-shrink-0 w-48 h-36 bg-gray-50 hover:bg-gray-100 mr-2 rounded-xl relative">
                        <div class="absolute left-0 right-0 bottom-8 text-center">Buat Menu</div>
                    </div>
                </div>
                <button class="absolute z-10 right-0 top-16 material-icons p-2 bg-secondary rounded-full"
                    id="my-menu-next">arrow_right</button>
            </div>
        </div>
        <div class="w-full mt-4 xl:mt-0 xl:w-1/2">
            <div class="text-xl font-semibold">Rekomendasi Menu</div>
            <div class="relative px-5 mt-2">
                <button class="absolute left-0 top-16 material-icons p-2 bg-secondary rounded-full"
                    id="rec-menu-prev">arrow_left</button>
                <div class="flex overflow-x-auto scrollbar-hide" id="rec-menu">
                    @foreach ($recMenus as $recMenu)
                        <div wire:click="setMenu({{ $recMenu }}, {{ 0 }})"
                            class="flex-shrink-0 w-48 h-36 hover:bg-gray-200 mr-2 rounded-xl p-3 cursor-pointer {{ $selected == $recMenu->name ? 'bg-gray-200' : 'bg-gray-50' }}">
                            <div class="font-semibold text-lg">{{ $recMenu->name }}</div>
                            @foreach ($recMenu->foods->take(4) as $food)
                                <div class="ml-3 mt-1 text-sm">{{ $food->foodname }}</div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <button class="absolute right-0 top-16 material-icons p-2 bg-secondary rounded-full"
                    id="rec-menu-next">arrow_right</button>
            </div>
        </div>
    </div>

    @if ($userMenus->count() !== 0)
        @livewire('menu-details', ['menu' => $userMenus[0], 'isUserMenu' => true])
    @elseif ($recMenus->count() !== 0)
        @livewire('menu-details', ['menu' => $recMenus[0], 'isUserMenu' => false])
    @else
    @endif

    @if ($showForm)
        @livewire('menu-form')
    @endif

    @if ($showEditMenuForm)
        @livewire('edit-menu-form')
    @endif
</div>
