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
//работаем с объектами
$good = new Products($db);


var_dump($good->getOne(1));
var_dump($good->getAll());

$user = new Users($db);

var_dump($user->getOne(1));
var_dump($user->insert(['login' => 'sinstranger', 'pass' => 12345]));

function foo(IModel $model)
{
	echo $model->getTableName();
}

foo($user);
