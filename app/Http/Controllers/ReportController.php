<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class ReportController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();

        $totalSales = Order::where('status', 'Completed')
            ->sum('total_price');

        $totalCustomers = User::where('role', 'customer')
            ->count();

        $totalFoodItems = Product::count();

        $pendingOrders = Order::where('status', 'Pending')
            ->count();

        $completedOrders = Order::where('status', 'Completed')
            ->count();

        return view('admin.reports', compact(
            'totalOrders',
            'totalSales',
            'totalCustomers',
            'totalFoodItems',
            'pendingOrders',
            'completedOrders'
        ));
    }
}