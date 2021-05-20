<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MenuDetails extends Component
{
    public $menu;
    public $foods;


    public function setFoods($newFoods) 
    {
      $this->foods = $newFoods;
      $this->emit('foodsUpdated', $newFoods);
    }

    public function render()
    {
        return view('profile.menu-details');
    }
}
