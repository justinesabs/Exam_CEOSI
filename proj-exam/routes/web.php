<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FruitController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [FruitController::class, 'index']);
Route::get('/fruit', [FruitController::class, 'index'])->name('fruit.index');
Route::get('/fruit/create', [FruitController::class, 'create'])->name('fruit.create');
Route::post('/fruit', [FruitController::class, 'store'])->name('fruit.store');
Route::get('/fruit/{fruit}/edit', [FruitController::class, 'edit'])->name('fruit.edit');
Route::put('/fruit/{fruit}/update', [FruitController::class, 'update'])->name('fruit.update');
Route::delete('/fruit/{fruit}/destroy', [FruitController::class, 'destroy'])->name('fruit.destroy');