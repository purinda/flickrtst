<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use FlickrTestApp\Config\AppConfig;
use Framework\Resolver;
use Framework\Router;
use Framework\Request;

// Composer autoload
$loader = require  __DIR__ . '/../vendor/autoload.php';

// Load application configuration
define('APP_CONFIG', realpath(__DIR__ . '/../src/FlickrTestApp/Config/AppConfig.php'));

// Check if the app configuration is readable
if (!is_readable(APP_CONFIG)) {
    die('No application configuration found. Please create an application configuration in ' . APP_CONFIG);
}

Request::fromCurrent();

// Setup routes from FlickrTestApp\\Config\\AppConfig
var_dump(AppConfig::$routes);


$router   = new Router();
$resolver = Resolver::build($router);
$request  = Request::fromCurrent();
$response = $resolver->handle($request);

$response->dispatch();

var_dump($_SERVER, $_GET, $_POST);
