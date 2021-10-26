<?php
namespace App\Core;
use Latte\Engine;

/**
 *
 */
class Application
{
	public Router $router;
	public Request $request;
	public Engine $latte;
	public static string $ROOT;
	/**
	 *
	 */
	public function __construct($root)
	{
		self::$ROOT = $root;
		$this->request = new Request();
		$this->latte = new Engine();
		$this->router = new Router($this->request, $this->latte, $root);
	}

	/**
	 *
	 */
	public function run(): void
	{
		echo $this->router->resolve();
	}
}