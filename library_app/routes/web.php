<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/create', 'HomeController@create')->name('books.create');
Route::post('/home', 'HomeController@store')->name('books.store');
Route::get('/home/{book}/edit', 'HomeController@edit')->name('books.edit');
Route::put('/home/{book}', 'HomeController@update')->name('books.update');

Route::get('/authors', 'AuthorController@authors')->name('authors');
Route::get('/authors/create', 'AuthorController@create')->name('authors.create');
Route::post('/authors','AuthorController@store')->name('authors.store');

Route::get('/authors/{author}/edit','AuthorController@edit')->name('authors.edit');
Route::put('/authors/{author}', 'AuthorController@update')->name('authors.update');

Route::get('/authors/{id}/show', 'AuthorController@show')->name('authors.show');
