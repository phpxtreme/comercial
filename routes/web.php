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
Route::get('group/create', 'GroupController@create');
Route::post('group/insert', 'GroupController@insert');
Route::get('group/update/{id}', 'GroupController@update');
Route::post('group/edit/{id}', 'GroupController@edit');
Route::get('group/show/{id}', 'GroupController@show');
Route::get('group/remove/{id}', 'GroupController@remove');

// Currencies
Route::get('currency', 'CurrencyController@index');
Route::view('currency/create', 'page.currency.create');