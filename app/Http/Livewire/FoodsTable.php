<?php

namespace App\Http\Livewire;

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
      $this->totalCalorie = $this->foods->sum('calorie');
    }

    public function detachFood($food)
    {
      $this->emitUp('deleteFood', $food);
      $this->emit('menuSaved');
    }

    public function changeFoods($newFoods, $calorie, $isUserMenu)
    {
      $this->foods = $newFoods;
      $this->totalCalorie = $calorie;
      $this->isUserMenu = $isUserMenu;
    }
    
    public function render()
    {
        return view('profile.foods-table');
    }
}
