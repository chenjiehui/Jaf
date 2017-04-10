<?php
/**
 * Created by PhpStorm.
 * User: jiehuichen
 * Date: 2017/3/20
 * Time: 下午10:00
 */
namespace core\lib;
use core\lib\conf;

class route
{
    public $controller;
    public $action;
    public function __construct()
    {
        //实现进入 xxx.com/index/index

        /**
         * 1.隐藏index.php  (通过.htaccess文件实现)
         * 2.获取URL的控制器和方法  以及参数部分
         * 3.返回控制器方法
         * */
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/'){
            $path=$_SERVER['REQUEST_URI'];
            $pathArr=explode('/',trim($path,'/'));
            if(isset($pathArr[0])){
                $this->controller = $pathArr[0];
                unset($pathArr[0]);
            }
            if(isset($pathArr[1])){
                $this->action = $pathArr[1];
                unset($pathArr[1]);
            }else{
                $this->action = conf::get('ACTION','route');
            }
        }else{
            $this->controller = conf::get('CTRL','route');
            $this->action = conf::get('ACTION','route');
        }
        $count = count($pathArr) + 2;
        $i=2;
        while($i < $count){
            if(isset($pathArr[$i + 1])){
                $_GET[$pathArr[$i]] = $pathArr[$i +1];
            }
            $i = $i + 2;
        }

    }

    public function test()
    {
        echo 'this is a test.';

    }

}