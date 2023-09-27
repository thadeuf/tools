<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormMedoController;
use App\Http\Controllers\PensamentosController;
use App\Http\Controllers\EvidenciasController;
use App\Http\Controllers\InflexivelController;
use App\Http\Controllers\ProblemasController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/formmedo', [FormMedoController::class, 'index']);
Route::post('/formmedo/save', [FormMedoController::class, 'save'])->name('formmedo.save');
Route::get('/results', [FormMedoController::class, 'showResults'])->name('results');

Route::get('/pensamentos', [PensamentosController::class, 'index']);
Route::post('/pensamentos/save', [PensamentosController::class, 'save'])->name('pensamentos.save');
Route::get('/presults', [PensamentosController::class, 'showResults'])->name('presults');

Route::get('/evidencias', [EvidenciasController::class, 'index']);
Route::post('/evidencias/save', [EvidenciasController::class, 'save'])->name('evidencias.save');
Route::get('/eresults', [EvidenciasController::class, 'showResults'])->name('eresults');

Route::get('/inflexivel', [InflexivelController::class, 'index']);
Route::post('/inflexivel/save', [InflexivelController::class, 'save'])->name('inflexivel.save');
Route::get('/iresults', [InflexivelController::class, 'showResults'])->name('iresults');

Route::get('/problemas', [ProblemasController::class, 'index']);
Route::post('/problemas/save', [ProblemasController::class, 'save'])->name('problemas.save');
Route::get('/proresults', [ProblemasController::class, 'showResults'])->name('proresults');