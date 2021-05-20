<table class="table-fixed w-full text-left mt-5">
  <thead class="border-b border-gray-400">
      <tr>
          <th class="w-1/2 text-lg font-semibold">Makanan</th>
          <th class="w-1/4 text-lg font-semibold">Porsi</th>
          <th class="w-1/4 text-lg font-semibold">Kalori</th>
      </tr>
  </thead>
  <tbody class="border-b border-gray-400 pb-2">
      @foreach ($foods as $food)
        <tr>
            <td class="py-2">{{ $food->foodname }}</td>
            <td class="py-2">{{ $food->quantity }}</td>
            <td class="py-2">{{ $food->calorie }} kkal</td>
        </tr>
      @endforeach
  </tbody>
  <tfoot>
      <tr>
          <th class="text-xl font-semibold">Total Kalori</th>
          <th></th>
          <th class="text-xl font-semibold">270 kkal</th>
      </tr>
  </tfoot>
</table>