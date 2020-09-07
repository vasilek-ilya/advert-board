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
Route::get('my/adverts', 'AdvertController@my')->name('my.adverts')->middleware('auth');
Route::get('close/advert/{id}', 'AdvertController@close')->name('close.advert');

Route::get('add/advert', 'AdvertController@showAddForm')->name('show.add.form.advert');
Route::post('add/advert', 'AdvertController@add')->name('add.advert');

Route::get('edit/advert/{id}', 'AdvertController@showEditForm')->name('show.edit.form.advert');
Route::post('edit/advert', 'AdvertController@edit')->name('edit.advert');

Route::get('advert/{id}', 'AdvertController@show')->name('show.advert');

Route::post('user/save', 'HomeController@save')->name('user.save');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
