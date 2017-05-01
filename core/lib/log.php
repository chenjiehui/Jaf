<?php
/**
 * Created by PhpStorm.
 * User: jiehuichen
 * Date: 2017/4/26
 * Time: 下午8:59
 */

namespace core\lib;


class log
{
    static $class;
    /**
     * 1、确定日志的存储方式
     * 2、写日志
     */

    static public function init(){
        //确定存储方式
        $drive = conf::get('DRIVE','log');
        $class = '\core\lib\drive\log\\'.$drive;
        self::$class = new $class;
    }
    static public function log($name)
    {
        self::$class->log($name);

    }
}