<?php

namespace App\Http\Livewire;

use App\Models\Food;
use App\Models\Menu;
use Livewire\Component;

class FoodForm extends Component
{
    public $menu;
    public $foodId;
    public $time;
    public $quantity;
    public $error;
    public $isEdit;
    protected $listeners = ['setFoodForm'];

    public function addFood()
    {
      $this->validate([
        'quantity' => 'required|integer|min:1|max:500'
      ]);
        if ($this->foodId && $this->quantity) {
          $this->emitUp('addFood', $this->foodId, $this->quantity);
          $this->emit('menuSaved');
        } else {
          $this->error = "Anda belum memasukkan makanan atau kuantitas";  
        }
    }


    public function render()
    {
        return view('livewire.food-form', [
            'foods' => Food::all(),
            'types' => Food::select('type')->distinct()->pluck('type')->toArray()
            // User::select('name')->distinct()->pluck('name')->toArray();
        ]);
    }

    public function setFoodForm(Menu $menu, $time, $isEdit=false, $foodId=0, $quantity=0)
    {
      $this->menu = $menu;
      $this->time = $time;
      $this->isEdit = $isEdit;
      if ($foodId && $quantity) {
        $this->foodId = $foodId;
        $this->quantity = $quantity;
        // dd("edit");
      }
    }
}
