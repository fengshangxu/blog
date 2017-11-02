<?php
namespace Home\Controller;
use Think\Controller;
class TimelineController extends Controller {
    public function timeline(){
    	$say = D('Say');
    	$count = $say->where("is_show = 'yes'")->count();
    	$Page = new \Think\Page($count,10);
    	$show = $Page->show();
    	$list = $say->where("is_show = 'yes'")->order("add_time desc")->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign("page",$show);
    	$this->assign('list',$list);
    	$this->display();
    }
}