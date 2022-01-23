<?php

class UnitProduct extends Product
{
	public function getPrice(): float|int
	{
		return $this->basePrice + ($this->basePrice * ($this->incomeInterest / 100));
	}
}