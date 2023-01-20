<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
  /**
   * Class SiteController
   * @author zidea <小马学编程> 公众号
   * @package app\controllers
   */

class SiteController extends Controller{

    public function home()
    {
        $params = [
            'name' => "ziPHP"
        ];
        return $this->render('home',$params);
    }

    public function contact(){
        return $this->render('contact');
    }

  
    

    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        echo '<pre>';
        var_dump($body);
        echo '</pre>';
        exit;
        return 'Handling submitted data';
    }
}