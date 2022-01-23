<?php


use JetBrains\PhpStorm\Pure;

class WeightProduct extends UnitProduct
{
	protected int|float $weight = 0;

	#[Pure]
	public function __construct($incomeInterest, $basePrice, $weight)
	{
		parent::__construct($incomeInterest, $basePrice);
		$this->weight = $weight;

	}

	public function getPrice(): float|int
	{
		return parent::getPrice() * $this->weight;
	}
}