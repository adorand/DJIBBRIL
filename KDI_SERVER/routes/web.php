<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('users', 'UsersController');
Route::get('/produit', 'ProductController@index');
Route::get('/categorie', 'ProductController@categorie');
Route::get('/categories', 'ProductController@categories');
Route::post('/produit', 'ProductController@product');
Route::get('/produits', 'ProductController@products');
Route::get('/commande', 'CommandeController@index');
Route::post('/add-product-cmd/{code}', 'CommandeController@save');
Route::get('/ext/add-user/{user}', 'UserController@register');
