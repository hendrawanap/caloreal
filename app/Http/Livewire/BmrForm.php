<?php

namespace App\Http\Livewire;

use App\Models\Bmr;
use Livewire\Component;

class BmrForm extends Component
{
    public $sex;
    public $age;
    public $height;
    public $weight;

    public function store()
    {
        $bmr = null;

        $this->validate([
            'sex' => 'required',
            'age' => 'required|integer|max:120',
            'height' => 'required|integer|max:200',
            'weight' => 'required|integer|max:200',
        ]);

        if (auth()->check()) {
            $bmr = Bmr::updateOrCreate(
                [
                    'user_id' => auth()->user()->id
                ],
                [
                    'user_id' => auth()->user()->id,
                    'sex' => $this->sex,
                    'age' => $this->age,
                    'height' => $this->height,
                    'weight' => $this->weight,
                ]
            );
        } else {
            $bmr = [
                'height' => $this->height,
                'weight' => $this->weight
            ];
        }

        $this->resetInput();

        $this->emit('bmrSaved', $bmr);
    }

    private function resetInput()
    {
        $this->sex = null;
        $this->age = null;
        $this->height = null;
        $this->weight = null;
    }



    public function render()
    {
        return view('livewire.bmr-form');
    }
}
