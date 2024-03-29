<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Admin\PartnersController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesController;

Route::get('/home', [HomeController::class, 'index'])->name('admin.home');

/* Slider routes */
Route::get('/slide', [SlideController::class, 'index'])->name('admin.slide');
Route::post('/slide', [SlideController::class, 'store'])->name('admin.slide.store')->middleware('can:create');
Route::get('/slide/{id}/edit', [SlideController::class, 'edit'])->name('admin.slide.edit');
Route::put('/slide/{slide}', [SlideController::class, 'update'])->name('admin.slide.update')->middleware('can:update');
Route::delete('/slide/{id}', [SlideController::class, 'destroy'])->name('admin.slide.destroy')->middleware('can:delete');

/* Menu routes */
Route::get('/category_menu', [MenuController::class, 'index'])->name('admin.menu');
Route::post('/category_menu', [MenuController::class, 'store'])->name('admin.menu.store')->middleware('can:create');
Route::put('/category_menu/sort', [MenuController::class, 'sortMenu'])->name('admin.menu.sort');
Route::get('/category_menu/getDataByAjax/{id}', [MenuController::class, 'getDataByAjax'])->name('admin.menu.ajax');
Route::put('/category_menu/edit/{id}', [MenuController::class, 'update'])->name('admin.menu.update')->middleware('can:update');
Route::delete('/category_menu/delete/{id}', [MenuController::class, 'destroy'])->name('admin.menu.destroy')->middleware('can:delete');

//Gallery routes
Route::post('/gallery', [ImagesController::class, 'store'])->name('admin.gallery.image.store');
Route::get('/gallery/{image}', [ImagesController::class, 'editByAjax'])->name('admin.gallery.image.edit');
Route::put('/gallery/{id}', [ImagesController::class, 'update'])->name('admin.gallery.image.update')->middleware('can:update');
Route::delete('/gallery/{id}', [ImagesController::class, 'destroy'])->name('admin.gallery.image.destroy')->middleware('can:delete');

// Partners
Route::get('/module/partners', [PartnersController::class, 'index'])->name('admin.module.partners');
Route::put('/module/partners/order', [PartnersController::class, 'editOrderByAjax'])->name('admin.module.partners.order');
Route::put('/module/partners/{id}', [PartnersController::class, 'update'])->name('admin.module.partners.update')->middleware('can:update');

// Pages/modules routes
Route::get('/module', function(){ return redirect()->route('admin.home');})->name('admin.module.index');
Route::get('/module/{name}/{id}', [PagesController::class, 'index'])->name('admin.module');
Route::post('/module/{name}', [PagesController::class, 'store'])->name('admin.module.store');
Route::put('/module/{name}/{id}', [PagesController::class, 'update'])->name('admin.module.update');

// Users
Route::get('/users', [UsersController::class, 'index'])->name('admin.users');
Route::post('/users', [UsersController::class, 'store'])->name('admin.users.create');
Route::get('/users-roles/{user}', [UsersController::class, 'userRole'])->name('admin.users.roles');
Route::put('/user/{id}', [UsersController::class, 'update'])->name('admin.users.update')->middleware('can:update');
Route::delete('/user/{id}', [UsersController::class, 'destroy'])->name('admin.users.destroy')->middleware('can:delete');

// Roles & Permissions
Route::get('/permissions', [PermissionsController::class, 'index'])->name('admin.permissions');
Route::put('/permissions/update', [PermissionsController::class, 'updateByAjax'])->name('admin.permissions.update');

Route::get('/roles', [RolesController::class, 'index'])->name('admin.roles');
Route::put('/roles/update', [RolesController::class, 'updateByAjax'])->name('admin.roles.update');

Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile');
Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('admin.profile.update');

//Production Commands
Route::get('/laravel/generate-storage-link',function(){
    Artisan::call('storage:link');
    return redirect()->route('admin.home')->with(['message'=>'Storage Enlazado!','alertStatus'=>'success']);
});
Route::get('/laravel/cache-clear-all',function(){
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    return redirect()->route('admin.home')->with(['message'=>'Datos en Cache Limpiados!','alertStatus'=>'success']);
});