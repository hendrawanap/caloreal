<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;

class FoodsTable extends Component
{
    public $foods;
    public $menu;

    protected $listeners = [
      'foodsUpdated' => 'changeFoods',
    ];
    public $totalCalorie;

    public function mount()
    {
      $this->totalCalorie = $this->foods->sum('calorie');
    }

    public function detachFood($food, $menu)
    {
      $this->menu = Menu::find($menu);
      $this->menu->foods()->detach($food);
      $this->emitUp('menuUpdated',$this->menu, true);
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
