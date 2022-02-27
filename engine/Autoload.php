<?php

namespace app\engine;

class Autoload
{

	public function loadClass($className)
	{
		require_once dirname(__DIR__) . str_replace(['\\', 'app'], [DIRECTORY_SEPARATOR, ''], $className) . '.php';
	}
}