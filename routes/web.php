<?php

use App\Http\Controllers\CaagController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PercepcionController;
use App\Http\Controllers\ProcesoController;
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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Auth::routes();

/*Analisis Indicadores*/
Route::get('/pages/Procesos_Calidad', [ProcesoController::class, 'index'])->name('Procesos_Calidad')->middleware('auth');
Route::post('/pages/Procesos_Calidad/guardaruno', [ProcesoController::class, 'guardar_indicador'])->name('guardar_indicador');
Route::post('/pages/Procesos_Calidad/guardardos', [ProcesoController::class, 'guardar_proceso'])->name('guardar_proceso');
Route::post('/pages/Procesos_Calidad/actualizar/{id}', [ProcesoController::class, 'actualizar'])->name('actualizar_proceso');
Route::get('/pages/Procesos_Calidad/listado_indicadores',[ProcesoController::class, 'getlistado_indicadores'])->name('getlistado_indicadores');

/*Percepcion_Cliente*/
Route::get('/pages/percepcion_cliente', [PercepcionController::class, 'index'])->name('percepcion_cliente');
Route::post('/pages/percepcion_cliente/guardar', [PercepcionController::class, 'store'])->name('store_percepcion_cliente');
Route::post('/pages/percepcion_cliente/update/{id}', [PercepcionController::class, 'update'])->name('update_proceso');
Route::get('/pages/percepcion_cliente/listado_proceso',  [PercepcionController::class, 'getlistado_proceso'])->name('getlistado_proceso');

/*Estado acciones*/
Route::get('/pages/estado_acciones',[EstadoController::class, 'index'])->name('estado_acciones');
Route::post('/pages/estado_acciones/guardarestado', [EstadoController::class, 'store'])->name('store_estado_acciones');
Route::post('/pages/estado_acciones/update/{id}', [EstadoController::class, 'update'])->name('update_estado');
Route::get('/pages/estado_acciones/listado_estado',[EstadoController::class, 'getlistado_estado'])->name('getlistado_estado');

/*CAAG*/
Route::get('/pages/caag',[CaagController::class, 'index'])->name('caag');


