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
    'addFood' => 'attachFood',
    'showFoodForm',
    'foodsSaved' => 'handleFoodSaved'
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
    $this->emitSelf('foodsSaved');
  }

  public function detachFood($food)
  {
    $this->menu->foods()->detach($food);
    $this->emitSelf('foodsSaved');
  }

  public function duplicateRecMenu()
  {
    $menu = Menu::create([
      'user_id' => auth()->user()->id,
      'name' => $this->menu->name,
    ]);

    foreach($this->sarapan as $food)
    {
      $menu->foods()->attach($food->id, ['time' => 'Sarapan', 'quantity' => $food->quantity]);
    }
    foreach($this->makanSiang as $food)
    {
      $menu->foods()->attach($food->id, ['time' => 'Makan Siang', 'quantity' => $food->quantity]);
    }
    foreach($this->makanMalam as $food)
    {
      $menu->foods()->attach($food->id, ['time' => 'Makan Malam', 'quantity' => $food->quantity]);
    }
    foreach($this->snack as $food)
    {
      $menu->foods()->attach($food->id, ['time' => 'Snack', 'quantity' => $food->quantity]);
    }

    return redirect(route('profile'));
  }

  public function handleFoodSaved()
  {
    $this->refreshTime();
    $this->updateFoodsTable($this->selected);
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
    $this->emit('foodsUpdated', $this->foods, $this->foods->sum('calorie'), $this->isUserMenu);
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

  public function showFoodForm(Menu $menu, $time)
  {
    $this->showForm = true;
    $this->emit('setFoodForm', $menu, $time);
  }

  public function render()
  {
    return view('profile.menu-details');
  }
}
