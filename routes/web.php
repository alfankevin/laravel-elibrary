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
Route::get('/book/{id}', [MainController::class, 'book'])->name('book.page');
Route::get('/booklist', [MainController::class, 'booklist'])->name('booklist');
Route::get('/booklist/{category}', [MainController::class, 'filter'])->name('book.filter');

Route::middleware(['auth'])->group(function(){
    Route::get('/book/{id}/file', [MainController::class, 'read'])->name('book.read');
    Route::get('/wishlist', [MainController::class, 'wishlist'])->name('wishlist');
    Route::get('/wish/{id}/create', [MainController::class, 'wish'])->name('book.wish');
    Route::get('/wish/{id}/delete', [MainController::class, 'remove'])->name('delete.wish');
    Route::get('/readlist', [MainController::class, 'readlist'])->name('readlist');
    Route::get('/read/{id}/delete', [MainController::class, 'return'])->name('delete.read');
    Route::get('/mybook', [MainController::class, 'mybook'])->name('mybook');
    Route::get('/upload/book', [MainController::class, 'create'])->name('mine-upload');
    Route::get('/update/book/{id}', [MainController::class, 'edit'])->name('mine-edit');
    Route::put('/update/{id}', [MainController::class, 'update'])->name('mine-update');
    Route::delete('/delete/{id}', [MainController::class, 'destroy'])->name('mine-delete');
});

Route::middleware(['auth', 'admin'])->group(function(){
    Route::prefix('admin')->group(function () {
        Route::resource('dashboard', DashboardController::class);
        Route::resource('book', BookController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('management', ManagementController::class);
        Route::post('/book/edit', [BookController::class, 'update'])->name('book-edit');
        Route::post('/category/edit', [CategoryController::class, 'update'])->name('category-edit');
        Route::get('/book-export', [ManagementController::class, 'export'])->name('book.export');
        Route::patch('/feat/{id}', [ManagementController::class, 'featured'])->name('book.feat');
        Route::patch('/hero/{id}', [ManagementController::class, 'billboard'])->name('book.hero');
    });
});