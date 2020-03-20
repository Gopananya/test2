<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user/{id}', 'UserController@get');

Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::get('/products/percentage', 'ProductController@percentage');
Route::get('/products/get-by-date/{date}', 'ProductController@getByDate');

Route::resource('products','ProductController', [
    'except' => [ 'show', 'create']
]);