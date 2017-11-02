<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	if(isset($_COOKIE['username'])){
			$this->display();
		}else{
			$this->error('非法访问');
		}
		
	}
}