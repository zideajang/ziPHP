<?php

namespace app\core;
/**
 * Class Request
 * @author zidea <小马学编程>公众号
 * @package app\core
 */

 class Request{
    public function getPath()
    {
        // REQUEST_URI
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        //返回int数值表示 ? 位置，如果没找 ? 返回 false 表示没有找到
        $position = strpos($path, '?');
        if ($position === false){
            return $path;
        }
        return $path = substr($path, 0, $position);

    }
    public function method(){
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet(){
        return $this->method() === 'get';
    }

    public function isPost(){
        return $this->method() == 'post';
    }

    public function getBody(){
        $body = [];
        if($this->method() === 'get'){
            foreach($_GET as $key => $value){
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if($this->method() === 'post'){
            foreach($_POST as $key => $value){
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
 }