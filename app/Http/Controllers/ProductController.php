<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Food item added successfully.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
        ]);

        $product->update([
            'name' => $request->name,
            'brand' => $request->brand,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Food item updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Food item deleted successfully.');
    }
}