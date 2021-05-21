<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;

class MenuForm extends Component
{
    public $name;


    public function store()
    {
        $this->validate([
            'name' => 'required|min:3|max:15',
        ]);

        $menu = Menu::create([
            'name' => $this->name,
            'user_id' => auth()->user()->id,
        ]);
    }

    public function render()
    {
        return view('livewire.menu-form');
    }
}
