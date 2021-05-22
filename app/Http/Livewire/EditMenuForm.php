<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;

class EditMenuForm extends Component
{
    public $name;
    public $menu_id;

    protected $listeners = [
        'editMenu' => 'handleEdit'
    ];

    public function handleEdit($id)
    {
        $this->menu_id = $id;
    }

    public function edit()
    {
        $menu = Menu::find($this->menu_id);
        $menu->update([
            'name' => $this->name
        ]);

        $this->emitUp('menuSaved');
        $this->emitUp('closeForm');
    }

    public function render()
    {
        return view('livewire.edit-menu-form');
    }
}
