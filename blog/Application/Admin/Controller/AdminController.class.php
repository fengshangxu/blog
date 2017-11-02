<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller {
    public function index(){
		if(isset($_COOKIE['username'])){
			cookie('username',null);
		}
		$login =  D('Admin');
		$postpwd = I('post.password');
		$username = I('post.username');
		if(IS_POST && !empty($postpwd)){
			$pwd = $login->where('username="'.$username.'"')->getField('password');
			//print_r($pwd);
			$Verify = new \Think\Verify();
			if(!$Verify->check(I('post.verify'))){
				$this->error('验证码错误');
			}
			if($pwd == $postpwd){
				$this->success('登入成功',U('Admin/Index/index'));
				cookie('username',$username);
			}
			else{
				$this->error('密码错误');
			}

			
		}
        $this->display();
    }

	public function verify(){
			$Verify = new \Think\Verify();
			$Verify->length   = 4;
			$Verify->entry();
	}
	
	public function checkUser(){
			$login =  D('Admin');
	
			$username = I('get.username');
			
			if(!$login->where('username="'.$username.'"')->find()){
				echo '用户名不存在！';
			}
	}
}