<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CarPhotoController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ShortCodeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('owners.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('cars', CarController::class);

    Route::get('/owners', [OwnerController::class, 'index'])->name('owners.index');
Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');



    Route::middleware(['role:admin'])->group(function () {
        Route::get('/shortcodes', [ShortcodeController::class, 'index'])->name('shortcodes.index');
       Route::get('/owners/create', [OwnerController::class, 'create'])->name('owners.create');
       Route::post('/owners', [OwnerController::class, 'store'])->name('owners.store');
       Route::get('/owners/{owner}/edit', [OwnerController::class, 'edit'])->name('owners.edit');
       Route::put('/owners/{owner}', [OwnerController::class, 'update'])->name('owners.update');
       Route::delete('/owners/{owner}', [OwnerController::class, 'destroy'])->name('owners.destroy');

       Route::get('/shortcodes/create', [ShortCodeController::class, 'create'])->name('shortcodes.create');
       Route::post('/shortcodes', [ShortCodeController::class, 'store'])->name('shortcodes.store');
       Route::get('/shortcodes/{shortcode}/edit', [ShortCodeController::class, 'edit'])->name('shortcodes.edit');
       Route::put('/shortcodes/{shortcode}', [ShortCodeController::class, 'update'])->name('shortcodes.update');
       Route::delete('/shortcodes/{shortcode}', [ShortCodeController::class, 'destroy'])->name('shortcodes.destroy');
       Route::get('/shortcodes/{shortcode}', [ShortcodeController::class, 'show'])->name('shortcodes.show');
    });
    Route::get('/owners/{owner}', [OwnerController::class, 'show'])->name('owners.show');

    Route::post('/cars/{car}/photos', [CarPhotoController::class, 'store'])->name('car.photos.store');
    Route::delete('/photos/{photo}', [CarPhotoController::class, 'destroy'])->name('car.photos.destroy');

});
