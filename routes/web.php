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

Route::post('contacts/import', 'ImportContactsController@store');
Route::post('contacts/', 'Admin\ContactsController@store');
Route::put('contacts/{contact}', 'Admin\ContactsController@update');
Route::put('contacts/import/update-skipped', 'UpdateSkippedContactsController@update');

Route::get('/home', 'HomeController@index')->name('home');
