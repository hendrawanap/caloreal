<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FoodsTable extends Component
{
    public $foods;
    protected $listeners = [
      'foodsUpdated' => 'changeFoods',
    ];
    public $totalCalorie;

    public function mount()
    {
      $this->totalCalorie = $this->foods->sum('calorie');
    }

    public function changeFoods($newFoods, $calorie)
    {
      $this->foods = $newFoods;
      $this->totalCalorie = $calorie;
    }
    
    public function render()
    {
        return view('profile.foods-table');
    }
}
