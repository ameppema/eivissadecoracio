<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ObrasController;
use App\Http\Controllers\InterioresController;
use App\Http\Controllers\CocinasController;
use App\Http\Controllers\HistoriaController;
use App\Http\Controllers\RehabilitacionesController;
use App\Http\Controllers\ParquetsController;
use App\Http\Controllers\LocalizationController;
use App\Http\Middleware\Localization;
use Spatie\Honeypot\ProtectAgainstSpam;

/* Language Implementation */
Auth::routes();
Route::get('lang/{locale}', [LocalizationController::class, 'lang'])->name('lang');

Route::middleware('locale')->group(function(){
    Route::get('/', function(){return redirect()->route('lang',App::getLocale());})->name('index');
    Route::get('/{locale}', [HomeController::class, 'index'])->name('home');
    Route::get('{locale}/historia',[HistoriaController::class, 'index'])->name('historia');
    Route::get('{locale}/obras', [ObrasController::class, 'index'])->name('obras');
    Route::get('{locale}/interiores', [InterioresController::class, 'index'])->name('interiores');
    Route::get('{locale}/cocinas', [CocinasController::class, 'index'])->name('cocinas');
    Route::get('{locale}/rehabilitaciones', [RehabilitacionesController::class, 'index'])->name('rehabilitaciones');
    Route::get('{locale}/parquets', [ParquetsController::class, 'index'])->name('parquets');

});
// Route::post('contact', [ContactController::class, 'send'])->name('contact.send')->withoutMiddleware(Localization::class);

Route::post('contact', [ContactController::class, 'send'])->name('contact.send')->middleware(ProtectAgainstSpam::class)->withoutMiddleware(Localization::class);