<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends Controller {

    public function articlelist(){
    	if(isset($_COOKIE['username'])){
	    	$art = D('Article'); // 实例化Article对象
	    	$count = $art->where("recycle='no'")->count();// 查询满足要求的总记录数
	    	//echo $count;exit;
	    	
	    	$Page = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数3
	    	$show = $Page->show();// 分页显示输出
	    	// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
	    	$list = $art->where("recycle='no'")->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
	    	
	    	//改变$list中图片的路径   变成生成的缩略图的路径
	    	foreach ($list as $v){
	    		$path = "__PUBLIC__/..".$v['article_img'];
	    		$v['cate_name'] = $art->getName($v['cate_id']);
	    		$v['article_img'] = $art->image($path);
	    		$arr[] = $v; 
	    	}
	
	    	$this->assign('list',$arr);// 赋值数据集
	    	$this->assign('page',$show);// 赋值分页输出
	
	    	$this->display(); // 输出模板
	    }else{
	    		$this->error('非法访问');
	    }
	}

	public function articleadd(){
		$cat = D('cate');
		$art = D('Article');
		$this->assign('cat',$cat->getTree( $cat->getAll() ));
		if(isset($_COOKIE['username'])){
			if(IS_POST){   
				$upload = new \Think\Upload();// 实例化上传类    
				$upload->maxSize   =     3145728 ;// 设置附件上传大小    
				$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
				$upload->savePath  =      '/'; // 设置附件上传目录    
				// 上传文件     
				$info   =   $upload->upload();    
				if(!$info) {
					// 上传错误提示错误信息        
					$this->error($upload->getError());    
					}else{// 上传成功
						//print_r($info);exit;
						$path = "/Uploads".$info['article_img']['savepath'].$info['article_img']['savename'];
						//echo $path;exit; 
					}
	
				$data = array(
					"article_name"		=>	I('post.article_name'),
					"article_author"	=>	I('post.article_author'),
					"cate_id"			=>	I('post.cat_id'),
					"article_content"	=>	I('post.article_content'),
					"add_time"			=>	date('Y-m-d H:i:s',time()),
					"article_img"		=>	$path
				);
				//print_r($data);exit;
				if(!$art->add($data)){
					$this->error("添加失败");
				}
	
			}
			$this->display();
		}else{
			$this->error('非法访问');
		}
	}

	public function info(){
		if(isset($_COOKIE['username'])){
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
	
	public function articleedit(){
		if(isset($_COOKIE['username'])){
			$cat = D('cate');
			$art = D('Article');
			$id = I('get.id');
			
			
			if(IS_POST){
				$path = null;
				//print_r(!empty($_FILES['article_img']['name']));exit;
				//检测是否有图片被上传  有则删除旧图
				if(!empty($_FILES['article_img']['name'])){
					
					$p = $art->where("id=".I('post.id'))->getField('article_img');
					//print_r($p);exit;/Uploads/2017-04-16/58f2fb1b2b485.jpg
					$p = "__PUBLIC__/..".$p;
					if(!unlink($p)){
						$this->error("旧图片清除失败！");
					}
					
					$upload = new \Think\Upload();// 实例化上传类
					$upload->maxSize   =     3145728 ;// 设置附件上传大小
					$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
					$upload->savePath  =      '/'; // 设置附件上传目录
					// 上传文件
					$info   =   $upload->upload();
					if(!$info) {
						// 上传错误提示错误信息
						$this->error($upload->getError());
					}else{// 上传成功
						//print_r($info);exit;
						$path = "/Uploads".$info['article_img']['savepath'].$info['article_img']['savename'];
						//echo $path;exit;
					}								
				}
				//判断用户是否修改图片  没有修改则还是原来的路径
				$path = $path!==null?$path:I("post.img");
				//echo $path;exit;
	
				$data = array(
						"article_name"		=>	I('post.article_name'),
						"article_author"	=>	I('post.article_author'),
						"cate_id"			=>	I('post.cat_id'),
						"article_content"	=>	I('post.article_content'),
						"add_time"			=>	date('Y-m-d H:i:s',time()),
						"article_img"		=>	$path
				);
				
				//print_r($data);exit;
				if(!$art->where("id=".I('post.id'))->save($data)){
					$this->error("修改失败");
				}
				}else{
				$this->assign('cat',$cat->getTree( $cat->getAll() ));
				$arr = $art->where("id=".$id )->field('id,cate_id,article_name,article_author,article_content,article_img')->find();
				//print_r($arr);exit;
				$this->assign('info',$arr);
				}
				$this->display();
		}else{
			$this->error('非法访问');
		}
	}
	
	public function recycle(){
		if(isset($_COOKIE['username'])){
			$art = D('Article');
			$art->where("id=".I('get.id'))->save(array("recycle"=>"yes"));
		}else{
			$this->error('非法访问');
		}
		
	}
	
	public function articlerecycle(){
		if(isset($_COOKIE['username'])){
			$art = D('Article'); // 实例化Article对象
			$count = $art->where("recycle='yes'")->count();// 查询满足要求的总记录数
			//echo $count;exit;
			 
			$Page = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数3
			$show = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$list = $art->where("recycle='yes'")->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
			 
			//改变$list中图片的路径   变成生成的缩略图的路径
			foreach ($list as $v){
				$path = "__PUBLIC__/..".$v['article_img'];
				$v['cate_name'] = $art->getName($v['cate_id']);
				$v['article_img'] = $art->image($path);
				$arr[] = $v;
			}
			
			$this->assign('list',$arr);// 赋值数据集
			$this->assign('page',$show);// 赋值分页输出
			$this->display();
		}else{
			$this->error('非法访问');
		}
	}
	
	public function recovery(){
		if(isset($_COOKIE['username'])){
			$art = D('Article');
			$art->where("id=".I('get.id'))->save(array("recycle"=>"no"));
		}else{
			$this->error('非法访问');
		}
	}
	
	public function articledel(){
		if(isset($_COOKIE['username'])){
			$art = D('Article');
			$art->where("id=".I('get.id'))->delete();
		}else{
			$this->error('非法访问');
		}
	}
}