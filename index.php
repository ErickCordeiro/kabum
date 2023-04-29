<?php
ob_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . "/vendor/autoload.php";
/**
 * BOOTSTRAP
 */

use Source\Core\Session;
use CoffeeCode\Router\Router;

$session = new Session();
$route = new Router(url(), ":");

/**
 * WEB ROUTES
 */
$route->namespace("Source\App");
$route->get("/", "WebController:home");

$route->get("/cliente", "ClientController:create");
$route->post("/cliente", "ClientController:create");

//TODO: Não foi utilizado os metodos PUT e DELETE pois o componente de Router configurado não tem suporte
$route->get("/cliente/editar/{id}", "ClientController:edit");
$route->post("/cliente/update/{id}", "ClientController:update");
$route->post("/cliente/delete/{id}", "ClientController:destroy");

## Authentication routes
$route->get("/cadastrar", "AuthController:register");
$route->post("/cadastrar", "AuthController:register");
$route->get("/entrar", "AuthController:login");
$route->post("/entrar", "AuthController:login");
$route->get("/sair", "AuthController:logout");


/**
 * ERROR ROUTES
 */
$route->namespace("Source\App")->group("/ops");
$route->get("/{errcode}", "WebController:error");

/**
 * ROUTE
 */
$route->dispatch();


/**
 * ERROR REDIRECT
 */
if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}


ob_end_flush();