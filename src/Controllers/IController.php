<?php

namespace App\Controllers;
/**
 * Rozhrani pro vsechny ovladace (kontrolery).
 */
interface IController
{

	/**
	 * @param string|null $path
	 * @param $args
	 * @return mixed
	 */
	public function show(string $path, $args);

}

?>