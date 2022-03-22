<?php

namespace app\models;

class Users extends DBModel
{
    public $id;
    public $login;
    public $pass;


    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }

    public function Auth($login, $pass) {

    }

    public static function isAuth() {
        return isset($_SESSION['login']);
    }

    public static function getName() {
        return $_SESSION['login'];
    }


    public static function getTableName()
    {
        return 'users';
    }
}