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

//Sale

SimpleRouter::get('/sale', 'SaleController@index');

//Type product

SimpleRouter::get('/categoria', 'TypeProductController@index');
SimpleRouter::get('/getallcategories', 'TypeProductController@getAll');
SimpleRouter::post('/savecategorie', 'TypeProductController@insert');




