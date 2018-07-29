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

// Adminer route
Route::any('adminer', '\Miroc\LaravelAdminer\AdminerController@index');

// Auth routes
Auth::routes();

// Homepage route
Route::get('/', 'MenuController@index');

// Menus routes
Route::resource('menus', 'MenuController');

// Products routes
Route::resource('menus.products', 'ProductController', ['except' => ['index', 'show']]);