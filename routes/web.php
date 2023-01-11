<?php

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

Route::post('cars/{id}/reviews', [App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store');
Route::delete('reviews/{car_id}', [App\Http\Controllers\ReviewController::class, 'destroy'])->name('reviews.destroy');

Route::resource('cars', App\Http\Controllers\CarController::class);
