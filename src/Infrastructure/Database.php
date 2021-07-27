<?php

namespace App\Infrastructure;

use PDO;


class Database
{
	private $pdo;


	public function __construct()
	{
		$this->pdo = new \PDO
		(
			'mysql:host=127.0.0.1;dbname=classicmodels;charset=utf8',
			'root',
			'',
            [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            ]
		);
	}

	public function executeSql($sql, array $values = array())
	{
		$query = $this->pdo->prepare($sql);

		$query->execute($values);

		return $this->pdo->lastInsertId();
	}

    public function query($sql, array $criteria = array())
    {
        $query = $this->pdo->prepare($sql);

        $query->execute($criteria);

        return $query->fetchAll();
    }

    public function queryOne($sql, array $criteria = array())
    {
        $query = $this->pdo->prepare($sql);

        $query->execute($criteria);

        return $query->fetch();
    }
}
