<?php

namespace app\controllers;

use app\models\Users;

class AuthController extends Controller
{
	public function actionLogin()
	{
		$login = $_GET['l'];
		$pass = $_GET['p'];
		$user = (new Users($login, $pass))->Auth($login, $pass);
		if ($user) {
			$_SESSION['login'] = $user['login'];
			echo $this->render('user.twig',['user' => $user, 'title' => 'User Profile']);
		}
//		header('Location: /');
	}

	public function actionLogout()
	{
		unset($_SESSION['login']);
		header('Location: /');
		die('Вы разлогинились');
	}

}