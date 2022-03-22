<?php

namespace app\controllers;

use app\engine\Render;
use app\interfaces\IRenderer;
use app\models\Users;

abstract class Controller
{
    private $action;
    private $defaltAction = 'index';
    private $render;


    public function __construct(IRenderer $render)
    {
        $this->render = $render;
    }


    public function runAction($action) {
        $this->action = $action ?: $this->defaltAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo "404 нет такого экшена";
        }
    }

    public function render($template, $params = []) {
        return $this->renderTemplate($template, $params);
    }


    //$template = 'product/catalog'
    //$params = ['catalalog' = ['name'='чай']];
    public function renderTemplate($template, $params = []) {
        return $this->render->renderTemplate($template, $params);
    }
}