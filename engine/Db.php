<?php

namespace app\engine;

use app\traits\TSingleton;

class Db
{
	use TSingleton;

	public function queryOne($sql): string
	{
		return $sql . "<br>";
	}

	public function queryAll($sql): string
	{
		return $sql . "<br>";
	}

}