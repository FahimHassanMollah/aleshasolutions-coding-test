<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Pages\DashboardController;

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

});

require __DIR__.'/auth.php';
