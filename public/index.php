<?php

use app\engine\{Autoload, Db};
use app\interfaces\IModel;
use app\models\{Products, Users};

//Подключаем автозагрузчик
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'engine' . DIRECTORY_SEPARATOR . 'Autoload.php';

//регистрируем автозагрузчик
spl_autoload_register([new Autoload(), 'loadClass']);

$db = DB::getInstance();
$controllerName = $_GET['c'] ?? 'product';
$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . 'Controller';
class_exists($controllerClass) ? $controller = new $controllerClass() : die('Такого контроллера не существует');
$controller->runAction($_GET['a'] ?? null)->render();