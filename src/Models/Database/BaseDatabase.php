<?php

namespace App\Models\Database;

use PDO;

/**
 * Trida spravujici databazi.
 */
abstract class BaseDatabase
{

	/** @var PDO $pdo Objekt pracujici s databazi prostrednictvim PDO. */
	private $pdo;

	private $tableName;

	/**
	 * Inicializace pripojeni k databazi.
	 */
	public function __construct($tableName)
	{
		$this->tableName = $tableName;
		// inicializace DB
		$this->pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
		// vynuceni kodovani UTF-8
		$this->pdo->exec("set names utf8");
	}


	public function save($data)
	{
		$this->pdo->
		$this->pdo->prepare()
	}

	public function exists($data)
	{
		$sql = "SELECT * FROM ? WHERE ? = ?";
		foreach ($data as $param){
			$sql.=" AND ? = ?";
		}
		$sql.=" ;";
		$st = $this->pdo->prepare($sql);
		$st->bindValue("?", $this->tableName);
		foreach ($data as $param) {
			$st->bindValue( "?", $param);
			$st->bindValue( "?", $param);
		}
		$st->execute();
	}


	/**
	 *  Vrati seznam vsech uzivatelu pro spravu uzivatelu.
	 * @return array Obsah spravy uzivatelu.
	 */
	public function getAllUsers(): array
	{
		// pripravim dotaz
		$q = "SELECT * FROM " . TABLE_USER;
		// provedu a vysledek vratim jako pole
		// protoze je o uzkazku, tak netestuju, ze bylo neco vraceno
		return $this->pdo->query($q)->fetchAll();
	}

	/**
	 *  Smaze daneho uzivatele z DB.
	 * @param int $userId ID uzivatele.
	 */
	public function deleteUser(int $userId): bool
	{
		// pripravim dotaz
		$q = "DELETE FROM " . TABLE_USER . " WHERE id_user = $userId";
		// provedu dotaz
		$res = $this->pdo->query($q);
		// pokud neni false, tak vratim vysledek, jinak null
		if ($res)
		{
			// neni false
			return true;
		} else
		{
			// je false
			return false;
		}
	}

}

?>