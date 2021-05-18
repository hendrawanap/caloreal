<?php

use App\Http\Controllers\BmrController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('home');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/bmr', [BmrController::class, 'index'])->name('bmr.index');

Route::get('/food', [FoodController::class, 'index'])->name('food.index');
Route::get('/food/add', 'App\Http\Controllers\FoodController@add');
Route::post('/food/store', 'App\Http\Controllers\FoodController@store');
Route::get('/food/edit/{id}', 'App\Http\Controllers\FoodController@edit');
Route::post('/food/update', 'App\Http\Controllers\FoodController@update');
Route::get('/food/delete/{id}', 'App\Http\Controllers\FoodController@delete');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');