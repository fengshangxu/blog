<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
		if(IS_POST){
			$postpwd = I('post.password');
			$name = I('post.username','','trim');
			$type = login($name,$postpwd);
			$Verify = new \Think\Verify();
			if(!$Verify->check(I('post.verify'))){
				$this->error('验证码错误',U('Admin/Login/index'),1);
			}
			if($type){
				session('name',$name);
				$this->redirect('Index/index');
			}else{
				$this->error('密码错误',U('Admin/Login/index'),1);
			}
			
		}else{
			if(is_login()){
				$this->redirect('Index/index');
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
		$login =  D('user');
		$username = I('get.username');
		if(!$login->where('name="'.$username.'"')->find()){
			echo '用户名不存在！';
		}
	}

	public  function logout(){
		session('name',null);
		$this->redirect('Login/index');
	}
}