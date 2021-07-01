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
    Route::get('/clients',[App\Http\Controllers\UsersController::class, 'index']);
    Route::get('/clients/{clientsId}',[App\Http\Controllers\UsersController::class, 'getClientsPage']);
    Route::post('/addClient',[App\Http\Controllers\UsersController::class, 'addClient']);
    Route::get('/profile',[App\Http\Controllers\UsersController::class, 'profile']);
    Route::get('/countClientTable',[App\Http\Controllers\UsersController::class, 'countClientTable']);
    Route::post('/deleteClient',[App\Http\Controllers\UsersController::class, 'deleteClient']);
    Route::post('/editClient',[App\Http\Controllers\UsersController::class, 'editClient']);
    Route::get('/loadNotifications',[App\Http\Controllers\UsersController::class, 'loadNotifications']);
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

