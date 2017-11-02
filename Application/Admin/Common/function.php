<?php
/*
	return type(用户类型)
*/
function login($user,$pwd){
	$type = M('user')->where(array('name'=>$user,'pwd'=>md5($pwd)))->getField('type');
	
	return $type;
}
function is_login(){
	return $_SESSION['name']?M('user')->where(array('name'=>$_SESSION['name']))->getField('type'):0;
}
?>