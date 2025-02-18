<?php
require_once "Controllers/BaseController.php";
require_once "Router.php";
require_once "Database/Database.php";
require_once "Controllers/WelcomeController.php";
require_once "Controllers/userController.php";

$route = new Router();
$route->get("/", [WelcomeController::class, 'welcome']);


$route->get("/user", [UserController::class, 'index']);
$route->get("/user/create", [UserController::class, 'create']);
$route->post("/user/store", [UserController::class, 'store']);
$route->delete("/user/delete/{id}", [UserController::class, 'destroy']);


$route->route();