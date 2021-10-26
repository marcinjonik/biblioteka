<?php

use App\Http\Controllers\LibraryController;
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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/home_admin', [App\Http\Controllers\HomeController::class, 'home_admin'])->name('home_admin');
});
Route::get('/admin/panel', [App\Http\Controllers\HomeController::class, 'admin_panel'])->name('admin.panel');
Route::get('/admin/panel/books', [App\Http\Controllers\HomeController::class, 'admin_books'])->name('admin.books');

Route::get('/user/panel', [App\Http\Controllers\HomeController::class, 'user_panel'])->name('user.panel');
