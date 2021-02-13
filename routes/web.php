<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\UserRolesController;
use App\Http\Controllers\UsersController;
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
    return redirect()->route('resources.index');
})->name('home');

Route::resource('users', UsersController::class);

Route::post('/roles/{user}', [UserRolesController::class, 'update'])->name('user-roles.update');

Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');

Route::get('/about', [StaticPageController::class, 'aboutUs'])->name('about');

Route::get('/user-agreement', [StaticPageController::class, 'userAgreement'])->name('user-agreement');
