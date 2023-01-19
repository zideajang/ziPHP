<?php

namespace app\core;
use app\core\Application;

/**
 * Class Controller
 * 
 * @author zidea <小马学编程> 公众号
 * @package app/core
 */

 class Controller
 {

    public string $layout = 'main';
    public function render($view,$params = []){
        return Application::$app->router->renderView($view, $params);
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
 }