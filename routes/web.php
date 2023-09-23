<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ProdukController::class, 'index'])->name('produk');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk-create');
Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk-store');
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk-edit');
Route::post('/produk/{id}/update', [ProdukController::class, 'update'])->name('produk-update');
Route::post('/produk/{id}/delete', [ProdukController::class, 'destroy'])->name('produk-destroy');
