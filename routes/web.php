<?php

use App\Http\Controllers\Admin\Pages\CustomerController;
use App\Http\Controllers\Admin\Pages\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Pages\DashboardController;
use App\Http\Controllers\Admin\Pages\UserGroupController;
use App\Http\Controllers\Admin\Pages\UserController;
use App\Http\Controllers\Admin\Pages\CategoryController;
use App\Http\Controllers\Admin\Pages\ProductController;



Route::get('/blank', function () {
    return view('pages.admin.blank');
});

Route::middleware('auth')->name('admin.')->prefix('admin')->group(function(){

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    //Start: Admin::Users -> User
    Route::get('users' , [UserController::class, 'index'])->name('users.index');
    Route::post('users' , [UserController::class, 'store'])->name('users.store');
    Route::get('users/create' , [UserController::class, 'create'])->name('users.create');
    Route::delete('users/destroy', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('users/{user}' , [UserController::class, 'show'])->name('users.show');
    Route::put('users/{user}' , [UserController::class, 'update'])->name('users.update');
    Route::get('users/{user}/edit' , [UserController::class, 'edit'])->name('users.edit');
    //End: Users -> User

    //Start: Admin::Users -> User Group
    Route::get('user-groups', [UserGroupController::class, 'index'])->name('userGroups.index');
    Route::post('user-groups', [UserGroupController::class, 'store'])->name('userGroups.store');
    Route::get('user-groups/create', [UserGroupController::class, 'create'])->name('userGroups.create');
    Route::delete('user-groups/destroy', [UserGroupController::class, 'destroy'])->name('userGroups.destroy');
    Route::get('user-groups/{userGroup}', [UserGroupController::class, 'show'])->name('userGroups.show');
    Route::put('user-groups/{userGroup}', [UserGroupController::class, 'update'])->name('userGroups.update');
    Route::get('user-groups/{userGroup}/edit', [UserGroupController::class, 'edit'])->name('userGroups.edit');
    //End: Admin::Users -> User Group

    //Start: Admin::Catalog -> Category
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::delete('categories/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    //End: Admin::Catalog -> Category

    //Start: Admin::Catalog -> Category
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::delete('products/destroy', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    //End: Admin::Catalog -> Category

    //Start: Admin::Customers -> Customer
    Route::get('customers' , [CustomerController::class, 'index'])->name('customers.index');
    //End: Users -> Customer

    //Start: Admin::Orders -> Order
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::delete('orders/destroy', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::put('orders/{order}', [OrderController::class, 'update'])->name('orders.update');
    //End: Admin::Orders -> Order

});

require __DIR__.'/auth.php';

// front route goes here.
Route::get('/', function () {
    return view('layouts.front');
})->name('index');

Route::any('/{any}', function (){
    return view('layouts.front');
})->where('any', '.*');
