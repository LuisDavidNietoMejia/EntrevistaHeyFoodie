<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/sales/index', 'SaleController@index')->name('sales.index.api');
Route::get('/sales/index/details', 'SaleController@indexDetails')->name('sales.details.index.api');

// Route to handle page reload in Vue except for api routes
Route::get('/{any?}', function (){
    return view('welcome');
})->where('any', '^(?!api\/)[\/\w\.-]*');
