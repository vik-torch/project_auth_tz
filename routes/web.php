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

Route::get('/register', 'RegisterController')->name('register');
Route::get('/login', 'MainController')->name('login');

Route::post('/user/find', "UserController@find")->name('user.auth');
Route::post('/user/store', "UserController@store")->name('user.store');
Route::post('/user/isfind', "UserController@isAuth")->name('user.is_auth');
Route::get('/user/logout', "UserController@logout")->name('logout');

Route::get('/user', 'UserPageController')->name('user.page');

//Route::get('/user', "UserController@find");
