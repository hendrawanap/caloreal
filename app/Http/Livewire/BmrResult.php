<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BmrResult extends Component
{
  public $bmr;
  protected $listeners = ['showBmr'];

  public function showBmr($bmr)
  {
    $this->bmr = $bmr;
  }
    public function render()
    {
        return view('livewire.bmr-result');
    }
}
