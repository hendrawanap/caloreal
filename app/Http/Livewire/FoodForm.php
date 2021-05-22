<?php

namespace App\Http\Livewire;

use App\Models\Food;
use App\Models\Menu;
use Livewire\Component;

class FoodForm extends Component
{
    public $menu;
    public $food;
    public $time;
    protected $listeners = ['setFoodForm'];

    public function addFood($food)
    {
        $this->emitUp('addFood', $food);
    }


    public function render()
    {
        return view('livewire.food-form', [
            'foods' => Food::all()
        ]);
    }

    public function setFoodForm(Menu $menu, $time)
    {
      $this->menu = $menu;
      $this->time = $time;
    }
}
