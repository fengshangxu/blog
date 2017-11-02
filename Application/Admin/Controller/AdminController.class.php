<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller {
   public function _initialize(){
   		define('UID',is_login());
   		if(!UID){
   			$this->error('未登录',U('Admin/Login/index'));
   		}
   }
}
?>