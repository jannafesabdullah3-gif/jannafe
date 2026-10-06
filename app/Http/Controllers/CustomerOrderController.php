<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function create(Product $product)
    {
        return view('customer.place-order', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->stock,
        ]);

        $total = $product->price * $request->quantity;

        Order::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'total_price' => $total,
            'status' => 'Pending',
        ]);

        $product->decrement('stock', $request->quantity);

        return redirect()
            ->route('customer.orders')
            ->with('success', 'Order placed successfully.');
    }

    public function index()
    {
        $orders = Order::with('product')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('customer.order', compact('orders'));
    }
}