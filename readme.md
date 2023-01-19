## PHP MVC 框架诞生记
框架名想好了就叫 ziPHP，会发布在 github 上，共大家分享
### 自己对 PHP 认识
- 自己是一个 PHP 的小白
- 最近想要了解这个古老的、美丽语言 PHP

### 目标
- 通过实现 PHP MVC 框架，来对 web 框架有一个整体认识
- 主要用于学习，使用还需要随后完善和深究
- 不在语言，而在如何实现 web 框架
### 适合人群
- 不需要 PHP 有任何了解，但是需要接触至少一门编程语言
- 适合刚刚入门 PHP 小白，因为我就是一个 PHP 小白
### PHP 安装
- 安装 xampp 
- 官网下载 php 的安装包， zip 文件，解压 zip 文件后，在环境变量配置一下
- 安装 composer 网上安装 composer 教程
### IDE
- IDE 选择 vscode

### 项目管理工具
- 这里采用 composer

### hello world
- 启动 server
```shell
php -S localhost:8080
```
### MVC
- Model
- View
- Controller

### 路由模块

```php
<?php
/** */
$app = new Application();

$app->router->get('/', function () {
    return 'hello World';
});


$app->run();
```
### 创建 Application
在 Application 类持有路由实例 router

```php
<?php

class Application
{
    public Router $router;
    function __construct(){
        $this->router = new Router();
    }
}
```
### 创建 Router 类
```php
<?php

class Router{
    
}
```

### composer 配置项目
```
composer init
```