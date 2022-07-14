<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\VacanteController;
use App\Models\Candidato;
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
})->name('home');

Route::get('/dashboard', [VacanteController::class,'index'])->middleware(['auth','verified','rol.reclutador'])->name('vacantes.index');
Route::get('/vacantes/create', [VacanteController::class,'create'])->middleware(['auth','verified'])->name('vacantes.create');
Route::get('/vacantes/{vacante}/edit', [VacanteController::class,'edit'])->middleware(['auth','verified'])->name('vacantes.edit');
Route::get('/vacantes/{vacante}', [VacanteController::class,'show'])->name('vacantes.show');

// notificaciones

Route::get('/notificaciones', NotificacionController::class)->middleware(['auth','verified','rol.reclutador'])->name('notificaciones');

Route::get('/candidatos/{vacante}',[CandidatoController::class,'index'])->name('candidatos.index');

require __DIR__.'/auth.php';
