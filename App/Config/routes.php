<?php

use Pecee\SimpleRouter\SimpleRouter;

// ==================================================
// NAMESPACE
// ==================================================

SimpleRouter::setDefaultNamespace('App\Controllers');

// ==================================================
// DEFINE ROUTES
// ==================================================

SimpleRouter::get('/', 'SaleController@index');
SimpleRouter::get('/sale', 'SaleController@index');
SimpleRouter::get('/categoria', 'TypeProductController@index');
SimpleRouter::get('/getAllCategories', 'TypeProductController@getAll');



