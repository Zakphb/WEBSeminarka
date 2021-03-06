<?php
//Vynuceni chyb na serveru students.kiv.zcu.cz
use App\Core\Application;
use Tracy\Debugger;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/settings.php';
require_once __DIR__ . '/vendor/autoload.php';

Debugger::enable(Debugger::PRODUCTION);

$app = new Application(__DIR__);

foreach (iterator_to_array($it = new RecursiveIteratorIterator(new RecursiveArrayIterator(WEB_PAGES))) as $callback => $path)
{
	$app->router->get((string)$path, (string)$callback);
	$app->router->post((string)$path, (string)$callback);
}
$app->run();
