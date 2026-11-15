<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\GoogleAuthController;
use App\Models\Food;

// Home
Route::get('/', function () {
    return view('welcome');
});

// Authentication
require __DIR__ . '/auth.php';

// Google Authentication
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])
    ->name('auth.google');

Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])
    ->name('auth.google.callback');

// Dashboard redirect
Route::get('/dashboard', function () {
    $role = auth()->user()->role;

    if ($role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    if ($role === 'staff') {
        return redirect()->route('staff.dashboard');
    }

    if ($role === 'customer') {
        return redirect()->route('customer.dashboard');
    }

    if ($role === 'manager') {
        return redirect()->route('manager.dashboard');
    }

    abort(403, 'Unauthorized role access');
})->middleware('auth')->name('dashboard');

// ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [WeatherController::class, 'index'])
        ->name('admin.dashboard');

    // Manage Users
    Route::get('/admin/users', [UserController::class, 'index'])
        ->name('admin.users.index');

    Route::get('/admin/users/create', [UserController::class, 'create'])
        ->name('admin.users.create');

    Route::post('/admin/users', [UserController::class, 'store'])
        ->name('admin.users.store');

    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])
        ->name('admin.users.edit');

    Route::put('/admin/users/{user}', [UserController::class, 'update'])
        ->name('admin.users.update');

    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])
        ->name('admin.users.destroy');

    // Manage Foods
    Route::get('/admin/foods', [FoodController::class, 'index'])
        ->name('admin.foods');

    Route::get('/admin/foods/create', [FoodController::class, 'create'])
        ->name('admin.foods.create');

    Route::post('/admin/foods', [FoodController::class, 'store'])
        ->name('admin.foods.store');

    Route::get('/admin/foods/{food}/edit', [FoodController::class, 'edit'])
        ->name('admin.foods.edit');

    Route::put('/admin/foods/{food}', [FoodController::class, 'update'])
        ->name('admin.foods.update');

    Route::delete('/admin/foods/{food}', [FoodController::class, 'destroy'])
        ->name('admin.foods.destroy');

    // Admin Orders
    Route::get('/admin/orders', function () {
        return view('admin.orders');
    })->name('admin.orders');

    // Admin Reports
    Route::get('/admin/reports', function () {
        return view('admin.reports');
    })->name('admin.reports');
});

// STAFF
Route::middleware(['auth', 'role:staff'])->group(function () {

    Route::get('/staff/dashboard', function () {
        return view('dashboards.staff');
    })->name('staff.dashboard');

    Route::get('/staff/orders', function () {
        return view('staff.orders');
    })->name('staff.orders');

    Route::get('/staff/orders/manage', function () {
        return view('staff.manage-orders');
    })->name('staff.orders.manage');

    Route::get('/staff/orders/status', function () {
        return view('staff.update-status');
    })->name('staff.orders.status');
});

// CUSTOMER
Route::middleware(['auth', 'role:customer'])->group(function () {

    // Customer Dashboard
    Route::get('/customer/dashboard', function () {
        return view('dashboards.customer');
    })->name('customer.dashboard');

    // View Foods
    Route::get('/customer/foods', function () {
        $foods = Food::where('availability', 'available')
            ->latest()
            ->get();

        return view('customer.foods', compact('foods'));
    })->name('customer.foods');

    // Order Food
    Route::get('/customer/order', function () {
        $foods = Food::where('availability', 'available')
            ->latest()
            ->get();

        return view('customer.order', compact('foods'));
    })->name('customer.order');

    // My Orders
    Route::get('/customer/orders', function () {
        return view('customer.orders');
    })->name('customer.orders');

    // Order Status
    Route::get('/customer/order-status', function () {
        return view('customer.order-status');
    })->name('customer.order-status');
});

// MANAGER
Route::middleware(['auth', 'role:manager'])->group(function () {

    Route::get('/manager/dashboard', function () {
        return view('dashboards.manager');
    })->name('manager.dashboard');
});
