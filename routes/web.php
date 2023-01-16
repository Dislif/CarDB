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

Route::post('cars/{id}/reviews/store', [App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store');
Route::delete('reviews/{id}/del', [App\Http\Controllers\ReviewController::class, 'destroy'])->name('reviews.destroy');
Route::put('reviews/{id}/update', [App\Http\Controllers\ReviewController::class, 'update'])->name('reviews.update');
Route::get('reviews/{id}/edit', [App\Http\Controllers\ReviewController::class, 'edit'])->name('reviews.edit');

Route::resource('cars', App\Http\Controllers\CarController::class);

Route::get('gadgets/create', [App\Http\Controllers\GadgetController::class, 'create'])->name('gadgets.create');
Route::post('gadgets/store', [App\Http\Controllers\GadgetController::class, 'store'])->name('gadgets.store');

Route::post('gadgets/linker/{id}', [App\Http\Controllers\GadgetController::class, 'link'])->name('gadgets.linker');
Route::post('gadgets/unlinker/{id}/{car_id}', [App\Http\Controllers\GadgetController::class, 'unlink'])->name('gadgets.unlinker');
