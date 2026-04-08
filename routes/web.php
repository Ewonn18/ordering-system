<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthLogout;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Customer;
use Illuminate\Support\Facades\Auth;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->role == 1) {
            return redirect()->route('admindashboard');
        } else {
            return redirect()->route('customerdashboard');
        }
    })->name('dashboard');
});

Route::post('/logout', [AuthLogout::class, 'logouts'])->name('logouts');

Route::prefix('admin')->middleware(['auth', Admin::class])->group(function () {
    Route::get('/admindashboard', function () {
        return view('admin.index');
    })->name('admindashboard');

    Route::get('/products', function () {
        return view('admin.products');
    })->name('admin.products');

    Route::get('/orderlist', function () {
        return view('admin.orderlist');
    })->name('admin.orderlist');

    Route::get('/messages', function () {
        return view('admin.messages');
    })->name('admin.messages');
});

Route::prefix('customer')->middleware(['auth', Customer::class])->group(function () {
    Route::get('/customerdashboard', function () {
        return view('customer.index');
    })->name('customerdashboard');

     Route::get('/customerproducts', function () {
        return view('customer.products');
    })->name('cp');

    Route::get('/customerorder_status', function () {
        return view('customer.order_status');
    })->name('customer.order_status');
});

require __DIR__ . '/auth.php';
