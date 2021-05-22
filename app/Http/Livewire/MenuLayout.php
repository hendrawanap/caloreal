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
  public $showEditMenuForm = false;

  protected $listeners = [
    'closeForm' => 'handleClose',
    'menuSaved' => 'refreshMenus',
  ];
  
  public function refreshMenus()
  {
    $this->userMenus = Menu::where('user_id', auth()->user()->id)->get();
    if ($this->userMenus === null) {
      $this->menu = $this->recMenus[0];
    }
  }

  public function mount()
  {
    if ($this->userMenus->count() !==0 ) {
      $this->selected = $this->userMenus[0]->name;
    }
  }

  public function setMenu(Menu $menu, bool $isUserMenu)
  {
    $this->menu = $menu;
    $this->selected = $menu->name;
    $this->emit('menuUpdated', $menu, $isUserMenu);
  }

  public function destroyMenu($id)
  {
    $menu = Menu::find($id);
    $menu->delete();
    // $this->emit('menuSaved');
    return redirect(route('profile'));
  }

  public function showEditMenu($id)
  {
    $this->showEditMenuForm = true;
    $this->emit('editMenu', $id);
  }

  public function handleClose()
  {
    $this->showForm = false;
    $this->showEditMenuForm = false;
  }

  public function render()
  {
    return view('profile.menu-layout');
  }
}
