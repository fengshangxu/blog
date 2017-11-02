<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		
		$art = D("article");
		$show = $art->order('add_time desc')->limit(6)->select();
		$this->assign('show',$show);
		//print_r($show);exit;
		$login =  D('User');
		$postpwd = I('post.password');
		$username = I('post.username');
		
		if(IS_POST && !empty($postpwd)){
			$pwd = $login->where('username="'.$username.'"')->getField('password');
			//print_r($pwd);
			$Verify = new \Think\Verify();
			if(!$Verify->check(I('post.verify'))){
				$this->error('验证码错误');
			}
			if($pwd == md5($postpwd)){						
				cookie('user',$username);
				$this->success('登入成功','../Index/index');				
			}
			else{
				$this->error('密码错误');
			}			
		}
		if(isset($_COOKIE['user'])){
			$img = $login->where('username="'.$_COOKIE['user'].'"')->getField('top_img');
			$this->assign('img',$img);
		}
		
        $this->display();
    }
    
    public function info(){
    		$id = I('get.id');
    		$click = I('get.click')+1;
    		//echo $click;exit;
    		$art = D('Article');
    		$art->where("id=".$id)->save(array('click'=>$click));
    		$info = $art->where("id=".$id)->field('article_name,article_author,article_content')->find();
    		//print_r($info);exit;
    		$this->assign('info',$info);
    		$this->display();
    }
    
   /* public function article(){
    	if(isset($_COOKIE['user'])){
    		$id = I('get.id');
    		$art = D('Article');
    		$info = $art->where("id=".$id)->field('article_name,article_author,article_content')->find();
    		//print_r($info);exit;
    		$this->assign('info',$info);
    		$this->display();
    	}else{
    		$this->error('非法访问');
    	}
    }
    */    
	public function verify(){
			$Verify = new \Think\Verify();
			$Verify->length   = 4;
			$Verify->entry();
	}
	
	public function checkUser(){
			$login =  D('User');
	
			$username = I('get.username');
			
			if(!$login->where('username="'.$username.'"')->find()){
				echo '用户名不存在！';
			}
	}
	
	public function checkUser1(){
		$login =  D('User');
	
		$username = I('get.username');
			
		if($login->where('username="'.$username.'"')->find()){
			echo '用户名已存在！';
		}
	}
	public function reg(){
		$login =  D('User');
		$Verify = new \Think\Verify();
		$postpwd = I('post.password');
		$username = I('post.username');
		if(IS_POST){			
			if(!$Verify->check(I('post.verify'))){
				$this->error('验证码错误');
			}
			if(!empty($username)&&!empty($postpwd)){
				$data = array(
					"username" => $username,
					"password" => md5($postpwd)
				);
				if($login->add($data)){
					$this->success("注册成功","index");
				}
			}
			else{
				$this->error('密码错误');
			}
		}
		$this->display();
	}
}