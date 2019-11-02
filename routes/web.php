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


/*Route::get('users/{id}',function($id) {
   echo 'User ID: '.$id;
});
Route::get('user2/{name?}', function ($name = 'TutorialsPoint') { 
	return $name;
});
Route::get('user/{id}', 'UserController@show');
*/
Route::get('user/photo', 'UserController@photo');
Route::resource('user', 'UserController');
Route::get('products/{id}/photo', 'ProductController@photo');

Route::get('/petpage', 'PetsController@petpage');

Route::get('/cart', 'PetsController@cart');

Route::get('/', 'PetsController@home');

Route::resource('products','ProductController');

Route::resource('pets','PetsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
