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

Route::get('/', [App\Http\Controllers\EventoController::class, 'index'])->name('index');
//Crud
Route::post('/Create',[App\Http\Controllers\EventoController::class, 'create'])->name('Evento.crear');
Route::Delete('/eliminar/{id}',[App\Http\Controllers\EventoController::class, 'destroy'])->name('Evento.eliminar');
Route::get('/Actualizar/3d123drdsad43{id}das34324fdfs',[App\Http\Controllers\EventoController::class, 'edit'])->name('Evento.Actualizar');
Route::put('/Actualizar/3d123drdsad43{id}das34324fdfs',[App\Http\Controllers\EventoController::class, 'update'])->name('Evento.ActualizarF');
Route::get('/Demo/3d123drdsad43{id}das34324fdfs', [App\Http\Controllers\EventoController::class, 'VerDemo'])->name('Evento.Demo');




Auth::routes();

