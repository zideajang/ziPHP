<?php


namespace app\controllers;
use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

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
        $model = new RegisterModel();
        $this->setLayout('auth');
        if($request->isPost()){
            $model->loadData($request->getBody());

            // echo '<pre>';
            // var_dump($registerModel);
            // echo '<\pre>';
            // exit;
            
            if($model->validate() && $model->register()){
                return 'Success';
            }
            // echo '<pre>';
            // var_dump($registerModel->errors);
            // echo '<\pre>';
            // exit;


            return $this->render('register',[ 'model'=>$model]);
            // return "Handle submitted data";
        }
        return $this->render('register',['model'=>$model]);
    }
 }