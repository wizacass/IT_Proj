<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SupplyController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/manager', [ManagerController::class, 'index']);
Route::get('/supply', [SupplyController::class, 'index']);
Route::get('/admin', [AdminController::class, 'index']);

Route::resource('/parts', PartController::class);
Route::post('/parts/search', [PartController::class, 'search']);

Route::resource('/suppliers', SupplierController::class);
Route::get('/suppliers/{id}/order', [SupplierController::class, 'order']);

Route::resource('/orders', OrderController::class);
