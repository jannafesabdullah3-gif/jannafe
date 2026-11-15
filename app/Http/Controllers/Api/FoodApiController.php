<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodApiController extends Controller
{
    // GET: Display all foods
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Food::all()
        ], 200);
    }

    // POST: Add a new food
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'availability' => 'required|in:available,unavailable',
        ]);

        $food = Food::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Food added successfully.',
            'data' => $food
        ], 201);
    }

    // GET: Display one food
    public function show(string $id)
    {
        $food = Food::find($id);

        if (!$food) {
            return response()->json([
                'success' => false,
                'message' => 'Food not found.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $food
        ], 200);
    }

    // PUT/PATCH: Update a food
    public function update(Request $request, string $id)
    {
        $food = Food::find($id);

        if (!$food) {
            return response()->json([
                'success' => false,
                'message' => 'Food not found.'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric|min:0',
            'availability' => 'sometimes|required|in:available,unavailable',
        ]);

        $food->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Food updated successfully.',
            'data' => $food
        ], 200);
    }

    // DELETE: Delete a food
    public function destroy(string $id)
    {
        $food = Food::find($id);

        if (!$food) {
            return response()->json([
                'success' => false,
                'message' => 'Food not found.'
            ], 404);
        }

        $food->delete();

        return response()->json([
            'success' => true,
            'message' => 'Food deleted successfully.'
        ], 200);
    }
}
