<?php

use App\Http\Controllers\CaagController;
use App\Http\Controllers\CcgrController;
use App\Http\Controllers\DashboardController;
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
Route::get('/pages/Procesos_Calidad_crear', [ProcesoController::class, 'crear'])->name('Procesos_Calidad_crear')->middleware('auth');
Route::post('/pages/Procesos_Calidad/guardaruno', [ProcesoController::class, 'guardar_indicador'])->name('guardar_indicador');
Route::post('/pages/Procesos_Calidad/guardardos', [ProcesoController::class, 'guardar_proceso'])->name('guardar_proceso');
Route::post('/pages/Procesos_Calidad/actualizar/{id}', [ProcesoController::class, 'actualizar'])->name('actualizar_proceso');
Route::post('/pages/Procesos_Calidad/actualizardos/{id}', [ProcesoController::class, 'actualizardos'])->name('actualizar_indicador');
Route::delete('/pages/Procesos_Calidad/eliminar_indicador/{id}', [ProcesoController::class, 'destroy'])->name('eliminar_indicador');
Route::delete('/pages/Procesos_Calidad/eliminar/{id}', [ProcesoController::class, 'destroytwo'])->name('eliminar_');
Route::get('/pages/Procesos_Calidad/listado_indicadores',[ProcesoController::class, 'getlistado_indicadores'])->name('getlistado_indicadores');
Route::get('/pages/Procesos_Calidad/listado_crear_indicadores',[ProcesoController::class, 'getlistado_crear'])->name('getlistado_crear');

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
Route::post('/pages/caag/guardarcaag', [CaagController::class, 'store'])->name('store_caag');
Route::post('/pages/caag/update/{id}', [CaagController::class, 'update'])->name('update_actividadesGerencia');
Route::get('/pages/caag/listado_actividadesGerencia',[CaagController::class, 'getlistado_actividadesGerencia'])->name('getlistado_actividadesGerencia');

/*CCGR*/
Route::get('/pages/ccgr',[CcgrController::class, 'index'])->name('ccgr');
Route::post('/pages/estado_acciones/guardarccgr', [CcgrController::class, 'store'])->name('store_ccgr');
Route::post('/pages/ccgr/update/{id}', [CcgrController::class, 'update'])->name('update_cumplimientoCompromisos');
Route::get('/pages/ccgr/listado_cumplimientoCompromisos',[CcgrController::class, 'getlistado_cumplimientoCompromisos'])->name('getlistado_cumplimientoCompromisos');

/*DASHBOARD*/
Route::get('/pages/dashboard',[DashboardController::class, 'index'])->name('dashboard');



