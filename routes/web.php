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
    return view('welcome');
});
Route::get('/client', "ClientController@list");
Route::get('/client/register', "ClientController@register");
Route::post('/client/saving', "ClientController@saving");
Route::get('/client/edit/{id}', "ClientController@edit");
Route::post('/client/update/{id}', "ClientController@update");
Route::get('/client/delete/{id}', "ClientController@delete");
Route::get('/client/detailclient/{id}', "ClientController@detailclient");

//Rotas Devices
Route::get('/client/devicelist', "ClientController@devicelist");
Route::get('/client/assigndevice/{id}', "ClientController@assigndevice");
Route::post('/client/savedevice/{device}', "ClientController@savedevice");
Route::get('/client/registerdevice', "ClientController@registerdevice");