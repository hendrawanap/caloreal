<?php

namespace App\Http\Livewire;

use App\Models\Food;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class MenuDetails extends Component
{
    public $menu;
    public $foods;
    public $selected;
    protected $listeners = ['menuUpdated' => 'changeMenu'];

    public function mount()
    {
      $this->selected = 'sarapan';
    }

    public function updateFoodsTable($selected) 
    {
      $this->setFoods($selected);
      // dd($this->foods);
      // dd($this->foods->sum('calorie'));
      $this->emit('foodsUpdated', $this->foods, $this->foods->sum('calorie'));
    }

    public function setFoods($selected) 
    {
      $this->selected = $selected;
      switch($selected) {
        case 'sarapan': $this->foods = $this->menu->sarapan; break;
        case 'makanSiang': $this->foods = $this->menu->makanSiang; break;
        case 'makanMalam': $this->foods = $this->menu->makanMalam; break;
        case 'snack': $this->foods = $this->menu->snack; break;
      }
    }

    public function changeMenu(Menu $menu)
    {
      $this->menu = $menu;
      $this->updateFoodsTable('sarapan');
    }

    public function render()
    {
        return view('profile.menu-details');
    }
}
