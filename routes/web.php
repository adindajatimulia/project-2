<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\OrderController;

Route::get('/', [AuthController::class, 'index'])->middleware(['guest'])->name('auth');
Route::post('/sign-in', [AuthController::class, 'authentication'])->middleware(['guest'])->name('auth.signin');
Route::get('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('orders/menu-qr/{table}', [OrderController::class, 'logout'])->name('orders');

Route::prefix('apps')->middleware(['login'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('transaction')->group(function () {
        Route::get('', [TransactionController::class, 'index'])->name('transaction');
        Route::get('get-data', [TransactionController::class, 'getData'])->name('transaction.getData');
    });

    Route::prefix('users')->middleware('can:read-users')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('users');
        Route::get('get-data', [UserController::class, 'getData'])->name('users.getData');
        Route::post('create', [UserController::class, 'store'])->name('users.create');
        Route::post('{user}/update', [UserController::class, 'update'])->name('users.update');
        Route::delete('{user}/delete', [UserController::class, 'destroy'])->name('users.delete');
    });

    Route::prefix('tables')->group(function () {
        Route::get('', [TableController::class, 'index'])->name('tables');
        Route::get('get-data', [TableController::class, 'getData'])->name('tables.getData');
        Route::get('print', [TableController::class, 'print'])->name('tables.print');
        Route::post('create', [TableController::class, 'store'])->name('tables.create');
        Route::post('{table}/update', [TableController::class, 'update'])->name('tables.update');
        Route::delete('{table}/delete', [TableController::class, 'destroy'])->name('tables.delete');
    });

    Route::prefix('categories')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('categories');
        Route::get('get-data', [CategoryController::class, 'getData'])->name('categories.getData');
        Route::post('create', [CategoryController::class, 'store'])->name('categories.create');
        Route::post('{category}/update', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('{category}/delete', [CategoryController::class, 'destroy'])->name('categories.delete');
    });

    Route::prefix('vendors')->group(function () {
        Route::get('', [VendorController::class, 'index'])->name('vendors');
        Route::get('get-data', [VendorController::class, 'getData'])->name('vendors.getData');
        Route::post('create', [VendorController::class, 'store'])->name('vendors.create');
        Route::post('{vendor}/update', [VendorController::class, 'update'])->name('vendors.update');
        Route::delete('{vendor}/delete', [VendorController::class, 'destroy'])->name('vendors.delete');
    });

    Route::prefix('menuitems')->group(function () {
        Route::get('', [MenuItemController::class, 'index'])->name('menuitems');
        Route::get('get-data', [MenuItemController::class, 'getData'])->name('menuitems.getData');
        Route::post('create', [MenuItemController::class, 'store'])->name('menuitems.create');
        Route::post('{menuItem}/update', [MenuItemController::class, 'update'])->name('menuitems.update');
        Route::delete('{menuItem}/delete', [MenuItemController::class, 'destroy'])->name('menuitems.delete');
    });
});

// landing page & menu home
Route::get('/landingpage', function () {
    return view('user/home');
});

Route::get('/order-detail', function () {
    return view('user/order_detail');
});

Route::get('/menu', function () {
    return view('user/menu');
});

Route::get('/menu/{category}/{id}', function ($category, $id) {
    return view('user/menu_detail', compact('category', 'id'));
});
