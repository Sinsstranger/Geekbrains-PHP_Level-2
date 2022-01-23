<?php
abstract class Product
{
	protected int|float $basePrice = 0;
	protected int $incomeInterest = 0;

	public function __construct($incomeInterest, $basePrice)
	{
		$this->incomeInterest = $incomeInterest;
		$this->basePrice = $basePrice;
	}

	abstract function getPrice();
}