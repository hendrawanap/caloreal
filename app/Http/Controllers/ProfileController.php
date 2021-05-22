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
    
    if ($bmr) {
      $bmi = array('value' => $bmr->bmi);
      if ($bmi['value'] < 17) {
          $bmi['category'] = 'Sangat Kurus';
      } elseif ($bmi['value'] >= 17 && $bmi['value'] < 18.4) {
          $bmi['category'] = 'Kurus Ringan';
      } elseif ($bmi['value'] >= 18.4 && $bmi['value'] < 25) {
          $bmi['category'] = 'Normal';
      } elseif ($bmi['value'] >= 25 && $bmi['value'] < 27) {
          $bmi['category'] = 'Gemuk Ringan';
      } else {
          $bmi['category'] = 'Sangat Gemuk';
      }
    }

    return view('profile.index', [
      'bmi' => $bmi,
      'bmr' => $bmr,
      'userMenus' => $userMenus,
      'recMenus' => $recMenus
    ]);
  }
}
