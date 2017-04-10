<?php  
/* 
 *入口文件 1、定义常量 2、加载函数库 3、启动框架
 *
 */

define('PATH', realpath('./'));
define('CORE', PATH.'/core');
define('APP', PATH.'/app');
define('MODULE', '\app');

define('DEBUG', true);
if (DEBUG) {
	ini_set('display_error', 'on');
} else {
	ini_set('display_error', 'off');
	
}

include CORE.'/common/function.php';

include CORE.'/main.php';

spl_autoload_register('\core\main::load');//当new的类不存在的时候,会触发该方法

\core\main::run();






?>