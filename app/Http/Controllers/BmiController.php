<?php

namespace App\Http\Controllers;

use App\Models\Bmi;
use Illuminate\Http\Request;

class BmiController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request->has('submit'))
        {   $total = $request->weight / pow($request->height * 0.01, 2);
            $bmi = Bmi::where('lower_value', '<=', $total)
                        ->where('upper_value', '>=', $total)
                        ->first();
        } else
        {   
            $total = null;
            $bmi = null;
        }

        return view('bmi.index', [
            'bmi' => $bmi,
            'total' => round($total, 2)
        ]);
    }

}
