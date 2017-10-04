<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::resource('vehicles', 'VehicleController', [
//    'except' => ['create', 'edit'],
//]);

Route::group(['prefix' => 'vehicles'], function(){

    Route::get('', 'VehicleController@index')
        ->name('vehicle.index');

    Route::post('', 'VehicleController@store')
        ->name('vehicle.store');

    Route::get('find', 'VehicleController@search')
        ->name('vehicle.search');

    Route::get('{id}', 'VehicleController@show')
        ->name('vehicle.show')
        ->where('id', '[0-9]+');

    Route::match(['PUT', 'PATCH'],'{id}', 'VehicleController@update')
        ->name('vehicle.update')
        ->where('id', '[0-9]+');

    Route::delete('{id}', 'VehicleController@destroy')
        ->name('vehicle.delete')
        ->where('id', '[0-9]+');

});


