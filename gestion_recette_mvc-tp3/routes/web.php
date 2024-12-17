<?php
use App\Routes\Route;
//recettes
Route::get('/recettes', 'RecetteController@index');
Route::get('/recette/show', 'RecetteController@show');
Route::get('/recette/create', 'RecetteController@create');
Route::post('/recette/create', 'RecetteController@store');
Route::get('/recette/edit', 'RecetteController@edit');
Route::post('/recette/edit', 'RecetteController@update');
Route::post('/recette/delete', 'RecetteController@delete');
//user
Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@store');
//login
Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');

Route::dispatch();