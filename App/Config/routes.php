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
SimpleRouter::post('/savesale', 'SaleController@insert');
SimpleRouter::get('/showsale', 'SaleController@show');
SimpleRouter::get('/getallsale', 'SaleController@getAll');
SimpleRouter::get('/getitens{id}', 'SaleController@getItens');
SimpleRouter::delete('/deletesale{id}', 'SaleController@deleteSale');

//Type product
SimpleRouter::get('/categoria', 'TypeProductController@index');
SimpleRouter::get('/getallcategories', 'TypeProductController@getAll');
SimpleRouter::post('/savecategorie', 'TypeProductController@insert');
SimpleRouter::put('/updatecategorie', 'TypeProductController@update');
SimpleRouter::delete('/deletecategorie', 'TypeProductController@delete');

//Product
SimpleRouter::get('/product', 'ProductController@index'); 
SimpleRouter::get('/getallproduct', 'ProductController@getAll');
SimpleRouter::get('/getproductbyid{id}', 'ProductController@getById');
SimpleRouter::get('/getproductbytype{id}', 'ProductController@getByType');
SimpleRouter::post('/saveproduct', 'ProductController@insert');
SimpleRouter::put('/updateproduct', 'ProductController@update');
SimpleRouter::delete('/deleteproduto', 'ProductController@delete');







