<?php

namespace App\Core;

use App\Controllers\IController;
use Latte\Engine;
use App;

/**
 *
 */
class Router
{
	protected array $routes = [];
	public Request $request;
	public Engine $latte;
	public string $root;

	public function __construct(Request $request, Engine $latte, $root)
	{
		$this->request = $request;
		$this->latte = $latte;
		$this->root = $root;
	}

	/**
	 * @param $path
	 * @param $callback
	 */
	public function get($path, $callback): void
	{
		$this->routes['get'][$path] = $callback;
	}

	public function post($path, $callback)
	{
		$this->routes['post'][$path] = $callback;
	}

	/**
	 *
	 */
	public function resolve()
	{
		$path = $this->request->getPath();
		$method = $this->request->getMethod();
		$callback = $this->routes[$method][$path] ?? false;
		if (!$callback)
		{
			//TODO: Pridat vyhozeni flash message
			echo $this->latte->render($this->root . '/src/Views/error404.latte', ['path' => $path]);
			exit();
		}
		$controllerName = $this->buildControllerString($callback);
		/** @var IController $controller Ovladac prislusne stranky. */
		$controller = new $controllerName($this->latte);
		$controller->show($path);
	}

	public function buildControllerString($callback)
	{
		return NAMESPACE_DIRECTORY_CONTROLLERS . $callback . "Controller";
	}
}