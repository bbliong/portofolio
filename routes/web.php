<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get("/work/{slug}", 'HomeController@work')->name('show-work');
Route::get("/blog/{slug}", 'HomeController@blog')->name('show-blog');

Route::group(['middleware' => 'auth'], function (){
	Route::prefix('admin')->group(function () {
		Route::get('/', 'AdminController@index');
		
		Route::get('/work', 'AdminController@work')->name('work');
		Route::get('/create-work', 'AdminController@createWork')->name('create-work');
		Route::post('/create-work', 'AdminController@storeWork')->name('store-work');
		Route::get('/edit-work/{id}', 'AdminController@editWork')->name('edit-work');
		Route::put('/update-work/{id}', 'AdminController@updateWork')->name('update-work');
		Route::delete('/delete-work/{id}', 'AdminController@deleteWork')->name('delete-work');

		Route::get('/blog', 'AdminController@blog')->name('blog');
		Route::get('/create-blog', 'AdminController@createblog')->name('create-blog');
		Route::post('/create-blog', 'AdminController@storeblog')->name('store-blog');
		Route::get('/edit-blog/{id}', 'AdminController@editblog')->name('edit-blog');
		Route::put('/edit-blog/{id}', 'AdminController@updateblog')->name('update-blog');
		Route::delete('/delete-blog/{id}', 'AdminController@deleteblog')->name('delete-blog');


		Route::post('/upload-image', 'AdminController@ImagesStore')->name('image-store');
		Route::delete('/delete-image', 'AdminController@ImagesDelete')->name('image-delete');
		Route::get('/blog', 'AdminController@blog');
	});
});

Auth::routes();
