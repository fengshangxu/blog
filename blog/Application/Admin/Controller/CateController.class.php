<?php
namespace Admin\Controller;
use Think\Controller;
class CateController extends Controller {
   public function catelist(){
   		if(isset($_COOKIE['username'])){
			$cat = D('cate');
			$this->assign('cat',$cat->getTree( $cat->getAll() ));
			$this->display();
		}else{
			$this->error('非法访问');
		}
    }


	 public function cateadd(){
	 	if(isset($_COOKIE['username'])){
			//print_r(I('post.return'));exit;
			$cat = D('cate');
			
			//利用自动验证解决刷新一次 提交一次问题；
			if($cat->create()){
				$data['pid'] = I('post.pid');
				$data['name'] = I('post.name');
				$cat->data($data)->add();
			}

			$this->assign('cat',$cat->getTree( $cat->getAll() ));
			$this->display();
		}else{
			$this->error('非法访问');
		}
    }


	public function catedit(){
		if(isset($_COOKIE['username'])){
			$cat = D('cate');
			$id = I('get.id');
			//echo $id;exit;
			
			$this->assign('cat',$cat->getTree( $cat->getAll() ));
			$this->assign('row',$cat->find($id));
			
			$this->display();
			
			//$postid = I('post.id');
			if(IS_POST){//防止刚进入SQL语句报错
				//print_r($cat->getTree($cat->getAll(),$postid));exit;
				if($cat->getTree($cat->getAll(),I('post.id'))){
					//$this->error('修改失败，该类有子类请先修改其子类');
					redirect('cateedit', 2, '修改失败，该类有子类请先修改其子类');
				}else{
					$data['name'] = I('post.name');
					$data['pid'] = I('post.pid');
					$postid = I('post.id');
					$cat->where("id=".$postid)->save($data);
					redirect('catelist', 2, '修改成功，页面跳转中...');
				}
			}
		}else{
			$this->error('非法访问');
		}
	}

	public function catedel(){
		if(isset($_COOKIE['username'])){
			$cat = D('cate');
			$id = I('get.id');
			if($cat->getTree($cat->getAll(),$id)){
				$this->error('不能删除，该类有子类请先删除其子类');
			}else{
				$cat->delete($id);
				redirect('catelist', 1, '删除成功，页面跳转中...');
			}
		}else{
			$this->error('非法访问');
		}
	}
}