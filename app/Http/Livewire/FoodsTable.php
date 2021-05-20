<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FoodsTable extends Component
{
    public $foods;
    protected $listeners = ['foodsUpdated' => 'changeFoods'];

    public function changeFoods($newFoods)
    {
      $this->foods = $newFoods;
    }
    
    public function render()
    {
        return view('profile.foods-table');
    }
}
