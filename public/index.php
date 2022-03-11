<?php

use app\engine\{Autoload, Db};
use app\interfaces\IModel;
use app\models\{Goods, Users};

//Подключаем автозагрузчик
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'engine' . DIRECTORY_SEPARATOR . 'Autoload.php';

//регистрируем автозагрузчик
spl_autoload_register([new Autoload(), 'loadClass']);
var_dump($DBH);
$db = new Db();
//работаем с объектами
$good = new Goods($db);


echo $good->getOne(1);
echo $good->getAll();

$user = new Users(new Db());

echo $user->getOne(1);
echo $user->getAll();


function foo(IModel $model)
{
	echo $model->getTableName();
}

foo($user);
