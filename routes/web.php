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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

//PRODUCTOS
Route::resource('productos', 'App\Http\Controllers\ProductoController');
Route::post('productos/actualizar', [App\Http\Controllers\ProductoController::class, 'actualizar'])->name('actualizar');
Route::post('productos/eliminar', [App\Http\Controllers\ProductoController::class, 'eliminar'])->name('eliminar');
Route::post('productos/autocomplete', [App\Http\Controllers\ProductoController::class, 'getAutocompleteProducts'])->name('getAutocompleteProducts');
Route::post('productos/info', [App\Http\Controllers\ProductoController::class, 'getProductInfo'])->name('getProductInfo');

//CATEGORIAS
Route::resource('categorias', 'App\Http\Controllers\CategoriaController');
Route::post('categorias/actualizar', [App\Http\Controllers\CategoriaController::class, 'actualizar'])->name('actualizar_categoria');
Route::post('categorias/eliminar', [App\Http\Controllers\CategoriaController::class, 'eliminar'])->name('eliminar_categoria');

//VENTAS
Route::get('ventas', [App\Http\Controllers\VentaController::class, 'index'])->name('index_ventas');



