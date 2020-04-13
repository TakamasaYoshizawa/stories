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

Route::get('login'); 

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', 'StoriesController@index');
    Route::post('/', 'StoriesController@store');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('stories/create', 'StoriesController@add');
    Route::post('stories/create', 'StoriesController@upload');
    Route::get('/stories/delete', 'StoriesController@delete');
});

Route::get('/profile/delete', 'ProfileController@delete');

Route::group(['middleware' => 'auth','name'=>'profile'], function () {
    Route::get('/profile/edit', 'ProfileController@edit');
    Route::post('/profile/edit', 'ProfileController@update');
    Route::post('/profile/create', 'ProfileController@create');
    Route::get('profile/create3', 'ProfileController@index3');
});

Route::get('/home', 'StoriesController@index')->name('home');

Auth::routes();

