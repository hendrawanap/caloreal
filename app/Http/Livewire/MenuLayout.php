<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MenuLayout extends Component
{
    public $menus;

    public function render()
    {
        return view('profile.menu-layout');
    }
}
