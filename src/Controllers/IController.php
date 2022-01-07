<?php

namespace App\Controllers;
/**
 * Rozhrani pro vsechny ovladace.
 */
interface IController
{

	/**
	 * @param string|null $path
	 * @param $args
	 * @return mixed
	 */
	public function show(string $path, $args);

	/**
	 * @return mixed
	 */
	public function actionEdit();

	/**
	 * @return mixed
	 */
	public function actionGrid();

	/**
	 * @param $variables
	 * @return mixed
	 */
	public function saveForm($variables);

	/**
	 * @param $variables
	 * @return mixed
	 */
	public function loadForm($variables);

	/**
	 * @param $id
	 * @return mixed
	 */
	public function redirectEdit($id);
}

?>