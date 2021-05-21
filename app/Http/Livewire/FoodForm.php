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

    public function addFood($food, $menu)
    {
        $this->menu = Menu::find($menu['id']);
        $this->menu->foods()->attach($food['id'], ['time' => $this->time]);
        $this->emitUp('closeForm');
        $this->emitUp('menuUpdated',$this->menu, true);
    }

    public function render()
    {
        return view('livewire.food-form', [
            'foods' => Food::all()
        ]);
    }
}
