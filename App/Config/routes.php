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


