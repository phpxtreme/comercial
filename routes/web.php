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
Route::get('group/provider/groups/{id}', 'GroupController@getProviderGroups');

// Currencies
Route::get('currency', 'CurrencyController@index');
Route::view('currency/create', 'page.currency.create');
Route::post('currency/insert', 'CurrencyController@insert');
Route::get('currency/update/{id}', 'CurrencyController@update');
Route::post('currency/edit/{id}', 'CurrencyController@edit');
Route::get('currency/show/{id}', 'CurrencyController@show');
Route::get('currency/remove/{id}', 'CurrencyController@remove');

// Measurements
Route::get('measurement', 'MeasurementController@index');
Route::view('measurement/create', 'page.measurement.create');
Route::post('measurement/insert', 'MeasurementController@insert');
Route::get('measurement/update/{id}', 'MeasurementController@update');
Route::post('measurement/edit/{id}', 'MeasurementController@edit');
Route::get('measurement/show/{id}', 'MeasurementController@show');
Route::get('measurement/remove/{id}', 'MeasurementController@remove');

// Items
Route::get('item', 'ItemController@index');
Route::get('item/provider/groups/{id}', 'ItemController@getProviderGroups');
Route::post('item/provider/group/items', 'ItemController@getGroupItems');
Route::get('item/create', 'ItemController@create');
Route::post('item/insert', 'ItemController@insert');
Route::get('item/show/{id}', 'ItemController@show');
Route::get('item/remove/{id}', 'ItemController@remove');
// + Search Items
Route::view('search-item-provider', 'page.item.search.provider', ['providers' => \App\Models\Provider::all()]);
Route::post('search-item-provider/search', 'ItemController@getProviderItems');