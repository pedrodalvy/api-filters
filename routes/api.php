<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Api')->group(function () {
    Route::get('products', 'ProductsController@index');
    Route::get('products/{product}', 'ProductsController@show');
});
