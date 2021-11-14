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

Route::prefix('core')->group(function () {
    Route::get('/resources/random', 'RandomResourceController@getAny')->name('resources.random');

    Route::get('/videos/random', 'RandomResourceController@getAnyVideo')->name('videos.random');

    Route::resource('resources', 'ResourceController');

    Route::get('/resources/{resource}/download', 'ResourceController@download')->name('resources.download');

    Route::get('/resources/{resource}/open', 'ResourceController@open')->name('resources.open');

    Route::get('/search/{query}', 'SearchController@index')->name('search');

    Route::get('/grade/resources', 'GradeResourceController@index')->name('grade-resources.index');
    Route::get('/grade/{grade}/resources', 'GradeResourceController@show')->name('grade-resources.show');

    Route::get('/category/resources', 'CategoryResourceController@index')->name('category-resources.index');
    Route::get('/category/{category}/resources', 'CategoryResourceController@show')->name('category-resources.show');

    Route::get('/theme/resources', 'ThemeResourceController@index')->name('theme-resources.index');
    Route::get('/theme/{theme}/resources', 'ThemeResourceController@show')->name('theme-resources.show');

    Route::get('/my/resources', 'MyResourceController@index')->name('my-resources');

    Route::get('/filtered/resources', 'FilteredResourceController@index')->name('filtered-resources.index');

    Route::resource('favourite', 'FavouriteResourceController')->only([
        'index', 'store', 'destroy'
    ]);
});
