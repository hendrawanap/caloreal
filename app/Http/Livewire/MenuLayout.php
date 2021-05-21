<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MenuLayout extends Component
{
    public $userMenus;
    public $recMenus;
    public $menu;
    public $selected;

    public function mount() {
      $this->userMenu = $this->userMenus[0];
      $this->selected = $this->userMenu->name;
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
