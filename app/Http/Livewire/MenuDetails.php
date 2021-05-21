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
  protected $listeners = [
    'menuUpdated' => 'changeMenu',
    'closeForm' => 'handleClose',
    'deleteFood' => 'detachFood',
    'addFood' => 'attachFood'
  ];
  public $isUserMenu;
  public $showForm = false;

  public function mount()
  {
    $this->selected = 'Sarapan';
    $this->refreshTime();
  }

  public function attachFood($food)
  {
    $this->menu->foods()->attach($food['id'], ['time' => $this->selected, 'quantity' => 1]);
    $this->emitSelf('closeForm');
    $this->emitSelf('menuUpdated', $this->menu, true);
  }

  public function detachFood($food)
  {
    $this->menu->foods()->detach($food);
    $this->emitSelf('menuUpdated', $this->menu, true);
  }

  public function handleClose()
  {
    $this->showForm = false;
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
    $this->emit('foodsUpdated', $this->foods, $this->foods->sum('calorie'));
  }

  public function setFoods($selected)
  {
    $this->selected = $selected;
    switch ($selected) {
      case 'Sarapan':
        $this->foods = $this->sarapan;
        break;
      case 'Makan Siang':
        $this->foods = $this->makanSiang;
        break;
      case 'Makan Malam':
        $this->foods = $this->makanMalam;
        break;
      case 'Snack':
        $this->foods = $this->snack;
        break;
    }
  }

  public function changeMenu(Menu $menu, $isUserMenu)
  {
    $this->menu = $menu;
    $this->isUserMenu = $isUserMenu;
    $this->refreshTime();
    $this->updateFoodsTable('Sarapan');
  }

  public function render()
  {
    return view('profile.menu-details');
  }
}
