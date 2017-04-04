<?php 
function p($var){
	if(is_bool($var)){
		var_dump($var);
	}elseif (is_null($var)) {
		var_dump(NULL);
	}else {
		print_r($var);
	}
}


?>