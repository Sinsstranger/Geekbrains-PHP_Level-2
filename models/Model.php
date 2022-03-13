<?php

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{
	private string $id;
	protected array $props;

	abstract public function getTableName();

	public function __get($key)
	{
		return $this->$key;
	}

	public function __set($key, $value)
	{
		$this->props[$key] = $value;
		$this->$key = $value;
	}

	public function getOne($id)
	{
		$tableName = $this->getTableName();
		$sql = "SELECT * FROM {$tableName} WHERE id = :id";
		$this->id = $id;
		return Db::getInstance()->queryOne($sql, ['id' => $id]);
	}

	public function getAll()
	{
		$tableName = $this->getTableName();
		$sql = "SELECT * FROM {$tableName}";
		return Db::getInstance()->queryAll($sql);
	}

	public function insert($params = null): static
	{
		$paramsQueryStr = '';
		$valuesQueryStr = '';
		foreach ($params as $key => &$value) {
			$paramsQueryStr .= $key !== array_key_last($params) ? "`{$key}`, " : "`{$key}`";
			$valuesQueryStr .= $key !== array_key_last($params) ? ":{$key}, " : ":{$key}";
		}
		$sql = "INSERT INTO `" . $this->getTableName() . "` (" . $paramsQueryStr . ") VALUES (" . $valuesQueryStr . ")";
		Db::getInstance()->execute($sql, $params);
		$this->id = Db::getInstance()->lastInsertId();
		return $this;
	}

	public function update()
	{
	}

	public function delete()
	{
		$sql = "DELETE FROM `" . $this->getTableName() . "` WHERE `id` = {$this->id}";
		Db::getInstance()->execute($sql);
	}
}