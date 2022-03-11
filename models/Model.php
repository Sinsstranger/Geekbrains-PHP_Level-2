<?php

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{
	private int|string $id;

	abstract public function getTableName();

	public function getOne($id)
	{
		$tableName = $this->getTableName();
		$sql = "SELECT * FROM {$tableName} WHERE id = :id";
		Db::getInstance()->queryOne($sql, ['id' => $id]);
		$this->id = $id;
		return Db::getInstance()->lastInsertId();
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
			$valuesQueryStr .= $key !== array_key_last($params) ? "':{$key}', " : "':{$key}'";
		}
		var_dump($paramsQueryStr, $valuesQueryStr);
		$sql = "INSERT INTO `" . $this->getTableName() . "` (" . $paramsQueryStr . ") VALUES (" . $valuesQueryStr . ")";
		var_dump($sql);
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
		var_dump($sql);
		Db::getInstance()->execute($sql);
		return $this;
	}
}