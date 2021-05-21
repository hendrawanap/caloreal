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
                    @foreach ($userMenus as $userMenu)
                        <div wire:click="setMenu({{ $userMenu }})"
                            class="flex-shrink-0 w-48 h-36 hover:bg-gray-200 mr-2 rounded-xl p-3 cursor-pointer {{ $selected == $userMenu->name ? 'bg-gray-200' : 'bg-gray-50'}}">
                            <div class="font-semibold text-lg">{{ $userMenu->name }}</div>
                            @foreach ($userMenu->foods->take(4) as $food)
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
                  @foreach ($recMenus as $recMenu)
                  <div wire:click="setMenu({{ $recMenu }})"
                      class="flex-shrink-0 w-48 h-36 hover:bg-gray-200 mr-2 rounded-xl p-3 cursor-pointer {{ $selected == $recMenu->name ? 'bg-gray-200' : 'bg-gray-50'}}">
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
    
    @livewire('menu-details', ['menu' => $userMenus[0]])
</div>
