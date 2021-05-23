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

  public function attachFood($foodId, $quantity)
  {
    // dd($quantity)
    $this->menu->foods()->sync([$foodId => ['time' => $this->selected, 'quantity' => intval($quantity)]],false);
    // $this->menu->foods()->attach($foodId, ['time' => $this->selected, 'quantity' => intval($quantity)]);
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

    foreach($this->menu->foods as $food)
    {
      $menu->foods()->attach($food->id, [
        'time' => $food->pivot->time,
        'quantity' => $food->pivot->quantity
      ]);
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
    $foodsData = array_map(function($v) {
      return [
        "id" => $v['id'],
        "foodname" => $v['foodname'],
        "calorie" => round($v['pivot']['quantity'] / $v['quantity'] * $v["calorie"]),
        "quantity" => round($v['pivot']['quantity']),
        "time" => $v['pivot']['time']
      ];
    }, $this->menu->foods->toArray());
    $this->sarapan = array_filter($foodsData, function($v) {
      return $v['time'] == 'Sarapan';
    });
    $this->makanSiang = array_filter($foodsData, function($v) {
      return $v['time'] == 'Makan Siang';
    });
    $this->makanMalam = array_filter($foodsData, function($v) {
      return $v['time'] == 'Makan Malam';
    });
    $this->snack = array_filter($foodsData, function($v) {
      return $v['time'] == 'Snack';
    });
  }

  public function updateFoodsTable($selected)
  {
    $this->setFoods($selected);
    $this->emit('foodsUpdated', $this->foods, $this->isUserMenu);
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

  public function showFoodForm(Menu $menu, $time, $isEdit=false, $foodId=0, $quantity=0)
  {
    $this->showForm = true;
    $this->emit('setFoodForm', $menu, $time, $isEdit, $foodId, $quantity);
  }

  public function render()
  {
    return view('profile.menu-details');
  }
}
