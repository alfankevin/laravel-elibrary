<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('admin.auth.login');
})->name('login');

Route::resource('/', MainController::class);
Route::get('/booklist', [MainController::class, 'booklist'])->name('booklist');
Route::get('/book/{id}', [MainController::class, 'page'])->name('book.page');

Route::middleware(['auth'])->group(function(){
    Route::get('/wishlist', [MainController::class, 'wishlist'])->name('wishlist');
    Route::get('/book/{id}/pdf', [MainController::class, 'show'])->name('book.file');
    Route::get('/wish/{id_user}/{id_book}', [MainController::class, 'wish'])->name('book.wish');
});

Route::middleware(['auth', 'admin'])->group(function(){
    Route::prefix('admin')->group(function () {
        Route::resource('dashboard', DashboardController::class);
        Route::resource('book', BookController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('management', ManagementController::class);
        Route::post('/book/edit', [BookController::class, 'update'])->name('book.edit');
        Route::post('/category/edit', [CategoryController::class, 'update'])->name('category.edit');
        Route::get('/book-export', [ManagementController::class, 'export'])->name('book.export');
        Route::patch('/feat/{id}', [ManagementController::class, 'featured'])->name('book.feat');
        Route::patch('/hero/{id}', [ManagementController::class, 'billboard'])->name('book.hero');
    });
});