<?php

namespace app\models;

class Basket extends Model
{
	public int $id;
	public int|string $session_id;
	public int $product_id;

	public function getTableName()
	{
		// TODO: Implement getTableName() method.
		return 'basket';
	}
}