<?php
/**
 * class Application
 * 
 * @author zidea <公众号小马学编程>
 * @package app\core
 */
//定义命名空间
namespace app\core;
class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;

    public Response $response;

    public static Application $app;
    //
    public Controller $controller;
    function __construct($rootPath){

        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request,$this->response);
    }


    function run(){
        echo $this->router->resolve();
    }

    public function getController()
    {
        return $this->controller;
    }

    public function setController($controller){
        $this->controller = $controller;
    }
}