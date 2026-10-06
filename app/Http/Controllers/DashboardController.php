<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $role = strtolower($request->user()->role ?? '');

        return match ($role) {
            'admin' => redirect()->route('admin.dashboard'),
            'manager' => redirect()->route('manager.dashboard'),
            'staff' => redirect()->route('staff.dashboard'),
            'client' => redirect()->route('client.dashboard'),
            default => abort(403, 'UNAUTHORIZED ACCESS.'),
        };
    }

    public function adminDashboard()
    {
        return view('admin');
    }
}