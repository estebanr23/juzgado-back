<?php

use App\Http\Controllers\PaisController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('paises', [PaisController::class, 'index'])->name('api.v1.paises.index');
Route::get('paises/{pais}', [PaisController::class, 'show'])->name('api.v1.paises.show');
Route::post('paises', [PaisController::class, 'store'])->name('api.v1.paises.store');
Route::put('paises/{pais}', [PaisController::class, 'update'])->name('api.v1.paises.update');
