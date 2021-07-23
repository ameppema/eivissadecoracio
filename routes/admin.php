<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Admin\PartnersController;

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
Route::get('/gallery/{image}', [ImagesController::class, 'editByAjax'])->name('admin.gallery.image.edit');
Route::put('/gallery/{id}', [ImagesController::class, 'update'])->name('admin.gallery.image.update');
Route::delete('/gallery/{id}', [ImagesController::class, 'destroy'])->name('admin.gallery.image.destroy');

// Partners
Route::get('/module/partners', [PartnersController::class, 'index'])->name('admin.module.partners');
// Route::get('/module/partners/image/{id}', [PartnersController::class, 'showImageData'])->name('admin.module.partners.show');
// Route::post('/module/partners', [PartnersController::class, 'storeImage'])->name('admin.module.partners.store');
Route::put('/module/partners/order', [PartnersController::class, 'editOrderByAjax'])->name('admin.module.partners.order');
Route::put('/module/partners/{id?}', [PartnersController::class, 'update'])->name('admin.module.partners.update');
// Route::delete('/module/partners', [PartnersController::class, 'destroy'])->name('admin.module.partners.destroy');

// Pages/modules routes
Route::get('/module', function(){ return redirect()->route('admin.home');})->name('admin.module.index');
Route::get('/module/{name}/{id}', [ModuleController::class, 'index'])->name('admin.module');
Route::post('/module/{name}', [ModuleController::class, 'store'])->name('admin.module.store');
Route::put('/module/{name}/{id}', [ModuleController::class, 'update'])->name('admin.module.update');
