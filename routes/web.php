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
Route::get('/home', 'HomeController@index')
    ->name('home');

Route::get('/home/news', 'HomeController@getAllNews')
    ->name('home.news');

Route::get('/categories', function () {
    return view('category.categories');
})->name('categories.show');

Route::get('/category/{category}', 'CategoryController@get')
    ->name('categories.get');

Route::post('/categories', 'CategoryController@save')
    ->name('categories.save');

Route::get('/tags', function () {
    return view('tag.tags');
})->name('tags.show');

Route::post('/tags', 'TagController@save')
    ->name('tags.save');

Route::get('/', function () {
    return view('news.news');
})->name('news.show');

Route::get('/news', 'NewsController@getJson')
    ->name('news.json');

Route::get('/news/{news_id}', 'NewsController@get')
    ->name('news.get');

Route::post('/news', 'NewsController@save')
    ->name('news.save');
