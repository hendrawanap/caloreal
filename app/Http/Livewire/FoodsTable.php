<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FoodsTable extends Component
{
    public $foods;

    public function changeFoods($newFoods)
    {
      $foods = $newFoods;
    }
    
    public function render()
    {
        return view('profile.foods-table');
    }
}
