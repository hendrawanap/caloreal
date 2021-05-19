<?php

namespace App\Http\Controllers;

use App\Models\Bmr;
use App\Models\Menu;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $bmr = auth()->user()->bmr;
    $menus = auth()->user()->menus;
  
    return view('profile.index', [
      'bmr' => $bmr,
      'menus' => $menus,
    ]);
  }
}
