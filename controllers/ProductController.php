<?php

namespace app\controllers;

use app\models\Products;
use Twig\Error\{LoaderError, RuntimeError, SyntaxError};

class ProductController
{
	private string $action = 'catalog';
	private mixed $Products;
	private string $template;

	public function runAction($action = null)
	{
		$this->action = $action ?? $this->action;
		$method = 'action' . ucfirst($this->action);
		method_exists($this, $method) ? $this->$method() : die('Нет такого Action');
		return $this;
	}

	public function actionCatalog(): static
	{
		$this->Products = (new Products())->getAll();
		$this->template = 'productList.twig';
		return $this;
	}

	public function actionProduct(): static
	{
		$this->Products = (new Products())->getOne($_GET['id']);
		$this->template = 'productDetail.twig';
		return $this;
	}

	/**
	 * @throws RuntimeError
	 * @throws SyntaxError
	 * @throws LoaderError
	 */
	public function render()
	{
		echo Twig->render($this->template, ['props' => $this->Products]);
	}
}