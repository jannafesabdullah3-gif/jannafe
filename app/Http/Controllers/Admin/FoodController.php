<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    // Display all food items
    public function index()
    {
        $foods = Food::latest()->get();

        return view('admin.foods', compact('foods'));
    }

    // Show form to add food
    public function create()
    {
        return view('admin.foods-create');
    }

    // Save new food
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'availability' => 'required|in:available,unavailable',
        ]);

        Food::create($validated);

        return redirect()
            ->route('admin.foods')
            ->with('success', 'Food added successfully!');
    }

    // Show edit form
    public function edit(Food $food)
    {
        return view('admin.foods-edit', compact('food'));
    }

    // Update existing food
    public function update(Request $request, Food $food)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'availability' => 'required|in:available,unavailable',
        ]);

        $food->update($validated);

        return redirect()
            ->route('admin.foods')
            ->with('success', 'Food updated successfully!');
    }

    // Delete food
    public function destroy(Food $food)
    {
        $food->delete();

        return redirect()
            ->route('admin.foods')
            ->with('success', 'Food deleted successfully!');
    }
}
