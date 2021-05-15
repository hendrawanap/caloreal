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

}
