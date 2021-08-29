<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Admin\PartnersController;
use App\Http\Controllers\Admin\UsersController;

Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
Route::get('/', function(){return redirect('es/historia');})->name('admin');

/* Slider routes */
Route::get('/slide', [SlideController::class, 'index'])->name('admin.slide');
Route::post('/slide', [SlideController::class, 'store'])->name('admin.slide.store');
Route::get('/slide/{id}/edit', [SlideController::class, 'edit'])->name('admin.slide.edit');
Route::put('/slide/{slide}', [SlideController::class, 'update'])->name('admin.slide.update');
Route::delete('/slide/{id}', [SlideController::class, 'destroy'])->name('admin.slide.destroy');

/* Menu routes */
Route::get('/category_menu', [MenuController::class, 'index'])->name('admin.menu');
Route::post('/category_menu', [MenuController::class, 'store'])->name('admin.menu.store');
Route::put('/category_menu/sort', [MenuController::class, 'sortMenu'])->name('admin.menu.sort');
Route::get('/category_menu/getDataByAjax/{id}', [MenuController::class, 'getDataByAjax'])->name('admin.menu.ajax');
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
Route::put('/module/partners/order', [PartnersController::class, 'editOrderByAjax'])->name('admin.module.partners.order');
Route::put('/module/partners/{id?}', [PartnersController::class, 'update'])->name('admin.module.partners.update');

// Pages/modules routes
Route::get('/module', function(){ return redirect()->route('admin.home');})->name('admin.module.index');
Route::get('/module/{name}/{id}', [PagesController::class, 'index'])->name('admin.module');
Route::post('/module/{name}', [PagesController::class, 'store'])->name('admin.module.store');
Route::put('/module/{name}/{id}', [PagesController::class, 'update'])->name('admin.module.update');

// Users
Route::get('users', [UsersController::class, 'index'])->name('admin.users');
Route::get('permissions', [UsersController::class, 'permissions'])->name('permissions');
Route::get('roles', [UsersController::class, 'roles'])->name('roles');
Route::get('profile', [UsersController::class, 'show'])->name('profile');

// Generators
Route::get('/generate',['App\Http\Controllers\Admin\GeneratorController', 'CreateTranslation'])->name('generator');
Route::get('/generate-delete',['App\Http\Controllers\Admin\GeneratorController', 'DeleteTranslation'])->name('generator.delete');