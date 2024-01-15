<?php

use App\Http\Controllers\booksController;
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
    return view('welcome');
});

Route::resource('books', booksController::class);
Route::resource('books', 'booksController');
Route::get('books/edit/{isbn}', 'booksController@edit')->name('books.edit');
Route::put('books/update/{isbn}', 'booksController@update')->name('books.update');






