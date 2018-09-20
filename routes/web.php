<?php

Route::get('/', 'IndexController@welcome');

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}','ProductController@show'); //ver producto

Route::post('/carrito', 'CarritoDetalleController@store');


Route::middleware(['auth','admin'])->group(function ()
{
		Route::get('/admin/products','ProductController@index');
		Route::get('/admin/products/create','ProductController@create');
		Route::post('/admin/products','ProductController@store');
		Route::get('/admin/products/{id}/edit','ProductController@edit');
		Route::post('/admin/products/{id}/edit','ProductController@update');
		Route::post('/admin/products/{id}/delete','ProductController@destroy');
		//imagenes
		Route::get('/admin/products/{id}/images','ImageController@index');
		Route::post('/admin/products/{id}/images','ImageController@store');
		Route::delete('/admin/products/{id}/images','ImageController@destroy');
		Route::get('/admin/products/{id}/images/featured/{image}','ImageController@featured');
});




