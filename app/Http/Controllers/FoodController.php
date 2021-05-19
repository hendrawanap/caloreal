<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    //
    public function index()
    {
        $foods = Food::all();

        return view('food.index', ['foods' => $foods]);
    }

    public function add()
    {
        return view('/food/add');
    }

    public function store(Request $request)
    {
        Food::create([
            'foodname' => $request->foodname,
            'quantity' => $request->quantity,
            'calorie' => $request->calorie,
            'type' => $request->type,
            'created_at' => \Carbon\Carbon::now()
        ]);

        return redirect('/food');
    }

    public function edit($id)
    {
        $food = Food::where('id', $id)->get();
        return view('/food/edit', ['food' => $food]);
    }

    public function update(Request $request)
    {
        Food::where('id', $request->id)->update([
            'foodname' => $request->foodname,
            'quantity' => $request->quantity,
            'calorie' => $request->calorie,
            'type' => $request->type,
            'updated_at' => \Carbon\Carbon::now()
        ]);

        return redirect('/food');
    }

    public function delete($id)
    {
        Food::where('id', $id)->delete();
        return redirect('/food');
    }
}
