<?php
namespace Admin\Controller;
use Think\Controller;
class PhotoController extends Controller {
	public $photo = null; 
	public $ph = null;
	public function __construct(){
		parent::__construct();
		$this->photo = D("Photo");
		$this->ph = M("album");
	}
	
	public function photolist(){
		$count = $this->ph->count();
		$Page = new \Think\Page($count,3);
		$show = $Page->show();
		$list = $this->ph->order("add_time desc")->where("is_show='yes'")->limit($Page->firstRow.','.$Page->listRows)->select();
		//print_r($list);exit;
		$this->assign("list",$list);
		$this->assign('page',$show);
		$this->display();
	}
	
    public function albumdel(){
    	$id = I('get.id');
    	$data = array("is_show" => "no");
    	$this->ph->where("id=".$id)->save($data);
    }
    
	public function albumadd(){
		if(IS_POST){
			$data = array(
				"name"     => I("post.name"),
				"add_time" => date("Y-m-d H:i:s",time()),
			);
			$this->ph->add($data);	
		}
		$this->display();
	}
	
	public function photoadd(){
		//$photo = D("Photo");
		
		if(IS_GET){
			$name = I('get.name');
		}else if(IS_POST){
			$name = I('post.cate');
		}
		
		//echo $name;exit;
		if(IS_POST && $_FILES){
			//ECHO I('post.cate');exit;
			//ECHO $_FILES?1:0;EXIT;
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   =     1024*1024*100 ;// 设置附件上传大小 100M
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath  =      '/photo/'; // 设置附件上传目录
			// 上传文件
			$info   =   $upload->upload();
			//print_r($info);exit;
			if(!$info) {// 上传错误提示错误信息
				$this->error($upload->getError());
			}else{// 上传成功
				foreach($info as $v){
					$path = "/Uploads".$v['savepath'].$v['savename'];
					//echo $path;exit;
					$data = array(
						'cate' 	   => I('post.cate'),
						'img'      => $path,
						'add_time' => date('Y-m-d H:i:s',time())
					);
					$this->photo->add($data);
				}
				$num = $this->photo->where("cate='".$name."' AND is_recycle='no'")->count();
				$data = array(
					"number" => $num
				);
				$this->ph->where('name="'.$name.'"')->save($data);
				$this->success('上传成功！');
			}
		}
		//var_dump("cate=".$name);exit;
		$all = $this->photo->where("cate='".$name."' AND is_recycle='no'")->select();
		$this->assign("all",$all);
		$this->assign("name",$name);
		$this->display();
	}
	
	public function photodel(){
		$id = I('get.id');
		$data = array("is_recycle" => "yes");
		$this->photo->where("id=".$id)->save($data);
		
		//修改照片数量
		$name = I('get.name');
		$num = $this->photo->where("cate='".$name."' AND is_recycle='no'")->count();
		$data = array(
				"number" => $num
		);
		$this->ph->where('name="'.$name.'"')->save($data);
	}
	
	public function photoshow(){
		$id = I('get.id');
		$show = I('get.is_show');
		//echo $show;exit;
		if($show === 'yes'){
			$data = array("is_show" => "no");
			$this->photo->where("id=".$id)->save($data);
			echo 'no';
		}else{
			$data = array("is_show" => "yes");
			$this->photo->where("id=".$id)->save($data);
			echo 'yes';
		}
		
	}
}