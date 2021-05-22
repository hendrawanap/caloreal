<?php

namespace App\Http\Livewire;

use App\Models\Bmr;
use Livewire\Component;

class BmrForm extends Component
{
  public $activity;
  public $activites = [
    'Tidak Aktif' => 1.2,
    'Sedikit Aktif' => 1.375,
    'Cukup Aktif' => 1.55,
    'Sangat Aktif' => 1.725,
    'Ekstra Aktif' => 1.9
  ];
  public $target;
  public $bmr;

  public function setBmr()
  {
    $this->bmr = Bmr::updateOrCreate(
      ['user_id' => auth()->user()->id],
      ['bmr' => $this->activity * $this->calculateBmr()]
    );
    $this->emit('showBmr', $this->bmr->bmr);
  }

  public function calculateBmr()
  {
    $user = auth()->user()->bmr;
    if ($user->sex === 'male') {
      return 66 + (13.7 * $user->weight) + (5 * $user->height) - (6.8 * $user->age);
    }
    return 655 + (9.6 * $user->weight) + (1.8 * $user->height) - (4.7 * $user->age);
  }

    public function render()
    {
        return view('livewire.bmr-form');
    }
}
