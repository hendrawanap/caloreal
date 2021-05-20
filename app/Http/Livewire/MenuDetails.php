<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MenuDetails extends Component
{
    public $menu;
    public $foods;
    public $selected;

    public function mount()
    {
      $this->selected = 'sarapan';
    }

    public function setFoods($newFoods, $selected) 
    {
      $totalCalorie = array_sum(array_map(function($v) {
        return $v['calorie'];
      }, $newFoods));
      $this->foods = $newFoods;
      $this->selected = $selected;
      $this->emit('foodsUpdated', $newFoods, $totalCalorie);
    }

    public function render()
    {
        return view('profile.menu-details');
    }
}
