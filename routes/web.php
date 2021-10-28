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
    Route::get('/admin/panel', [App\Http\Controllers\HomeController::class, 'admin_panel'])->name('admin.panel');
    Route::get('/admin/panel/books', [App\Http\Controllers\HomeController::class, 'admin_books'])->name('admin.books');
    Route::post('/admin/panel/books/save', [App\Http\Controllers\HomeController::class, 'admin_books_save'])->name('books.add');
    Route::get('/admin/panel/books/edit/{id}', [App\Http\Controllers\HomeController::class, 'admin_books_edit'])->name('books.edit');
    Route::put('/admin/panel/books/update/{id}', [App\Http\Controllers\HomeController::class, 'admin_books_update'])->name('books.update');
    Route::get('/admin/panel/books/delete/{id}', [App\Http\Controllers\HomeController::class, 'admin_books_delete'])->name('books.delete');

    Route::get('/admin/panel/authors', [App\Http\Controllers\HomeController::class, 'admin_authors'])->name('admin.authors');
    Route::post('/admin/panel/authors/save', [App\Http\Controllers\HomeController::class, 'admin_authors_save'])->name('authors.add');
    Route::get('/admin/panel/authors/edit/{id}', [App\Http\Controllers\HomeController::class, 'admin_authors_edit'])->name('authors.edit');
    Route::put('/admin/panel/authors/update/{id}', [App\Http\Controllers\HomeController::class, 'admin_authors_update'])->name('authors.update');
    Route::get('/admin/panel/authors/delete/{id}', [App\Http\Controllers\HomeController::class, 'admin_authors_delete'])->name('authors.delete');

    Route::get('/admin/panel/categories', [App\Http\Controllers\HomeController::class, 'admin_categories'])->name('admin.categories');
    Route::post('/admin/panel/categories/save', [App\Http\Controllers\HomeController::class, 'admin_categories_save'])->name('categories.add');
    Route::get('/admin/panel/categories/edit/{id}', [App\Http\Controllers\HomeController::class, 'admin_categories_edit'])->name('categories.edit');
    Route::put('/admin/panel/categories/update/{id}', [App\Http\Controllers\HomeController::class, 'admin_categories_update'])->name('categories.update');
    Route::get('/admin/panel/categories/delete/{id}', [App\Http\Controllers\HomeController::class, 'admin_categories_delete'])->name('categories.delete');

    Route::get('/admin/panel/borrows', [App\Http\Controllers\HomeController::class, 'admin_borrows'])->name('admin.borrows');
    Route::get('/admin/panel/borrows/edit/{id}', [App\Http\Controllers\HomeController::class, 'admin_borrows_edit'])->name('borrows.edit');
    Route::put('/admin/panel/borrows/update/{id}', [App\Http\Controllers\HomeController::class, 'admin_borrows_update'])->name('borrows.update');

    Route::get('/admin/panel/users', [App\Http\Controllers\HomeController::class, 'admin_users'])->name('admin.users');
    Route::get('/admin/panel/borrows/edit/{id}/{usertype}', [App\Http\Controllers\HomeController::class, 'admin_users_edit'])->name('users.edit');
});


Route::get('/user/panel', [App\Http\Controllers\HomeController::class, 'user_panel'])->name('user.panel');
Route::get('/user/panel/books', [App\Http\Controllers\HomeController::class, 'user_books'])->name('user.books');
Route::get('/user/panel/borrow', [App\Http\Controllers\HomeController::class, 'user_borrow'])->name('user.borrow');
Route::get('/user/panel/borrows/{id}', [App\Http\Controllers\HomeController::class, 'user_borrows'])->name('user.borrows');
Route::get('/user/panel/borrows/edit/{id}', [App\Http\Controllers\HomeController::class, 'user_borrows_edit'])->name('user.borrows.edit');
Route::put('/user/panel/borrows/update/{id}', [App\Http\Controllers\HomeController::class, 'user_borrows_update'])->name('user.borrows.update');
