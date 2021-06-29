<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SlideController;

Route::get('/', [HomeController::class, 'index'])->name('admin.home');

Route::get('/slide', [SlideController::class, 'index'])->name('admin.slide');

Route::post('/slide', [SlideController::class, 'store'])->name('admin.slide.store');

Route::get('/slide/{slide}/edit', [SlideController::class, 'edit'])->name('admin.slide.edit');

Route::put('/slide/{slide}', [SlideController::class, 'update'])->name('admin.slide.update');