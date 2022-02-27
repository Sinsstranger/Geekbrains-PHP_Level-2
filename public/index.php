<?php

use app\engine\{Autoload, Db};
use app\interfaces\IModel;
use app\models\{Goods, Users};

//Подключаем автозагрузчик
include "../engine/Autoload.php";


//регистрируем автозагрузчик
spl_autoload_register([new Autoload(), 'loadClass']);

//TODO используйте один экземпляр Db
//работаем с объектами
$good = new Goods(new Db());


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
