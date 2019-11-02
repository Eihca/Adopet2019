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
Route::get('products/{id}/photo', 'ProductController@photo');

Route::resource('/', 'AdopetController');

Route::get('/read', function(){
	$products = DB::select('SELECT * from products WHERE name = ?', ['mount']);
	
	foreach($products as $prod){
		return $products;
	}

});

Route::get('/petpage', 'AdopetController@petpage');
Route::get('/cart', 'AdopetController@cart');

Route::resource('products','ProductController');

Route::resource('pets','PetsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
