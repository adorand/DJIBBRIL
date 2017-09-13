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


/*Home*/
Route::get('/', 'HomeController@index');


Auth::routes();

/*Categories*/
Route::get('/categorie', 'CategorieController@index');
Route::post('/categorie', 'CategorieController@create');
Route::get('/categories', 'CategorieController@fetch');
Route::get('/categorie/{code}', 'CategorieController@get');
Route::put('/categorie/{code}', 'CategorieController@update');
Route::delete('/categorie/{code}', 'CategorieController@delete');

/*Produits*/
Route::get('/produit', 'ProduitController@index');
Route::post('/produit', 'ProduitController@create');
Route::get('/produits', 'ProduitController@fetch');
Route::get('/produit/{code}', 'ProduitController@get');
Route::put('/produit/{code}', 'ProduitController@update');
Route::delete('/produit/{code}', 'ProduitController@delete');

/*Users*/
Route::post('/front/add-user/', 'UserController@create');
Route::get('/front/get-user/{data}', 'UserController@get');
Route::get('/front/update-user/{data}', 'UserController@update');
Route::get('/front/delete-user/{data}', 'UserController@delete');

/*Commande*/
Route::post('/front/add-to-commande/{data}', 'CommandeController@create');
Route::post('/front/remove-from-commande/{data}', 'CommandeController@removeFromCommande');
Route::put('/front/update-commande/{data}', 'CommandeController@update');
Route::delete('/front/delete-commande/{data}', 'CommandeController@delete');

/*Liste*/
Route::post('/front/add-liste/{data}', 'ListeController@create');
Route::post('/front/add-to-liste/{data}', 'ListeController@addToListe');
Route::put('/front/update-liste/{data}', 'ListeController@update');
Route::delete('/front/delete-liste/{data}', 'ListeController@delete');
/*Surface*/
Route::resource('users', 'UsersController');
