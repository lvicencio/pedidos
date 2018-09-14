<?php

Route::get('/', 'IndexController@welcome');

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/products','ProductController@index');
Route::get('/admin/products/create','ProductController@create');
Route::post('/admin/products','ProductController@store');