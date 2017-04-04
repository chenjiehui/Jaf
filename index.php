<?php  
/* 
 *入口文件 1、定义常量 2、加载函数库 3、启动框架
 *
 */

define('IMOOC', realpath('./'));
define('CORE', IMOOC.'/core');
define('APP', IMOOC.'/app');
define('MODULE', '\app');

define('DEBUG', true);
if (DEBUG) {
	ini_set('display_error', 'on');
} else {
	ini_set('display_error', 'off');
	
}

include CORE.'/common/function.php';

include CORE.'/imooc.php';

spl_autoload_register('\core\imooc::load');//当new的类不存在的时候,会触发该方法

\core\imooc::run();






?>