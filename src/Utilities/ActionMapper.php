<?php

namespace App\Utilities;

class ActionMapper
{
	private $ActionsForMapper;
	private $controllerName;

	public function __construct($ActionsForMapper, $controllerName)
	{
		$this->ActionsForMapper = $ActionsForMapper;
		$this->controllerName = $controllerName;
	}

	public function mapActions(){
		$mappedActions = [];
		foreach ($this->ActionsForMapper as $action){
			$actionName = strtolower(str_replace(array(".action", $this->controllerName), "", $action));
			switch ($actionName) {
				case "edit":
					$mappedActions[EActionNames::EDIT] = $action;
					break;
				case "delete":
					$mappedActions[EActionNames::DELETE] = $action;
					break;
				case "detail":
					$mappedActions[EActionNames::DETAIL] = $action;
					break;
				case "grid":
					$mappedActions[EActionNames::GRID] = $action;
					break;
			}
		}
		return $mappedActions;
	}
}