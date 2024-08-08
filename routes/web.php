<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtraccionController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\EspecieController;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';


Route::get('/especies', [EspecieController::class, 'index'])->name('especie.index');


// Rutas para Atracciones
/*Route::get('atracciones', AtraccionController::class);

// Rutas para Comentarios
Route::get('comentarios', ComentarioController::class);

// Rutas para Especies
Route::get('especies', EspecieController::class);

// Rutas adicionales si son necesarias
Route::get('atracciones/{atraccion}/comentarios', [AtraccionController::class, 'comentarios'])->name('atracciones.comentarios');
Route::get('especies/{especie}/atracciones', [EspecieController::class, 'atracciones'])->name('especies.atracciones');

*/
