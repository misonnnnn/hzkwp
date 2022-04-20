<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendEmailController;



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

Route::get('/emailtemplate', function () {
    return view('email.demoEmail');
});



Auth::routes();

 Route::get('',[App\Http\Controllers\HomeController::class, 'index']);
 Route::get('/signup',[App\Http\Controllers\HomeController::class, 'index']);
Route::get('/emailVerifyNotice', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('send-email', [SendEmailController::class, 'index']);
Route::get('verify/{emailToken}', [App\Http\Controllers\HomeController::class, 'emailVerification']);



Route::group(['middleware' => 'isAdmin'], function () {
    Route::get('/admin',[App\Http\Controllers\AdminController::class, 'index']);
    Route::post('/approveAccount',[App\Http\Controllers\AdminController::class, 'approveAccount']);
});


Route::group(['middleware' => 'isUsers'], function () {
    Route::get('/home',[App\Http\Controllers\UsersController::class, 'index']);
    Route::get('/clients',[App\Http\Controllers\UsersController::class, 'index']);
    Route::get('/expenses',[App\Http\Controllers\UsersController::class, 'index']);
    Route::get('/file-dialog',[App\Http\Controllers\UsersController::class, 'index']);
    Route::get('/settings',[App\Http\Controllers\UsersController::class, 'index']);
    Route::get('/allclients',[App\Http\Controllers\UsersController::class, 'index']);
    Route::get('/accountants',[App\Http\Controllers\UsersController::class, 'index']);
    Route::get('/files',[App\Http\Controllers\UsersController::class, 'index']);
    Route::get('/files/cor',[App\Http\Controllers\UsersController::class, 'index']);
    Route::get('/files/serviceagreement',[App\Http\Controllers\UsersController::class, 'index']);
    Route::get('/searchCor',[App\Http\Controllers\UsersController::class, 'searchCor']);
    Route::get('/clients/{clientsId}',[App\Http\Controllers\UsersController::class, 'getClientsPage']);
    Route::post('/addClient',[App\Http\Controllers\UsersController::class, 'addClient']);
    Route::post('/addExpenses',[App\Http\Controllers\UsersController::class, 'addExpenses']);
    Route::get('/profile',[App\Http\Controllers\UsersController::class, 'profile']);
    Route::get('/countClientTable',[App\Http\Controllers\UsersController::class, 'countClientTable']);
    Route::post('/deleteClient',[App\Http\Controllers\UsersController::class, 'deleteClient']);
    Route::post('/editClient',[App\Http\Controllers\UsersController::class, 'editClient']);
    Route::get('/loadNotifications',[App\Http\Controllers\UsersController::class, 'loadNotifications']);
    Route::get('/accountants/{accountantId}',[App\Http\Controllers\UsersController::class, 'getAccountantsInfo']);
    Route::post('/saUpload',[App\Http\Controllers\UsersController::class, 'saUpload']);
    Route::post('/corUpload',[App\Http\Controllers\UsersController::class, 'corUpload']);
    Route::get('/files/serviceagreement/{clientId}',[App\Http\Controllers\UsersController::class, 'getClientSa']);

});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

