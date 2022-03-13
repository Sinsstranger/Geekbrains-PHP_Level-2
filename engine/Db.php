<?php

namespace app\engine;

use app\traits\TSingleton;

class Db
{
	private \PDO|null $connection = null;
	private array $config = [
		'driver' => 'mysql',
		'host' => 'MariaDb',
		'login' => 'sinstranger',
		'password' => 'example',
		'database' => 'shop',
		'charset' => 'utf8'
	];
	use TSingleton;

	private function getConnection(): ?\PDO
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

	public function lastInsertId(): bool|string
	{
		return $this->connection->lastInsertId();
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

	private function query($sql, $params): bool|\PDOStatement
	{
		$STH = $this->getConnection()->prepare($sql);
		foreach ($params as $key => $value) {
			$STH->bindValue(":{$key}", $value, is_integer($value) ? \PDO::PARAM_INT : \PDO::PARAM_STR);
		}
		$STH->execute($params);
		return $STH;
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

	public function queryAll($sql, $params = []): bool|array
	{
		return $this->query($sql, $params)->fetchAll();
	}

	public function execute($sql, $params = []): int
	{
		return $this->query($sql, $params)->rowCount();
	}

}