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
    public $sarapan;
    public $makanSiang;
    public $makanMalam;
    public $snack;
    protected $listeners = ['menuUpdated' => 'changeMenu'];
    public $isUserMenu;

    public function mount()
    {
      $this->selected = 'sarapan';
      $this->refreshTime();
    }

    public function refreshTime()
    {
      $this->sarapan = $this->menu->sarapan;
      $this->makanSiang = $this->menu->makanSiang;
      $this->makanMalam = $this->menu->makanMalam;
      $this->snack = $this->menu->snack;
    }

    public function updateFoodsTable($selected) 
    {
      $this->setFoods($selected);
      // dd($this->foods);
      // dd($this->foods->sum('calorie'));
      // $this->emit('foodsUpdated', $this->foods, 10);
      $this->emit('foodsUpdated', $this->foods, $this->foods->sum('calorie'));
    }

    public function setFoods($selected) 
    {
      $this->selected = $selected;
      switch($selected) {
        case 'sarapan': $this->foods = $this->sarapan; break;
        case 'makanSiang': $this->foods = $this->makanSiang; break;
        case 'makanMalam': $this->foods = $this->makanMalam; break;
        case 'snack': $this->foods = $this->snack; break;
      }
    }

    public function changeMenu(Menu $menu, $isUserMenu)
    {
      $this->menu = $menu;
      $this->isUserMenu = $isUserMenu;
      $this->refreshTime();
      $this->updateFoodsTable('sarapan');
    }

    public function render()
    {
        return view('profile.menu-details');
    }
}
