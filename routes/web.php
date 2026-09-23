<?php

use App\Http\Controllers\NombreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NombreController::class, 'index'])->name('home');

Route::get('/nombres', [NombreController::class, 'index'])->name('nombres.index');
Route::get('/nombres/create', [NombreController::class, 'create'])->name('nombres.create');
Route::post('/nombres', [NombreController::class, 'store'])->name('nombres.store');
Route::get('/nombres/{nombre}', [NombreController::class, 'show'])->name('nombres.show');
Route::get('/nombres/{nombre}/edit', [NombreController::class, 'edit'])->name('nombres.edit');
Route::put('/nombres/{nombre}', [NombreController::class, 'update'])->name('nombres.update');
Route::delete('/nombres/{nombre}', [NombreController::class, 'destroy'])->name('nombres.destroy');
