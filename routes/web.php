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

Route::resource('/user', 'UserController');

Auth::routes();
Route::get('/', ['as' => 'home', 'uses' => 'PageController@index']);
Route::get(trans('routes.about'), ['as' => 'about', 'uses' => 'PageController@getAboutPage']);
Route::get('lang/{language}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);
Route::get(trans('routes.login'), ['as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::get(trans('routes.register'), ['as' => 'register', 'uses' => 'Auth\RegisterController@getRegister']);


Route::get('/home', 'HomeController@index')->name('home');
