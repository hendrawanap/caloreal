<?php

namespace App\Http\Controllers;

use App\Models\Bmr;
use Illuminate\Http\Request;

class BmrController extends Controller
{
    public function index()
    {
        return view('bmr.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sex' => 'required',
            'age' => 'required|max:3',
            'height' => 'required|max:3',
            'weight' => 'required|max:3',
        ]);
        $bmr = Bmr::create([
            'user_id' => auth()->user()->id,
            'sex' => $request->sex,
            'age' => $request->age,
            'height' => $request->height,
            'weight' => $request->weight,
        ]);

        $bmi = array('value' => $request->weight / pow($request->height * 0.01, 2));

        if($bmi['value'] < 17)
        {
            $bmi['category'] = 'Sangat Kurus';    
        } 
        elseif($bmi['value'] >= 17 && $bmi['value'] < 18.4)
        {
            $bmi['category'] = 'Kurus Ringan';
        }
        elseif($bmi['value'] >= 18.4 && $bmi['value'] < 25)
        {
            $bmi['category'] = 'Normal';
        }
        elseif($bmi['value'] >= 25 && $bmi['value'] < 27)
        {
            $bmi['category'] = 'Gemuk Ringan';
        }
        else
        {
            $bmi['category'] = 'Sangat Gemuk';
        }

        return view('bmr.index', compact('bmi'));
    }
}
