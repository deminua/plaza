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
    return view('welcome');
});

Auth::routes();

#Route::resource('admin', 'AdminController');
#Route::get('admin/create/post', 'AdminController@create_post')->name('admin.create.post');
#Route::get('admin/edit/post/{id}', 'AdminController@create_post')->name('admin.edit.post');

#Route::get('admin/post', 'AdminController@create_post')->name('admin.create.post');
#Route::post('admin/store/post', 'AdminController@store_post')->name('admin.store.post');

Route::prefix('admin')->group(function () {

	Route::get('post', 'AdminController@create_post')->name('admin.create.post');
	Route::get('/', 'AdminController@index_post')->name('admin.index.post');
	Route::get('post/edit', 'AdminController@edit_post')->name('admin.edit.post');
	Route::get('post/delete', 'AdminController@delete_post')->name('admin.delete.post');
	Route::post('post', 'AdminController@store_post')->name('admin.store.post');

	Route::get('image/{id}/{type}', ['uses'=>'ImageController@update','as'=> 'image.update']);

});




#Route::get('/home', 'HomeController@index')->name('home');