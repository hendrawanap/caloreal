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
    $userMenus = auth()->user()->menus;
    if ($bmr !== null) {
      $recMenus = Menu::where('user_id', 0)->whereBetween('total_calorie', [$bmr->bmr - 350, $bmr->bmr + 350])->get();
    } else {
      $recMenus = null;
    }
    // dd($recMenus->count());
    // dd($bmr);

    return view('profile.index', [
      'bmr' => $bmr,
      'userMenus' => $userMenus,
      'recMenus' => $recMenus
    ]);
  }
}
