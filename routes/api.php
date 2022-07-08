<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'api'], function () {
    Route::post('/login', 'Auth\LoginApiController@login')->name('login.api');
    Route::post('/logout/api', 'Auth\LoginApiController@logout')->name('logout.api');
    Route::post('/auth/register/user', 'UserController@store')->name('auth.register.user.api');
});

Route::group(['middleware' => ['jwt.verify']], function () {
  Route::get('/potions/index', 'PotionController@index')->name('potions.index.api');
  Route::get('/clients/index', 'UserController@index')->name('clients.index.api');

  Route::post('/sales/potions/store', 'SaleController@store')->name('sales.store.api');
  Route::get('/sales/index/details', 'SaleController@indexDetails')->name('sales.details.index.api');

  Route::get('/sales/index', 'SaleController@index')->name('sales.index.api');
  Route::delete('/sales/delete', 'SaleController@delete')->name('sales.delete.api');
  Route::put('/sales/update/{sale_id}', 'SaleController@update')->name('sales.update.api');

});
