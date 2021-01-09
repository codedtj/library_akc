<?php

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

use Illuminate\Support\Facades\Route;

Route::prefix('library')->group(function () {
    Route::resource('resources', 'ResourceController');

    Route::get('/search/{query}', 'SearchController@index')->name('search');

    Route::get('/class/resources', 'ClassResourceController@index')->name('class-resources.index');
    Route::get('/class/{class}/resources', 'ClassResourceController@show')->name('class-resources.show');

    Route::get('/category/resources', 'CategoryResourceController@index')->name('category-resources.index');
    Route::get('/category/{category}/resources', 'CategoryResourceController@show')->name('category-resources.show');

});
