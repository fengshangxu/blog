<?php
namespace Admin\Controller;
use Think\Controller;
class SayController extends Controller {
    public function saylist(){
    	$say = D('Say');
    	$count = $say->count();
    	$Page = new \Think\Page($count,8);
    	$show = $Page->show();
    	$list = $say->order("add_time desc")->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign("page",$show);
    	$this->assign('list',$list);
    	$this->display();
	}
	public function sayadd(){
		$say = D('Say');
		if(IS_POST){
			$content = I('post.content');
			$data = array(
				"content" => $content,
				"add_time"=> date("Y-m-d H:i:s",time())
			);
			if($say->add($data)){
				$this->success("添加成功",'saylist');
			}else{
				$this->error("未发表成功");
			}
		}
		$this->display();
	}
	
	public function sayedit(){
		$say = D('Say');
		$id = I("get.id");
		$content = I("get.content");
		if($content === "yes"){
			$say->where("id=".$id)->save(array("is_show"=>"no"));
			echo "no";
		}else{
			$say->where("id=".$id)->save(array("is_show"=>"yes"));
			echo "yes";
		}
	}
}