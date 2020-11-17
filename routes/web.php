<?php

use App\Http\Controllers\ManagerController;
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
Route::resource('/supply', SupplyController::class);
Route::resource('/parts', PartController::class);
Route::resource('/manager', ManagerController::class);
Route::resource('/suppliers', SupplierController::class);
