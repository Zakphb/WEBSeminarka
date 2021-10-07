<?php

require_once __DIR__ . '/vendor/autoload.php';

use Tracy\Debugger;

Debugger::enable(Debugger::DEVELOPMENT);

echo "Hello there";
$app = new Application();
//$app = new Application();
//
//$app->router->get('/', function ()
//{
//	echo "Hello world";
//});
//
//$app->router->get('/contact', function ()
//{
//	echo "Contact";
//});
//
//$app->run();
