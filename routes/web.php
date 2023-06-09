<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;


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

Route::resource('orders', OrderController::class);
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::post('orders/search', [OrderController::class, 'search'])->name('orders.search')->withoutMiddleware(['auth']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', UserController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('order', OrderController::class);
    Route::resource('customers', CustomerController::class);
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
});