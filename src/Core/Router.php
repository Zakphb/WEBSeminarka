<?php
namespace App\Core;
/**
 *
 */
class Router
{
	protected array $routes = [];
	public Request $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
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
	 *
	 */
	public function resolve(): void
	{
		$path = $this->request->getPath();
		$method = $this->request->getMethod();
		$callback = $this->routes[$method][$path] ?? false;
		if ($callback === false){
			//TODO: Pridat vyhozeni flash message
			echo "Stranka nenalezena";
			exit;
		}
		$callback();
	}
}