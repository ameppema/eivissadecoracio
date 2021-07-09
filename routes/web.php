<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ObrasController;
use App\Http\Controllers\InterioresController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('historia', function () {
    return view('historia');
});

Route::get('obras', [ObrasController::class, 'index'])->name('obras');

Route::get('interiores', [InterioresController::class, 'index'])->name('interiores');

Route::get('cocinas', function () {
    return view('cocinas');
});

Route::get('rehabilitaciones', function () {
    return view('rehabilitaciones');
});

Route::get('parquets', function () {
    return view('parquets');
});

Route::post('contact', [ContactController::class, 'send'])->name('contact.send');

Auth::routes();