<?php

namespace App\Http\Livewire;

use App\Models\Food;
use App\Models\Menu;
use Livewire\Component;

class FoodForm extends Component
{
    public $menu;
    public $foodId = 1;
    public $time;
    public $quantity;
    protected $listeners = ['setFoodForm'];

    public function addFood()
    {
        $this->emitUp('addFood', $this->foodId, $this->quantity);
        $this->emit('menuSaved');
    }


    public function render()
    {
        return view('livewire.food-form', [
            'foods' => Food::all(),
            'types' => Food::select('type')->distinct()->pluck('type')->toArray()
            // User::select('name')->distinct()->pluck('name')->toArray();
        ]);
    }

    public function setFoodForm(Menu $menu, $time)
    {
      $this->menu = $menu;
      $this->time = $time;
    }
}
