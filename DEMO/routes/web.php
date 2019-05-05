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
Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/','FoodsController@index');
Route::get('/foods/create','FoodsController@create');
Route::post('/foods','FoodsController@store');
Route::get('/foods/{id}','FoodsController@edit');
Route::post('/foods/{id}','FoodsController@update');
Route::delete('/foods/{id}','FoodsController@destroy');

Route::post('/comments', 'CommentsController@store');

Route::post('/bookings', 'BookingsController@store');
Route::delete('/bookings/{id}', 'BookingsController@destroy');

Route::post('/messages', 'MessagesController@store');
Route::post('/messages/{id}', 'MessagesController@update');

Route::post('/seats', 'SeatsController@update');

Route::get('/profile','DashboardController@show');
Route::get('/profile/edit','DashboardController@edit');
Route::post('/profile','DashboardController@update');
Route::delete('/profile','DashboardController@destroy');
Route::post('/like','FoodsController@like')->name('like');