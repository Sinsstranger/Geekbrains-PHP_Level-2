<?php
define("ROOT", dirname(__DIR__));
const DS = DIRECTORY_SEPARATOR;
const CONTROLLER_NAMESPACE = 'app\controllers\\';
const VIEWS_DIR = "{ROOT}/views/";
const ASSETS_PATH = "{ROOT}/public/assets/";
define("viewsFolders", array_map(function ($dir) {
	return ROOT . DS . 'views' . DS . $dir;
}, array_filter(scandir(ROOT . DS . 'views'), function ($dir) {
	return !in_array($dir, ['.', '..']);
})));