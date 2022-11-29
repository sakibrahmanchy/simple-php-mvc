<?php
require_once "./framework/Application.php";

$router = Application::getInstance()->make('router');
$router->add('/users', 'GET', array(
    'callback' => function ($request) {
        echo "User is Pavel";
    }
));

$router->add('/admin', 'GET', array(
    'callback' => function ($request) {
        if (isset($request['password'])) {
            if ($request['password'] === "pavel123") {
                echo "This is private data <br />";
                echo "User is Pavel";
            }
        } else {
            throw new   Error("You are not allowed to see this route!");
        }
    }
));


$router->add('/user/profile', 'GET', array(
    'controller' => 'UserController@getUser'
));
