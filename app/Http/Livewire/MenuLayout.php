<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MenuLayout extends Component
{
    public $menus;
    public Menu $menu;
    public $selected;

    public function mount() {
      $this->menu = $this->menus[0];
      $this->selected = $this->menu->name;
    }

    public function setMenu(Menu $menu) {
      $this->menu = $menu;
      $this->selected = $menu->name;
      // dd($this->menu);
      $this->emit('menuUpdated', $menu);
    }

    public function render()
    {
        return view('profile.menu-layout');
    }
}
