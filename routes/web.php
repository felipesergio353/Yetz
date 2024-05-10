<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\PlayerController;

Route::get('/players', [PlayerController::class, 'index'])->name('players.index');
Route::post('/players', [PlayerController::class, 'store'])->name('players.store');
Route::get('/players/create', [PlayerController::class, 'create'])->name('players.create');
Route::get('/sorteio', 'App\Http\Controllers\SorteioController@index')->name('sorteio.index');
Route::post('/sorteio', 'App\Http\Controllers\SorteioController@sortear')->name('sorteio.sortear');
Route::put('/players/{id}/confirmar-presenca', [PlayerController::class, 'confirmarPresenca'])->name('players.confirmar-presenca');



