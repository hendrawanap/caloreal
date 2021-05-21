<?php

namespace App\Http\Livewire;

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

    public function render()
    {
        return view('livewire.bmr-form');
    }
}
