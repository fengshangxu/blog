<?php
namespace Admin\Controller;
use Admin\Controller;
class ArticleController extends AdminController {
    public function articlelist($limit=5){
        $r = I('get.p',1,'intval');
    	$pic = M('picture');
    	$list = M('article')->where("is_delete='0'")->page($r,$limit)->select();
    	$page = D('article')->paging($limit);
    	foreach($list as &$v){
    		$v['img'] = $pic->where('id='.$v['img'])->getField('path');
    	}
    	$this->assign('page',$page);
    	$this->assign('list',$list);
	    $this->display();
	}

	public function articleadd(){
		$cat = D('Cate');
		$art = D('Article');
		$id = I('post.id',0,'intval');
		$cat = $cat->getTree(M('Cate')->where(array('status'=>1))->select(),0);
		$post = I('post.');

		if(IS_POST){
			if(!$art->create()){
				$this->error($art->getError(),'',1);
			}
			$data = array(
				'article_name'=>I('post.article_name'),
			    'category_id' =>I('post.category_id'),
                'content'     =>I('post.article_content',''),
                'author'      =>I('post.article_author'),
                'img'         =>I('post.img',0,'intval'),
                'create_time' =>time()
            );
			if($id){
                $res = $art->where('id='.$id)->save($data);
                $str = "修改";
            }else{
			    $res = $art->add($data);
                $str = "添加";
            }
            if($res){
                $this->success($str.'成功',U('Admin/Article/articlelist'),1);
            }else{
                $this->error($str.'失败','',1);
            }
		}

        $this->assign('cat',$cat);
		$this->display();		
	}
	public function img_upload(){
		$upload = new \Think\Upload();  
		$upload->maxSize   =     5*1024*1024 ; 
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');
		$upload->savePath  =      '/';
		$where = array('md5'=>md5_file($_FILES['article_img']['tmp_name']),'sha1'=>sha1_file($_FILES['article_img']['tmp_name']));
		if($res = M('picture')->where($where)->find()){
			$ajaxReturn=array('status'=>1,'info'=>'上传成功','path'=>$res['path'],'id'=>$res['id']);
			$this->ajaxReturn($ajaxReturn);
		}
		$info   =   $upload->upload();    
		if(!$info) {
			$ajaxReturn = array('status'=>0,'info'=>$upload->getError());
		}else{
			$path = "/Uploads".$info['article_img']['savepath'].$info['article_img']['savename'];

			// $image = new \Think\Image(); 
			// $image->open($path);
			// $image->thumb(100, 100)->save("/Uploads".$info['article_img']['savepath']."thumb_".$info['article_img']['savename']);

			$where['path'] = $path;
			$where['create_time'] = time();
			if($id = M('picture')->add($where)){
				$ajaxReturn = array('status'=>1,'info'=>'上传成功','path'=>$path,'id'=>$id);
			}else{
				$ajaxReturn = array('status'=>0,'info'=>'上传失败');
			}
			
		}
		$this->ajaxReturn($ajaxReturn);
	}
	public function info(){
        $id = I('get.id');
        $art = D('Article');
        $info = $art->where("id=".$id)->field('article_name,author,content')->find();
        //print_r($info);exit;
        $this->assign('info',$info);
        $this->display();
	}
	
	public function articleedit(){
        $cat = D('cate');
        $art = D('Article');
        $id = I('get.id',0,'intval');
        $info = $art->where('is_delete="0" AND id='.$id)->find();

        $cat = $cat->getTree(M('Cate')->where(array('status'=>1))->select(),0);
        $this->assign('cat',$cat);
        $this->assign('info',$info);
        $this->display();
	}
	
	public function delete(){
        $art = D('Article'); // 实例化Article对象
        $id = I('get.id',0,'intval');
        if(!$id){
            $this->error('删除错误');
        }
        $res = $art->where('id='.$id)->save(array('is_delete'=>1));
        if($res){
            $this->ajaxReturn(array('info'=>'删除成功','status'=>1));
        }else{
            $this->ajaxReturn(array('info'=>'删除失败','status'=>0));
        }
	}
}