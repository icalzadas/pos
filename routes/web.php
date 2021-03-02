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
Route::get('ventas/pos', [App\Http\Controllers\VentaController::class, 'index'])->name('index_ventas');
Route::post('ventas/store', [App\Http\Controllers\VentaController::class, 'store'])->name('store_ventas');
Route::get('ventas/listado', [App\Http\Controllers\VentaController::class, 'listado'])->name('listado_ventas');

//CLIENTES
Route::resource('clientes', 'App\Http\Controllers\ClienteController');
Route::post('clientes/actualizar', [App\Http\Controllers\ClienteController::class, 'actualizar'])->name('actualizar_cliente');
Route::post('clientes/eliminar', [App\Http\Controllers\ClienteController::class, 'eliminar'])->name('eliminar_cliente');

//CAJA
Route::resource('caja', 'App\Http\Controllers\CajaController');
Route::post('caja/open', [App\Http\Controllers\CajaController::class, 'open'])->name('open');
Route::post('caja/close', [App\Http\Controllers\CajaController::class, 'close'])->name('close');

//ALMACEN
Route::resource('almacen', 'App\Http\Controllers\AlmacenController');



