<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\MedidaController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\CondicionController;
use App\Http\Controllers\RubroController;



Route::get('/', function () {
    return view('welcome');
});

// Rutas de recursos para los CRUDs
Route::resource('clientes', ClienteController::class);
Route::resource('proveedores', ProveedorController::class)->parameters([
    'proveedores' => 'proveedor',
]);
Route::resource('productos', ProductoController::class);
Route::resource('marcas', MarcaController::class);
Route::resource('medidas', MedidaController::class)->parameters([
    'medidas' => 'medida',
]);
Route::resource('provincias', ProvinciaController::class);
Route::resource('condiciones', CondicionController::class)->parameters([
    'condiciones' => 'condicion'
]);
Route::resource('rubros', RubroController::class);