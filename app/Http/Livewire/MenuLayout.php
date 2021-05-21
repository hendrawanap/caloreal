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
    public $showForm = false;

    protected $listeners = [
      'closeForm' => 'handleClose'
    ];

    public function mount() {
      $this->userMenu = $this->userMenus[0];
      $this->selected = $this->userMenu->name;
    }

    public function setMenu(Menu $menu) {
      $this->menu = $menu;
      $this->selected = $menu->name;
      $this->emit('menuUpdated', $menu);
    }

    public function handleClose()
    {
      $this->showForm = false;
    }

    public function render()
    {
        return view('profile.menu-layout');
    }
}
