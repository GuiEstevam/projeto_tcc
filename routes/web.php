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
use App\Http\Controllers\TagController;
use App\Http\Controllers\CampusController;

// Projetos
Route::get('/', [ProjetoController::class, 'index']);
Route::get('/projetos/create', [ProjetoController::class, 'create'])->middleware('auth');
Route::get('/projetos/{id}', [ProjetoController::class, 'show']);
Route::post('/projetos', [ProjetoController::class, 'store'])->middleware('auth');
Route::get('/projetos/edit/{id}', [ProjetoController::class, 'edit'])->middleware('auth');
Route::put('/projetos/update/{id}', [ProjetoController::class, 'update'])->middleware('auth');
Route::delete('/projetos/{id}', [ProjetoController::class, 'destroy'])->middleware('auth');
Route::get('/dashboard', [ProjetoController::class, 'dashboard'])->middleware('auth');
Route::get('/projetos/join/{id}', [ProjetoController::class, 'joinProject'])->middleware('auth');
Route::delete('/projetos/leave/{id}', [ProjetoController::class, 'leaveProject'])->middleware('auth');
Route::get('/projetos/participantes/{id}', [ProjetoController::class, 'participantes'])->middleware('auth');
Route::get('/projetos/participantes/aceitar/{id}', [ProjetoController::class, 'aceitar'])->middleware('auth');
Route::get('/projetos/participantes/recusar/{id}', [ProjetoController::class, 'recusar'])->middleware('auth');

// Tags
Route::get('/tags/create', [TagController::class, 'create'])->middleware('auth');
Route::get('/tags/listagem', [TagController::class, 'listagem']);
Route::post('/tags', [TagController::class, 'store'])->middleware('auth');
Route::delete('/tags/{id}', [TagController::class, 'destroy'])->middleware('auth');

// Campus
Route::get('/campus/listagem', [CampusController::class, 'listagem'])->middleware('auth');
Route::get('/campus/create', [CampusController::class, 'create'])->middleware('auth');
Route::post('/campus', [CampusController::class, 'store'])->middleware('auth');
Route::delete('/campus/{id}', [CampusController::class, 'destroy'])->middleware('auth');

//Profile 

Route::get('/profile/main-profile',[ProfileController::class,'index'])->middleware('auth');
