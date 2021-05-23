<?php

namespace App\Http\Controllers;

use App\Models\Bmr;
use Illuminate\Http\Request;

class BmrController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    if (auth()->user()->bmr !== null) {
      return view('bmr.index');
    }
    else {
      return redirect(route('bmi.index'));
    }
  }
}
