<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeatherController;


/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    if (!auth()->check()) {
        return redirect('/login');
    }

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


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Admin Dashboard + Weather
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/dashboard', [WeatherController::class, 'index'])
        ->name('admin.dashboard');


    /*
    |--------------------------------------------------------------------------
    | Manage Users
    |--------------------------------------------------------------------------
    */

    // SHOW USERS
    Route::get('/admin/users', [UserController::class, 'index'])
        ->name('admin.users.index');

    // SHOW ADD USER FORM
    Route::get('/admin/users/create', [UserController::class, 'create'])
        ->name('admin.users.create');

    // SAVE NEW USER
    Route::post('/admin/users', [UserController::class, 'store'])
        ->name('admin.users.store');

    // SHOW EDIT USER FORM
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])
        ->name('admin.users.edit');

    // UPDATE USER
    Route::put('/admin/users/{user}', [UserController::class, 'update'])
        ->name('admin.users.update');

    // DELETE USER
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])
        ->name('admin.users.destroy');


    /*
    |--------------------------------------------------------------------------
    | Admin Foods
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/foods', function () {
        return view('admin.foods');
    })->name('admin.foods');


    /*
    |--------------------------------------------------------------------------
    | Admin Orders
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/orders', function () {
        return view('admin.orders');
    })->name('admin.orders');


    /*
    |--------------------------------------------------------------------------
    | Admin Reports
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/reports', function () {
        return view('admin.reports');
    })->name('admin.reports');

});


/*
|--------------------------------------------------------------------------
| STAFF
|--------------------------------------------------------------------------
*/

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


/*
|--------------------------------------------------------------------------
| CUSTOMER
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:customer'])->group(function () {

    Route::get('/customer/dashboard', function () {
        return view('dashboards.customer');
    })->name('customer.dashboard');

});


/*
|--------------------------------------------------------------------------
| MANAGER
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:manager'])->group(function () {

    Route::get('/manager/dashboard', function () {
        return view('dashboards.manager');
    })->name('manager.dashboard');

});