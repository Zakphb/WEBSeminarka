<?php

namespace App\Models\Database;


use App\Entities\Database\Object\BaseObjectDatabaseEntity;
use App\Utilities\ArrayUtils;
use Exception;
use PDO;

/**
 * Trida spravujici databazi.
 */
abstract class BaseDatabase
{

	/** @var PDO $pdo Objekt pracujici s databazi prostrednictvim PDO. */
	private $pdo;

	private $tableName;
	private $entityName;

	/**
	 * Inicializace pripojeni k databazi.
	 */
	public function __construct($tableName, $entityName)
	{
		$this->tableName = $tableName;
		$this->entityName = $entityName;
		// inicializace DB
		$this->pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
		// vynuceni kodovani UTF-8
		$this->pdo->exec("set names utf8");
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}


	public function save($data)
	{
		if ($isMutli = ArrayUtils::isMultidimensional($data))
		{
			$insertedIds = [];
			try
			{
				$this->pdo->beginTransaction();
				foreach ($data as $row)
				{
					if ($this->exists($data))
					{
						$success = $this->update($row);
					} else
					{
						$success = $this->insert($row);
					}
					if (!$success)
					{
						$this->pdo->rollback();
						return false;
					}
					$insertedIds[] = $this->pdo->lastInsertId();
				}
				$this->pdo->commit();
				return $insertedIds;
			} catch
			(Exception $e)
			{
				if ($isMutli)
				{
					$this->pdo->rollback();
				}
				echo $e;
			}

		}
		if ($this->exists($data))
		{
			$success = $this->update($data);
		} else
		{
			$success = $this->insert($data);
		}
		if (!$success)
		{
			return false;
		}
		return $this->pdo->lastInsertId();
	}


	public function insert(array $data)
	{
		if (is_null($data["id"]) || array_key_exists("id", $data))
		{
			unset($data["id"]);
		}
		$sql = "INSERT INTO $this->tableName (" . ArrayUtils::arrayIntoQueryArgs(array_keys($data)) . ") VALUES (" .
			ArrayUtils::arrayIntoQueryArgs(array_values($data), true) . ");";
		$prep = $this->pdo->prepare($sql);
		return $prep->execute();
	}


	public
	function update($data)
	{
		$prep = $this->pdo->prepare("
		UPDATE ?
		SET 
		VALUES (?);
		");
		return $prep->execute([$this->tableName, $data, $data]);
	}

	public
	function exists($data)
	{
		if (isset($data["id"]))
		{
			return true;
		}
		return false;
	}


	public function getWhere($data, int $numberOfResults)
	{
		if (count($data) === 0)
		{
			return false;
		}
		$sql = "SELECT * FROM " . $this->tableName . " WHERE";
		$counter = 0;
		$placeholderKeyArray = [];
		foreach ($data as $key => $value)
		{
			$placeholderKey = ":" . $key;
			if ($counter > 0 && count($data) > 1)
			{
				$sql .= " AND " . $key . " = $placeholderKey";
			} else
			{
				$sql .= " " . $key . " = $placeholderKey ";
			}
			$placeholderKeyArray[] = $placeholderKey;
			$counter++;
		}
		$sql .= "LIMIT " . $numberOfResults . ";";
		$prep = $this->pdo->prepare($sql);
		$position = 0;
		foreach ($data as $value)
		{
			$prep->bindValue($placeholderKeyArray[$position], $value);
			$position++;
		}
		$prep->execute();
		return $prep->fetchAll(PDO::FETCH_CLASS, $this->entityName);
	}

	public function getById($data)
	{
		$sql = "SELECT * FROM " . $this->tableName . " WHERE id = :id";
		$prep = $this->pdo->prepare($sql);
		if (is_array($data))
		{
			$prep->bindValue(":id", $data[BaseObjectDatabaseEntity::BASE_ID]);
		} else
			if (is_int($data))
			{
				$prep->bindValue(":id", $data);
			} else
			{
				return false;
			}
		$prep->execute();
		$arr = $prep->fetchAll(PDO::FETCH_CLASS, $this->entityName);
		return $arr[0];
	}

	public function getAll()
	{
		$sql = "SELECT * FROM " . $this->tableName;
		$prep = $this->pdo->prepare($sql);
		$prep->execute();
		return $prep->fetchAll(PDO::FETCH_CLASS, $this->entityName);
	}

}

?>