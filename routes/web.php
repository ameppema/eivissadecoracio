<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ObrasController;
use App\Http\Controllers\InterioresController;
use App\Http\Controllers\CocinasController;
use App\Http\Controllers\RehabilitacionesController;
use App\Http\Controllers\ParquetsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('historia', function () {
    return view('historia');
});

Route::get('obras', [ObrasController::class, 'index'])->name('obras');

Route::get('interiores', [InterioresController::class, 'index'])->name('interiores');

Route::get('cocinas', [CocinasController::class, 'index'])->name('cocinas');

Route::get('rehabilitaciones', [RehabilitacionesController::class, 'index'])->name('rehabilitaciones');

Route::get('parquets', [ParquetsController::class, 'index'])->name('parquets');

Route::post('contact', [ContactController::class, 'send'])->name('contact.send');

Auth::routes();