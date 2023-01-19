<?php


namespace app\controllers;
use app\core\Controller;
use app\core\Request;

/**
 * Class AuthController
 * @author zidea <小马学编程> 公众号
 * @package app\controllers
 */

 class AuthController extends Controller
 {
    public function login()
    {
        // 设置 layout
        $this->setLayout('auth');
        return $this->render('login');
    }
    public function register(Request $request)
    {
        if($request->isPost()){
            return "Handle submitted data";
        }
        $this->setLayout('auth');
        return $this->render('register');
    }
 }