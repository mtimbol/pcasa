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

// Auth::routes();

Route::group(['prefix' => 'admin'], function() {
	Route::get('/', 'Admin\AdminController@index')->name('admin.index');
	Route::get('contacts', 'Admin\ContactsController@index')->name('admin.contacts.index');
	Route::get('contacts/create', 'Admin\ContactsController@create')->name('admin.contacts.create');
	Route::post('contacts', 'Admin\ContactsController@store');
	Route::put('contacts/{contact}', 'Admin\ContactsController@update');
	Route::post('contacts/import', 'Admin\ImportContactsController@store');
	Route::put('contacts/import/update-skipped', 'Admin\UpdateSkippedContactsController@update');

	Route::post('properties', 'Admin\PropertiesController@store');
	Route::put('properties/{property}', 'Admin\PropertiesController@update');
});


Route::get('/', function() {
	return 'hi';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
