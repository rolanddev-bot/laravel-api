<?php

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

Route::group(['namespace' => 'Api'], function () {
    Route::get('/products', 'ProductsController@index');
    Route::post('/products', 'ProductsController@store');
    Route::get('/products/{product}', 'ProductsController@show');
    Route::delete('/products/{productId}', 'ProductsController@delete');
    Route::put('/products', 'ProductsController@update');
    Route::get('/products/prod/{productId}', 'ProductsController@edit');

    Route::get('/cart', 'ProductsCartController@index');
    Route::post('/cart', 'ProductsCartController@store');
    Route::delete('/cart/{productId}', 'ProductsCartController@destroy');
    Route::delete('/cart', 'ProductsCartController@destroyAll');
});