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
  
    $bmi = $this->calculateBMI($bmr->weight, $bmr->height);

    $menus = auth()->user()->menus;
  

    return view('profile.index', [
      'bmr' => $bmr,
      'bmi' => $bmi,
      'menus' => $menus,
    ]);
  }

  public function calculateBMI($weight, $height)
  {
    $bmi = array('value' => $weight / pow($height * 0.01, 2));

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

    return $bmi;
  }
}
