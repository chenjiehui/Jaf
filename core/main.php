<?php

/**
 * Created by PhpStorm.
 * User: jiehuichen
 * Date: 2017/3/7
 * Time: 上午12:44
 */
namespace core;

use core\lib\log;
use core\lib\route;

class main
{
    public static $classMap = array();
    public static $assign = array();
    static public function run()
    {
        /**
         * 1、获取控制器和方法以及参数
         * 2、拼接控制器文件路径,判断文件是否存在
         * 3、实例化控制器类
         * 4、执行控制器的方法
         */
        log::init();
        log::log('test');
        $route = new route();
        $controller = $route->controller;
        $action = $route->action;
        $controllerFile = APP.'/controller/'.$controller.'Controller.php';
        $controllerClass = MODULE.'\controller\\'.$controller.'Controller';
        if(is_file($controllerFile)){
            include $controllerFile;
            $ctrl = new $controllerClass;
            $ctrl->$action();
        }else{
            throw new \Exception('找不到控制器'.$controllerClass);
        }

    }

    static public function load($class)
    {
        if(isset($classMap[$class])){
            return true;
        }else{
            $class = str_replace('\\','/',$class);
            $file = PATH . '/' . $class .'.php';
            if(is_file($file)){
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }

    }

    public function assign($name,$value)
    {
        $this->assign[$name] = $value;

    }

    public function display($file)
    {
        $file = APP.'/view/'.$file.'.html';
        if(is_file($file)){
            extract($this->assign);
            include $file;
        }

    }


}