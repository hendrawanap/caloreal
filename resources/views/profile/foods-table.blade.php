<div>
    <table class="table-fixed w-full text-left mt-5">
        <thead class="border-b border-gray-400">
            <tr>
                <th class="w-6/12 text-lg font-semibold">Makanan</th>
                <th class="w-3/12 text-lg font-semibold">Porsi</th>
                <th class="w-2/12 text-lg font-semibold">Kalori</th>
                <th class="w-1/12"></th>
            </tr>
        </thead>
        <tbody class="border-b border-gray-400 pb-2">
            @foreach ($foods as $food)
                <tr>
                    <td class="py-2">{{ $food['foodname'] }}</td>
                    <td class="py-2">{{ $food['quantity'] }} gram</td>
                    <td class="py-2">{{ $food['calorie'] }} kkal</td>
                    <td class="material-icons py-2">
                        <span class="cursor-default">edit</span>
                        <span class="cursor-default" wire:click="detachFood({{ $food['id'] }})">delete</span>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td>
                    <div wire:click="$emitUp('showFoodForm',{{ $menu }}, '{{ $time }}')" class="cursor-pointer">
                        Tambah makanan
                    </div>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th class="text-xl font-semibold">Total Kalori</th>
                <th></th>
                <th class="text-xl font-semibold">{{ $totalCalorie }} kkal</th>
            </tr>
        </tfoot>
    </table>
</div>
