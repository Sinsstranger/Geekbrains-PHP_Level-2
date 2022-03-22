<?php

namespace app\engine;

use app\traits\TSingletone;

class Db
{
	private $config = [
		'driver' => 'mysql',
		'host' => 'MariaDb',
		'login' => 'sinstranger',
		'password' => 'example',
		'database' => 'shop',
		'charset' => 'utf8'
	];

	use TSingletone;

	private $connection = null; //PDOO

	private function getConnection(): \PDO
	{
		if (is_null($this->connection)) {
			$this->connection = new \PDO($this->prepareDsnString(),
				$this->config['login'],
				$this->config['password']
			);
			$this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
		}
		return $this->connection;
	}

	public function lastInsertId()
	{
		return $this->getConnection()->lastInsertId();
	}

	private function prepareDsnString(): string
	{
		return sprintf("%s:host=%s;dbname=%s;charset=%s",
			$this->config['driver'],
			$this->config['host'],
			$this->config['database'],
			$this->config['charset']
		);
	}

//$sql = SELECT * FROM `products` WHERE id = :id AND name = :name
//$params = ['id' => 1, 'name' => 'Чай'];
	private function query($sql, $params)
	{
		$STH = $this->getConnection()->prepare($sql);
		$STH->execute($params);
		return $STH;
	}

	public function queryLimit($sql, $limit)
	{
		$STH = $this->getConnection()->prepare($sql);
		$STH->bindValue(1, $limit, \PDO::PARAM_INT);
		$STH->execute();
		return $STH->fetchAll();
	}

	public function queryOneObject($sql, $params, $class)
	{
		$STH = $this->query($sql, $params);
		$STH->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
		return $STH->fetch();
	}

	public function queryOne($sql, $params = [])
	{
		return $this->query($sql, $params)->fetch();
	}

	public function queryWhere($sql, $value)
	{
		$STH = $this->getConnection()->prepare($sql);
		$STH->bindValue(1, $value, is_int($value) ? \PDO::PARAM_INT : \PDO::PARAM_STR);
		$STH->execute();
		return $STH->fetch();

	}

	public function queryAll($sql, $params = [])
	{
		return $this->query($sql, $params)->fetchAll();
	}

	public function execute($sql, $params = []): int
	{
		return $this->query($sql, $params)->rowCount();
	}

}