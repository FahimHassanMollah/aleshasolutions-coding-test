<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Pages\DashboardController;
use App\Http\Controllers\Admin\Pages\UserGroupController;
use App\Http\Controllers\Admin\Pages\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return "index";
})->name('index');

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

});

require __DIR__.'/auth.php';
