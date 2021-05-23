<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!--
        Background overlay, show/hide based on modal state.
  
        Entering: "ease-out duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100"
          To: "opacity-0"
      -->
        <div wire:click="$emitUp('closeForm')" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
            aria-hidden="true"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <!--
        Modal panel, show/hide based on modal state.
  
        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div
                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Heroicon name: outline/exclamation -->
                        <span class="material-icons">add</span>
                    </div>
                    <div class="mt-3 w-full text-center sm:mt-0 sm:ml-4 sm:text-left">
                      @if ($error)
                      <div wire:model="error" class=" flex text-sm text-gray-700 bg-red-200 p-3 items-center rounded-md mb-4">
                        <div class="material-icons mr-3">block</div>
                        <div>{{ $error }}</div>
                      </div>
                      @endif
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Tambah makanan
                        </h3>
                        {{-- <div class="mt-2">
                            <select class="form-select mt-1 block w-full">
                                @foreach ($foods as $food)
                                    <option class="w-12" wire:click="addFood({{ $food }}, {{ $menu }})">
                                        <span>{{ $food->foodname }}</span>
                                    </option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="relative inline-block w-full text-gray-700 mt-2">
                            <select
                                class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline"
                                placeholder="Regular input"
                                wire:model="foodId">
                                <option value="">Pilih Makanan</option>
                                @foreach ($types as $type)
                                <optgroup label="{{ $type }}">
                                        @foreach ($foods as $food)
                                            @continue($food->type !== $type)
                                            <option value="{{ $food->id }}">
                                                <span>{{ $food->foodname }}</span>
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <label class="text-lg leading-6 font-medium text-gray-900 mt-10" for="quantity">Kuantitas</label>
                        <input wire:model="quantity" class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline mt-2" name="quantity" id="quantity" type="text">
                        <button wire:click="addFood" class="text-center  text-sm border rounded-xl border-black bg-primary px-3 sm:px-9 py-2 mt-6 text-white">Tambah Makanan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
