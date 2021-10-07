<?php
require 'vendor/autoload.php';
use Tracy\Debugger;

Debugger::enable(Debugger::DEVELOPMENT);
$baseUrl = 'http://localhost/semestralka/';

$requestUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$requestString = substr($requestUrl, strlen($baseUrl));

$urlParams = explode('/', $requestString);

// TODO: Consider security (see comments)
$controllerName = ucfirst(array_shift($urlParams)).'Controller';
$actionName = strtolower(array_shift($urlParams)).'Action';

// Call the action
$controller = new $controllerName;
$controller->$actionName();