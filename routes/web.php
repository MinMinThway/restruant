<?php

use App\Http\Controllers\DishController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('order_form');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\WaiterController::class, 'index'])->name('order.form');
Route::post('/ordersubmit', [App\Http\Controllers\WaiterController::class, 'ordersubmit'])->name('order.submit');
Route::get('/order/{order}/serve', [App\Http\Controllers\WaiterController::class, 'serve'])->name('status.serve');


Route::get('/order', [App\Http\Controllers\OrderController::class, 'index'])->name('order.index');

Route::get('/order/{order}/approve', [App\Http\Controllers\OrderController::class, 'approve'])->name('satus.approve');
Route::get('/order/{order}/cancle', [App\Http\Controllers\OrderController::class, 'cancle'])->name('satus.cancle');
Route::get('/order/{order}/ready', [App\Http\Controllers\OrderController::class, 'ready'])->name('satus.ready');

Route::resource('dish', DishController::class);
