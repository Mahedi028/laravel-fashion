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


Route::get('/', 'App\Http\Controllers\FormController@index');
Route::get('/Register', 'App\Http\Controllers\FormController@showRegistrationForm')->name('Registration');
Route::post('/Register', 'App\Http\Controllers\FormController@processRegistration')->name('Registration.submit');
Route::get('/login', 'App\Http\Controllers\FormController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\FormController@processLogin');
