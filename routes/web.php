<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SerieController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/series/{slug}', [SerieController::class, 'index'])->name('serie.index');

require __DIR__.'/admin.php';
require __DIR__.'/auth.php';


// cache clear
Route::get('/cache-clear', function () {
    try {
        Artisan::call('optimize:clear');
        return response()->json(['success' => true]);
    } catch (\Throwable $th) {
        return response()->json(['success' => false]);
    }
})->name('cache.clear');

