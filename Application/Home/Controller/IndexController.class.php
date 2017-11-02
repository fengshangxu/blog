<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $page = I('p',1,'intval');
        $data = paging(M('article'),array('is_delete="0"'),$page);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->display();
    }
}