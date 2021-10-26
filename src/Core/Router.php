<?php

namespace App\Core;
use Latte\Engine;

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
			$this->latte->render($this->root.'/src/Views/home.html');
		} else {
			if (is_string($callback) && ($path === '/'))
			{
				$this->latte->render($this->root.'/src/Views/'.$callback.'.latte');
			} else {
				$this->latte->render($this->root.'/src/Views'.$path.'.latte');
			}
		}
	}
}