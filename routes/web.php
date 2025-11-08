<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::middleware(['auth', 'verified'])->group(function () {

        Route::get('/home', [FilmController::class, 'index'])->name('film.index');

        Route::get('/home/create', [FilmController::class, 'create'])->name('film.create');
        Route::post('/home/create', [FilmController::class, 'store'])->name('film.store');

        Route::get('/home/{film}', [FilmController::class, 'show'])->name('film.show');
    });

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
