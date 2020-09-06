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
Route::get('', 'AdvertController@all')->name('index');
Route::get('my/adverts', 'AdvertController@my')->name('my.adverts');
Route::get('add/adverts', 'AdvertController@add')->name('add.advert');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
