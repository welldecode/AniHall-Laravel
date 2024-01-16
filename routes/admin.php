<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ImporterController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\SeriesController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::prefix('admin')->name('dashboard.')->middleware('auth')->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('index');

        Route::prefix('posts')->name('posts.')->group(function () {
            Route::get('/', [PostsController::class, 'index'])->name('show');
        });

        Route::prefix('series')->name('serie.')->group(function () {
            Route::get('/', [SeriesController::class, 'index'])->name('show');
            Route::get('/add-or-update/{id?}', [SeriesController::class, 'edit'])->name('edit');
        });

        Route::prefix('importer')->name('importer.')->group(function () {
            Route::get('/', [ImporterController::class, 'show'])->name('show');
            Route::post('/', [ImporterController::class, 'store'])->name('store');
        });
    });
});
