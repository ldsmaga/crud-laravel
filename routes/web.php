<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ProductController@index');

Route::resource('products', 'ProductController');