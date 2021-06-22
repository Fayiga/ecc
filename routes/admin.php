<?php

use Illuminate\Support\Facades\Route;
Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware'=>['auth:admin']], function(){
	    Route::get('/', function () {
	        return view('admin.dashboard.index');
	    })->name('admin.dashboard');
        Route::get('/settings', 'SettingController@index')->name('admin.settings');
        Route::post('/settings', 'SettingController@update')->name('admin.settings.update');
	});

});

Route::group(['prefix' => 'categories'], function(){

    Route::get('/', 'CategoryController@index')->name('admin.categories.index');
    Route::get('/create', 'CategoryController@create')->name('admin.categories.create');
    Route::post('/store', 'CategoryController@store')->name('admin.categories.store');
    Route::get('/{id}/edit', 'CategoryController@edit')->name('admin.categories.edit');
    Route::post('/update', 'CategoryController@update')->name('admin.categories.update');
    Route::get('/{id}/delete', 'CategoryController@delete')->name('admin.categories.delete');

});