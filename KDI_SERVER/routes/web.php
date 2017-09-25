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
Route::post('/categorie', 'CategorieController@create');
Route::delete('/categorie/{code}', 'CategorieController@delete');

/*Produits*/
Route::post('/produit', 'ProduitController@create');
Route::delete('/produit/{code}', 'ProduitController@delete');

/*Surfaces*/
Route::post('/surface', 'SurfaceController@create');
Route::delete('/surface/{code}', 'SurfaceController@delete');

/*Membres*/
Route::post('/membre', 'MembreController@create');
Route::delete('/membre/{code}', 'MembreController@delete');

/*Users*/
Route::post('/auth', 'UserController@auth');
Route::get('/alltables', 'UserController@alltables');
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
