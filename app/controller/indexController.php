<?php
/**
 * Created by PhpStorm.
 * User: jiehuichen
 * Date: 2017/4/3
 * Time: 下午11:46
 */

namespace app\controller;


use core\lib\conf;
use core\lib\model;
use core\main;

class indexController extends main
{
    public function index()
    {
//        p('this is index,haha!');
        $model=new model();
//        $model->query('set names utf8');
//        $sql = 'select * from test_data';
//        $ret = $model->query($sql);
//        p($ret->fetchAll());
        $data='hello chenjiehui~';
        $title = 'this is a title';
        $this->assign('data',$data);
        $this->assign('title',$title);
        $this->display('index');
        
    }

}