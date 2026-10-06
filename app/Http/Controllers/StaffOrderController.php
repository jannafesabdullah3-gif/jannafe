<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class StaffOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'product'])
            ->latest()
            ->get();

        return view('staff.orders', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:Pending,Confirmed,Preparing,Ready,Completed,Cancelled',
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('staff.orders')
            ->with('success', 'Order status updated successfully.');
    }
}