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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'isAdmin'], function () {
    Route::get('/admin',[App\Http\Controllers\AdminController::class, 'index']);
});


Route::group(['middleware' => 'isUsers'], function () {
    Route::get('/home',[App\Http\Controllers\UsersController::class, 'index']);
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
