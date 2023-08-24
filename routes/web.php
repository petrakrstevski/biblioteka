<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

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
Route::get('/', function() {
    return view('welcome');
});

Route::get('/books', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('user.list');
Route::get('/users/{userId}', [App\Http\Controllers\UsersController::class, 'show'])->name('user.show');


Route::get('/lista-na-avtori', [App\Http\Controllers\AuthorsController::class, 'index'])->name('author.list');
Route::get('/lista-na-knigi', [App\Http\Controllers\BooksController::class, 'index'])->name('book.list');

Route::get('/author/{id}', [App\Http\Controllers\AuthorsController::class, 'show'])->name('author.show');
Route::get('/book/{id}', [App\Http\Controllers\BooksController::class, 'show'])->name('book.show');

Route::get('dashboard', [App\Http\Controllers\CustomAuthController::class, 'dashboard']); 
Route::get('login', [App\Http\Controllers\CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [App\Http\Controllers\CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [App\Http\Controllers\CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [App\Http\Controllers\CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [App\Http\Controllers\CustomAuthController::class, 'signOut'])->name('signout');

Route::get('/profile/2fa', [App\Http\Controllers\ProfileController::class, 'twofa'])->name('profile.twofa');
Route::post('/profile/2fa', [App\Http\Controllers\ProfileController::class, 'twofaEnable'])->name('profile.twofaEnable');

Route::get('/login/otp', 'App\Http\Controllers\OTPController@show')->name('auth.otp');
Route::post('/login/otp', 'App\Http\Controllers\OTPController@check');

Route::get('/rent', [App\Http\Controllers\RentController::class, 'index'])->name('rent.user');
