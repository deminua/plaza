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


Route::get('/', function () {
    return view('layouts.disable');
});

Route::get('index', 'HomeController@index')->name('index');


Auth::routes();

Route::prefix('admin')->group(function () {

	Route::get('/', 'AdminController@index_post')->name('admin.index.post');
	Route::get('post', 'AdminController@create_post')->name('admin.create.post');
	Route::get('post/edit', 'AdminController@edit_post')->name('admin.edit.post');
	Route::get('post/delete', 'AdminController@delete_post')->name('admin.delete.post');
	Route::post('post', 'AdminController@store_post')->name('admin.store.post');


	Route::get('store/all', 'AdminController@index_store')->name('admin.index.store');
	Route::get('store', 'AdminController@create_store')->name('admin.create.store');
	Route::get('store/edit', 'AdminController@edit_store')->name('admin.edit.store');
	Route::get('store/delete', 'AdminController@delete_store')->name('admin.delete.store');
	Route::post('store', 'AdminController@store_store')->name('admin.store.store');

	Route::get('slider', ['uses'=>'SlideController@index_admin','as'=> 'admin.slider.index']);
	Route::get('slider/create', ['uses'=>'SlideController@create_slider','as'=> 'admin.slider.create']);
	Route::post('slider', 'SlideController@store_slider')->name('admin.store.slider');
	Route::get('slider/edit', 'SlideController@edit_slider')->name('admin.edit.slider');

	Route::get('image/{id}/{type}', ['uses'=>'ImageController@update','as'=> 'image.update']);

});