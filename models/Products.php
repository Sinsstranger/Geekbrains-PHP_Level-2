<?php

namespace app\models;

class Products extends Model
{
	public mixed $name;
	public mixed $description;
	public mixed $price;

	public function __construct($name = null, $description = null, $price = null)
	{
		$this->name = $name;
		$this->description = $description;
		$this->price = $price;
	}

	public function getTableName(): string
	{
		return 'products';
	}
}