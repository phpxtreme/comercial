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

Route::get('/', function () {
    return view('page.home');
})->name('home');

// Providers
Route::get('provider', 'ProviderController@index');
Route::view('provider/create', 'page.provider.create');
Route::post('provider/insert', 'ProviderController@insert');
Route::get('provider/update/{id}', 'ProviderController@update');
Route::post('provider/edit/{id}', 'ProviderController@edit');
Route::get('provider/show/{id}', 'ProviderController@show');
Route::get('provider/remove/{id}', 'ProviderController@remove');

// Groups
Route::get('group', 'GroupController@index');
