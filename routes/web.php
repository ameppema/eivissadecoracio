<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('historia', function () {
    return view('historia');
});

Route::get('obras', function () {
    return view('obras');
});

Route::get('interiores', function () {
    return view('interiores');
});

Route::get('cocinas', function () {
    return view('cocinas');
});

Route::get('rehabilitaciones', function () {
    return view('rehabilitaciones');
});

Route::get('parquets', function () {
    return view('parquets');
});

// Route::get('contact', [ContactController::class, 'index'])->name('contact.index');

Route::post('contact', [ContactController::class, 'send'])->name('contact.send');
