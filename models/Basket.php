<?php

namespace app\models;

use app\engine\Db;

class Basket extends DBModel
{
    public $id;
    public $session_id;
    public $product_id;

    public static function getBasket() {
        $sql = "SELECT basket.id as basket_id, products.id prod_id, products.name, products.description, products.price FROM `basket`,`products` WHERE `session_id` = '111' AND basket.product_id = products.id";

        return Db::getInstance()->queryAll($sql);
    }

    public static function getTableName()
    {
        return 'basket';
    }
}