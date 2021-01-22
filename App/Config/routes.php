<?php
use CoffeeCode\Router\Router;

$router = new Router(BASEURL);

/**
 * routes
 */
$router->namespace('App\Controllers');

$router->get("/" , "ProductController:home");
$router->get("/teste" , "ProductController:teste");

$router->dispatch();

if ($router->error()) {
    var_dump($router->error());
    //router->redirect("/error/{$router->error()}");
}







