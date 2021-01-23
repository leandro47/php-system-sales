<?php

use Pecee\SimpleRouter\SimpleRouter;

// ==================================================
// NAMESPACE
// ==================================================

SimpleRouter::setDefaultNamespace('App\Controllers');

// ==================================================
// DEFINE ROUTES
// ==================================================

//Start
SimpleRouter::get('/', 'SaleController@index');

//Sale
SimpleRouter::get('/sale', 'SaleController@index');

//Type product
SimpleRouter::get('/categoria', 'TypeProductController@index');
SimpleRouter::get('/getallcategories', 'TypeProductController@getAll');
SimpleRouter::post('/savecategorie', 'TypeProductController@insert');
SimpleRouter::put('/updatecategorie', 'TypeProductController@update');
SimpleRouter::delete('/deletecategorie', 'TypeProductController@delete');

//Product
SimpleRouter::get('/product', 'ProductController@index'); 
SimpleRouter::get('/getallproduct', 'ProductController@getAll');
SimpleRouter::post('/saveproduct', 'ProductController@insert');
SimpleRouter::put('/updateproduct', 'ProductController@update');
SimpleRouter::delete('/deleteproduto', 'ProductController@delete');







