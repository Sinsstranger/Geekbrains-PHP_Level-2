<?php
session_start();

use app\engine\Db;
use app\engine\Autoload;
use app\models\{Products, Users};
use app\engine\Render;
use app\engine\TwigRender;

//Подключаем автозагрузчик
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'engine' . DIRECTORY_SEPARATOR . 'Autoload.php';
require_once ROOT . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
//регистрируем автозагрузчик
spl_autoload_register([new Autoload(), 'loadClass']);


$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
if (class_exists($controllerClass)) {
	$controller = new $controllerClass(new TwigRender());
	$controller->runAction($actionName);
} else {
	echo "404 нет такого контроллера";
}