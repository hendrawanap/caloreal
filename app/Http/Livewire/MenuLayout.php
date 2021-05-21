<?php

namespace App\Http\Livewire;

use App\Models\Menu;
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

    public function setMenu(Menu $menu, bool $isUserMenu) {
      $this->menu = $menu;
      $this->selected = $menu->name;
      $this->emit('menuUpdated', $menu, $isUserMenu);
    }

    public function render()
    {
        return view('profile.menu-layout');
    }
}
