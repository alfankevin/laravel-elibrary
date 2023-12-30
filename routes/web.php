<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::get('/', function () {
    return view('main.main');
})->name('main');

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
});