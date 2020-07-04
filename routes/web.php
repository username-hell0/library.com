<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);

Route::get('/verify/{token}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('/resend/mail', 'Auth\VerificationController@show')->name('resend.mail');
Route::post('/resend/mail', 'Auth\VerificationController@resendShow')->name('resend.mail');

Route::get('/home', 'HomeController@index')->name('home');
