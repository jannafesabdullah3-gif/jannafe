<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::orderBy('created_at', 'desc')->get();

        return view('admin.foods.index', compact('foods'));
    }

    public function create()
    {
        return view('admin.foods.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'availability' => 'required|in:available,unavailable',
        ]);

        Food::create([
            'name' => $request->name,
            'price' => $request->price,
            'availability' => $request->availability,
        ]);

        return redirect()
            ->route('admin.foods')
            ->with('success', 'Food added successfully.');
    }

    public function edit(Food $food)
    {
        return view('admin.foods.edit', compact('food'));
    }

    public function update(Request $request, Food $food)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'availability' => 'required|in:available,unavailable',
        ]);

        $food->update([
            'name' => $request->name,
            'price' => $request->price,
            'availability' => $request->availability,
        ]);

        return redirect()
            ->route('admin.foods')
            ->with('success', 'Food updated successfully.');
    }

    public function destroy(Food $food)
    {
        $food->delete();

        return redirect()
            ->route('admin.foods')
            ->with('success', 'Food deleted successfully.');
    }
}
