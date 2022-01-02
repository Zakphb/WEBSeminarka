<?php

namespace App\Models\Database;


use App\Entities\Database\Object\BaseObjectEntity;
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

	private const SQL = 'sql';
	private const PLACEHOLDER = 'placeholder';

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


	public function save($data): string
	{
		$lastId = null;
//		if ($isMutli = ArrayUtils::isMultidimensional($data))
//		{
//			bdump("here");
//			$insertedIds = [];
//			try
//			{
//				$this->pdo->beginTransaction();
//				foreach ($data as $row)
//				{
//					if ($this->exists($data))
//					{
//						$success = $this->update($row);
//					} else
//					{
//						$success = $this->insert($row);
//					}
//					if (!$success)
//					{
//						$this->pdo->rollback();
//						return false;
//					}
//					$insertedIds[] = $this->pdo->lastInsertId();
//				}
//				$this->pdo->commit();
//				return $insertedIds;
//			} catch
//			(Exception $e)
//			{
//				if ($isMutli)
//				{
//					$this->pdo->rollback();
//				}
//				echo $e;
//			}
//
//		}
		if ($this->exists($data))
		{
			$success = $this->update($data);
			$lastId = $data[BaseObjectEntity::BASE_ID];
		} else
		{
			$success = $this->insert($data);
			$lastId = $this->pdo->lastInsertId();
		}
		if (!$success)
		{
			return false;
		}
		return $lastId;
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
		$sql = "UPDATE " . $this->tableName . " SET";
		$id = (int)$data[BaseObjectEntity::BASE_ID];
		unset($data[BaseObjectEntity::BASE_ID]);
		$count = 0;
		foreach ($data as $key => $value)
		{
			$placeholderKey = ":" . $key;
			if ($count < count($data) - 1)
			{
				$sql .= " " . $key . "=$placeholderKey,";
			} else
			{
				$sql .= " " . $key . "=$placeholderKey";
			}
			$count++;
			$placeholderKeyArray[] = $placeholderKey;
		}
		$sql .= " WHERE id = :id";
		$prep = $this->pdo->prepare($sql);
		$position = 0;
		foreach ($data as $value)
		{
			$prep->bindValue($placeholderKeyArray[$position], $value);
			$position++;
		}
		$prep->bindValue(":id", $id);
		return $prep->execute();
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

	public function deleteById($data)
	{

		$sql = "DELETE FROM " . $this->tableName . " WHERE id = :id";
		if ($this->byId($data, $sql))
		{
			return true;
		}
		return false;
	}

	public function deleteWhere($data)
	{
		$whereData = $this->whereString($data);
		if ($whereData)
		{
			$sql = $whereData[self::SQL];
			$prep = $this->pdo->prepare($sql);
			$position = 0;
			foreach ($data as $value)
			{
				$prep->bindValue($whereData[self::PLACEHOLDER][$position], $value);
				$position++;
			}
			if ($prep->execute())
			{
				return true;
			}
		}
		return false;
	}


	public function getWhere($data, int $numberOfResults)
	{
		$whereData = $this->whereString($data);
		if ($whereData)
		{
			$sql = $whereData[self::SQL];
			$sql .= "LIMIT " . $numberOfResults . ";";
			$prep = $this->pdo->prepare($sql);
			$position = 0;
			foreach ($data as $value)
			{
				$prep->bindValue($whereData[self::PLACEHOLDER][$position], $value);
				$position++;
			}
			$prep->execute();
			return $prep->fetchAll(PDO::FETCH_CLASS, $this->entityName);
		}
		return false;
	}

	public function getById($data)
	{
		$sql = "SELECT * FROM " . $this->tableName . " WHERE id = :id";
		$prep = $this->byId($data, $sql);
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

	private function whereString($data)
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
		$returnArr[self::SQL] = $sql;
		$returnArr[self::PLACEHOLDER] = $placeholderKeyArray;
		return $returnArr;
	}

	private function byId($data, $sql)
	{
		$prep = $this->pdo->prepare($sql);
		if (is_array($data))
		{
			$prep->bindValue(":id", (int)$data[BaseObjectEntity::BASE_ID]);
		} else
			if (is_numeric($data))
			{
				$prep->bindValue(":id", (int)$data);
			} else
			{
				return false;
			}
		$prep->execute();
		return $prep;
	}

}

?>