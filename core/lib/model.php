<?php
/**
 * Created by PhpStorm.
 * User: jiehuichen
 * Date: 2017/4/4
 * Time: 上午10:05
 */

namespace core\lib;


class model extends \PDO
{
    public function __construct()
    {
        $database = conf::all('database');
        $password = 'chenjiehui';
        try{
            parent::__construct($database['DSN'],$database['USERNAME'],$database['PASSWORD']);
        }catch (\PDOException $e){
            p($e->getMessage());
        }
    }

}