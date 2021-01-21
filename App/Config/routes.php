<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('App\Controllers');

SimpleRouter::get('/', 'ProductController@index');





