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
        $dsn = 'mysql:host=127.0.0.1;dbname=test';
        $username = 'root';
        $password = 'chenjiehui';
        try{
            parent::__construct($dsn,$username,$password);
        }catch (\PDOException $e){
            p($e->getMessage());
        }
    }

}