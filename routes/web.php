<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoryController;
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

Route::resource('/', MainController::class);

Route::get('/booklist', function () {
    return view('main.pages.booklist');
})->name('booklist');

Route::get('/wishlist', function () {
    return view('main.pages.wishlist');
})->name('wishlist');

Route::get('/login', function () {
    return view('admin.auth.login');
})->name('login');

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/admin', function () {
        return view('admin.admin');
    })->name('admin');
    Route::resource('book', BookController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('management', ManagementController::class);
    Route::post('/book/edit', [BookController::class, 'update'])->name('book.edit');
    Route::post('/category/edit', [CategoryController::class, 'update'])->name('category.edit');
});