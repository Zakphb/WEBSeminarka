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

	/**
	 * @param Request $request
	 * @param Engine $latte
	 * @param $root
	 */
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

	/**
	 * @param $path
	 * @param $callback
	 */
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
		$function = $this->request->getFunction();
		$method = $this->request->getMethod();
		$controllerBase = $this->routes[$method][$path] ?? false;
		$this->resolveControllers($path, $function, $controllerBase);
	}

	/**
	 * @param $path
	 * @param $function
	 * @param $controllerBase
	 */
	public function resolveControllers($path, $function, $controllerBase){
		if (!$controllerBase)
		{
			//TODO: Pridat vyhozeni flash message
			$this->latte->render($this->root . '/src/Views/error404.latte', ['path' => $path, 'controllerBase' => $controllerBase]);
			exit();
		}
		$controllerName = $this->buildControllerString($controllerBase);
		/** @var IController $controller Ovladac prislusne stranky. */
		$controller = new $controllerName($this->latte);
		$function ? $controller->$function($_GET) : $controller->show();
	}

	/**
	 * @param $callback
	 * @return string
	 */
	public function buildControllerString($callback)
	{
		return NAMESPACE_DIRECTORY_CONTROLLERS . $callback . "Controller";
	}
}