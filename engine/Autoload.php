<?php

namespace app\engine;

class Autoload
{

	public function loadClass($className)
	{
		require_once sprintf("%s%s.php", ROOT, str_replace(['\\', 'app'], [DS, ''], $className));
	}
}