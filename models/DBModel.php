<?php

namespace app\models;

use app\engine\Db;

abstract class DBModel extends Model
{
	abstract public static function getTableName();

	public static function getLimit($limit)
	{
		$tableName = static::getTableName();
		$sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
		return Db::getInstance()->queryLimit($sql, $limit);
	}

	//SELECT from users where login = admin
	public static function getWhere($name, $value)
	{
		$tableName = static::getTableName();
		$sql = "SELECT * FROM {$tableName} WHERE {$name} = ?";
		return Db::getInstance()->queryWhere($sql, $value);
	}

	public static function getOne($id)
	{
		$tableName = static::getTableName();
		$sql = "SELECT * FROM {$tableName} WHERE id = :id";
		return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
	}

	public static function getAll()
	{
		$tableName = static::getTableName();
		$sql = "SELECT * FROM {$tableName}";
		return Db::getInstance()->queryAll($sql);
	}

	public function insert()
	{
		$params = [];
		$columns = [];

		$tableName = static::getTableName();

		foreach ($this->props as $key => $value) {

			$params[":" . $key] = $this->$key;
			$columns[] = $key;
		}
		$columns = implode(', ', $columns);
		$values = implode(', ', array_keys($params));

		$sql = "INSERT INTO $tableName ($columns) VALUES ($values) ";

		Db::getInstance()->execute($sql, $params);
		$this->id = DB::getInstance()->lastInsertId();

		return $this;

	}

	public function update()
	{
		$params = [];
		$colums = [];

		$tableName = static::getTableName();

		foreach ($this->props as $key => $value) {
			if (!$value) continue;
			$params["{$key}"] = $this->$key;
			$colums[] .= "`{$key}` = :{$key}";
			$this->props[$key] = false;
		}
		$colums = implode(", ", $colums);
		$params['id'] = $this->id;

		$sql = "UPDATE `{$tableName}` SET {$colums} WHERE `id` = :id";

		Db::getInstance()->execute($sql, $params);
		var_dump($sql, $params);
		return $this;
	}

	public function delete()
	{
		$tableName = static::getTableName();
		$sql = "DELETE FROM $tableName WHERE id = :id";
		return Db::getInstance()->execute($sql, ['id' => $this->id]);
	}

	public function save()
	{
		if (is_null($this->id)) {
			$this->insert();
		} else {
			$this->update();
		}
	}

}