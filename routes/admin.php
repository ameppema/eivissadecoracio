<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ImagesController;

Route::get('/', [HomeController::class, 'index'])->name('admin.home');

/* Slider routes */
Route::get('/slide', [SlideController::class, 'index'])->name('admin.slide');
Route::post('/slide', [SlideController::class, 'store'])->name('admin.slide.store');
Route::get('/slide/{slide}/edit', [SlideController::class, 'edit'])->name('admin.slide.edit');
Route::put('/slide/{slide}', [SlideController::class, 'update'])->name('admin.slide.update');
Route::delete('/slide/{id}', [SlideController::class, 'destroy'])->name('admin.slide.destroy');

/* Menu routes */
Route::get('/category_menu', [MenuController::class, 'index'])->name('admin.menu');
Route::post('/category_menu', [MenuController::class, 'store'])->name('admin.menu.store');
Route::put('/category_menu/sort', [MenuController::class, 'sortMenu'])->name('admin.menu.sort');
Route::put('/category_menu/edit/{id}', [MenuController::class, 'update'])->name('admin.menu.update');
Route::delete('/category_menu/delete/{id}', [MenuController::class, 'destroy'])->name('admin.menu.destroy');

/* Services routes */
Route::get('/services', [ServiceController::class, 'index'])->name('admin.service');
Route::post('/services', [ServiceController::class, 'store'])->name('admin.store');

//Gallery routes
Route::post('/gallery', [ImagesController::class, 'store'])->name('admin.gallery.image.store');

// Pages/modules routes
Route::get('/module', function(){ return redirect()->route('admin.home');})->name('admin.module.index');
Route::get('/module/{name}/{id}', [ModuleController::class, 'index'])->name('admin.module');
Route::post('/module/{name}', [ModuleController::class, 'store'])->name('admin.module.store');
Route::put('/module/{name}/{id}', [ModuleController::class, 'update'])->name('admin.module.update');
