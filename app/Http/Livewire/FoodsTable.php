<?php

namespace App\Http\Livewire;

use App\Models\Food;
use App\Models\Menu;
use Livewire\Component;

class FoodsTable extends Component
{
    public $foods;
    public $menu;
    public $time;
    public $isUserMenu;

    protected $listeners = [
      'foodsUpdated' => 'changeFoods',
    ];
    public $totalCalorie;

    public function mount()
    {
      $this->totalCalorie = $this->calculateTotalCalorie($this->foods);
    }

    public function detachFood($food)
    {
      $this->emitUp('deleteFood', $food);
      $this->emit('menuSaved');
    }

    public function changeFoods($newFoods, $isUserMenu)
    {
      $this->foods = $newFoods;
      $this->totalCalorie = $this->calculateTotalCalorie($newFoods);
      $this->isUserMenu = $isUserMenu;
    }

    public function calculateTotalCalorie($foods) 
    {
      return array_sum(array_map(function($v) {
        return $v['calorie'];
      },$foods));
    }
    
    public function render()
    {
        return view('profile.foods-table');
    }
}
