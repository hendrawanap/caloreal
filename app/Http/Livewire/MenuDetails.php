<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MenuDetails extends Component
{
    public $menu;
    public $foods;
    public $hidden;

    protected $listeners = ['foodsUpdated' => '$refresh'];

    public function mount($menu)
    {
      $this->hidden = true;
      $this->foods = $menu->sarapan;
    }

    public function setFoods($newFoods) 
    {
      $this->foods = $newFoods;
      // dd($this->foods);
      $this->emit('foodsUpdated');
    }

    public function render()
    {
        return view('profile.menu-details');
    }
}
