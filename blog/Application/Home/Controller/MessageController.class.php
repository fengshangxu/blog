<?php
namespace Home\Controller;
use Think\Controller;
class MessageController extends Controller {
    public function message(){
    	$msg = D("Message");
    	$count = $msg->where('pid = 0')->count();// 查询满足要求的总记录数
    	$Page  = new \Think\Page($count,5);
    	$show  = $Page->show();// 分页显示输出
    	$list = $msg->where('pid = 0')->order('add_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$all = $msg->select();
    	$list = $msg->getSon($all,$list);
    	//得到回复对象的名字  foreach只能遍历数组而不能改变数组
    	for($i=0;$i<count($list);$i++){
    		if(!empty($list[$i][0])){
    			foreach($list[$i][0] as $a){
    				$a['name'] = $msg->where("id=".$a['pid'])->getField("username");
    				$arr[] = $a;
    			}
    			$list[$i][0] = $arr;
    		}
    	}
    	//print_r($list);exit;
    	$this->assign("list",$list);
    	$this->assign("page",$show);
    	
    	$this->display(); 
	}
	
	public function add(){
		$msg = D('Message');
		$user = D('User');
		if(IS_POST && isset($_COOKIE['user'])){
			$img = $user->where('username="'.$_COOKIE['user'].'"')->getField('top_img');
			$pid = I('post.pid');
			$pid = empty($pid)?0:$pid;
			$data = array(
				'content' => I('post.content'),
				'username'=> $_COOKIE['user'],
				'top_img' => $img,
				'add_time'=> date('Y-m-d H:i:s',time()),
				'pid'	  => $pid
			);
			//print_r($data);exit;
			
			//因为url:"{:U('Home/Message/add','','')}/content/"+content+"/pid/"+pid,
			//content=&pid= content默认为PID 所以判断
			if($data['content']==="pid"){
				echo "留言不能为空";
				exit;
			}
			if($msg->add($data)){
				echo "留言成功";
			}else{
				echo "留言失败";
			}
		}else{
			echo '未登录或留言内容为空';
		}
	}
}