<?php

use Illuminate\Support\Facades\Route;

// var $queryString = `SELECT P.id, B.title, A.name, S.title 
// from lina_biblioteka.status as S left join 
// lina_biblioteka.product as P on P.status_id = S.id  left join
// lina_biblioteka.book as B on B.id= P.book_id left join 
// lina_biblioteka.author_has_book as AB on B.id= AB.book_id left JOIN 
// lina_biblioteka.author as A on A.id= AB.author_id 
// `
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('user.list');
Route::get('/lista-na-avtori', [App\Http\Controllers\AuthorsController::class, 'index'])->name('author.list');
Route::get('/lista-na-knigi', [App\Http\Controllers\BooksController::class, 'index'])->name('book.list');

Route::get('/author/{id}', [App\Http\Controllers\AuthorsController::class, 'show'])->name('author.show');
Route::get('/book/{id}', [App\Http\Controllers\BooksController::class, 'show'])->name('book.show');

