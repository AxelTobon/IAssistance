<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\BajasController;
use App\Http\Controllers\OmisionesController;

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

$controller_path = 'App\Http\Controllers';

// Main Page Route

// pages

Route::get('/asistencia/index', [App\Http\Controllers\AsistenciaController::class,'index'])->name('asistencia-index');
Route::resource('asistencia',AsistenciaController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
$controller_path = 'App\Http\Controllers';

    Route::get('/', $controller_path . '\pages\HomePage@index')->name('pages-home');
    Route::get('/page-2', $controller_path . '\pages\Page2@index')->name('pages-page-2');
    

    Route::get('/users/index', [App\Http\Controllers\UserController::class,'index']);

Route::resource('users',UserController::class);

//Route::get('/asistencia/index', [App\Http\Controllers\AsistenciaController::class,'create'])->name('asistencia.create');

Route::get('/solicitud/index', [App\Http\Controllers\SolicitudController::class,'index'])->name('solcitud-index');
Route::resource('solicitud',SolicitudController::class);

Route::get('/bajas/index', [App\Http\Controllers\BajasController::class,'index'])->name('bajas-index');
Route::resource('bajas',BajasController::class);

Route::get('/omisiones/index', [App\Http\Controllers\OmisionesController::class,'index'])->name('omisiones-index');
Route::get('/omisiones/show', [App\Http\Controllers\OmisionesController::class,'show'])->name('omisiones-show');

Route::resource('omisiones',OmisionesController::class);
});


