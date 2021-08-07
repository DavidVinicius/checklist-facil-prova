<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CakeController;

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

Route::get('/cakes', [CakeController::class, "getCakes"])->name("cakes.list");
Route::get('/cakes/{id}', [CakeController::class, "getCake"])->name("cakes.get");
Route::post('/cakes', [CakeController::class, "create"])->name("cakes.store");
Route::put('/cakes/{id}', [CakeController::class, "update"])->name("cakes.update");
Route::delete('/cakes/{id}', [CakeController::class, "destroy"])->name("cakes.destroy");
