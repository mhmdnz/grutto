<?php

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

Route::get('/categories', function () {
    return view('categories');
})->name('categories.show');

Route::post('/categories', 'CategoryController@save')->name('categories.save');

Route::get('/tags', function () {
    return view('tags');
})->name('tags.show');

Route::post('/tags', 'TagController@save')->name('tags.save');

Route::get('/', function () {
    return view('news');
})->name('news.show');

Route::get('/news', 'NewsController@getJson')->name('news.json');

Route::post('/news', 'NewsController@save')->name('news.save');
