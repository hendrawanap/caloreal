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
  public $showForm = false;

  protected $listeners = [
    'closeForm' => 'handleClose',
    'menuSaved' => 'refreshMenus'
  ];
  
  public function refreshMenus()
  {
    $this->userMenus = Menu::where('user_id', auth()->user()->id)->get();
  }

  public function mount()
  {
    $this->selected = $this->userMenus[0]->name;
  }

  public function setMenu(Menu $menu, bool $isUserMenu)
  {
    $this->menu = $menu;
    $this->selected = $menu->name;
    $this->emit('menuUpdated', $menu, $isUserMenu);
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
