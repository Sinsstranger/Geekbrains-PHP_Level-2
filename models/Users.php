<?php

namespace app\models;

use app\engine\Db;

class Users extends DBModel
{
	public $id;
	public $login;
	public $pass;


	public function __construct($login = null, $pass = null)
	{
		$this->login = $login;
		$this->pass = $pass;
		$this->id = static::getWhere('login', $login) ?? null;
	}

	public function Auth($login, $pass)
	{
		$userParams = $this->getWhere('login', $this->login);
		return $userParams['login'] == $login && $userParams['pass'] == $pass ? $userParams : false;
	}

	public static function isAuth(): bool
	{
		return isset($_SESSION['login']);
	}

	public static function getName()
	{
		return $_SESSION['login'];
	}


	public static function getTableName(): string
	{
		return 'users';
	}
}