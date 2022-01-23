<?php

class DigitalProduct extends UnitProduct
{
	public function getPrice(): float|int
	{
		return parent::getPrice() / 2;
	}
}