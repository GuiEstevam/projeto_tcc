<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can Projeto web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\ProjetoController;

Route::get('/', [ProjetoController::class, 'index']);
Route::get('/projetos/create', [ProjetoController::class, 'create'])->middleware('auth');
Route::get('/projetos/{id}', [ProjetoController::class, 'show'])->middleware('auth');
Route::post('/projetos', [ProjetoController::class, 'store'])->middleware('auth');
Route::get('/projetos/edit/{id}',[ProjetoController::class, 'edit'])->middleware('auth');
Route::put('/projetos/update/{id}', [ProjetoController::class, 'update'])->middleware('auth');
Route::delete('/projetos/{id}', [ProjetoController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard', [ProjetoController::class,'dashboard'])->middleware('auth');

Route::get('/projetos/join/{id}', [ProjetoController::class,'joinProject'])->middleware('auth');

Route::delete('/projetos/leave/{id}', [ProjetoController::class,'leaveProject'])->middleware('auth');

Route::get('/projetos/participantes/{id}',[ProjetoController::class,'participantes'])->middleware('auth');

Route::get('/projetos/participantes/aceitar/{id}',[ProjetoController::class,'aceitar'])->middleware('auth');

Route::get('/projetos/participantes/recusar/{id}',[ProjetoController::class,'recusar'])->middleware('auth');