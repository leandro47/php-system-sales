<?php
use CoffeeCode\Router\Router;

$router = new Router(BASEURL);
$router->namespace('App\Controllers');

$router->get("/" , "ProductController:index");

$router->dispatch();







