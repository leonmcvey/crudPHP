<?php

require_once (dirname(__FILE__) . "/Utils/Router.php");

$router = new Router();
$router->addRoute('/', function () {
    require __DIR__ . '/Pages/index.php';
});

$router->addRoute('/login', function () {
    require __DIR__ . '/Pages/users/login.php';
});

$router->addRoute('/newcustomer', function () {
    require (__DIR__ . '/Pages/newcustomer.php');
});


$router->addRoute('/office', function () {
    require __DIR__ . '/Pages/office.php';
});

$router->addRoute('/input', function () {
    require __DIR__ . '/Pages/form.php';
});

$router->addRoute('/viewcustomer', function () {
    require __DIR__ . '/Pages/viewcustomer.php';
});

$router->addRoute('/user/logout', function () {
    require (__DIR__ . '/Pages/users/logout.php');
});

$router->dispatch();
?>