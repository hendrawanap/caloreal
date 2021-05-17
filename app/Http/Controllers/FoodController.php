<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    //
    public function index()
    {
        $foods = DB::table('foods')->get();

        return view('food.index', ['foods' => $foods]);
    }

    public function add()
    {
        return view('/food/add');
    }

    public function store(Request $request)
    {
        DB::table('foods')->insert([
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
        $foods = DB::table('foods')->where('id', $id)->get();
        return view('/food/edit', ['foods' => $foods]);
    }

    public function update(Request $request)
    {
        DB::table('foods')->where('id', $request->id)->update([
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
        DB::table('foods')->where('id', $id)->delete();
        return redirect('/food');
    }
}
