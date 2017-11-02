<?php
namespace Admin\Controller;
use Think\Controller;
class CateController extends AdminController {
   public function catelist(){
   		$list = M('Cate')->where(array('status'=>1))->select();
   		$list = D('Cate')->getTree($list);
   		$this->assign('cat',$list);
		$this->display();
    }

    public function create(){
    	$id = I('id',0,'intval');
    	$model = D('Cate');
    	if($id){
    		$find = $model->where('id='.$id)->find();
    	}
    	$this->assign('cat',$model->getTree(M('cate')->where('status=1')->select()));
    	$this->assign('find',$find);
    	$this->display();
    }
	public function cateadd(){
		if(IS_POST){
			$model = D('Cate');
			$id = I('id',0,'intval');
			$pid = I('pid',0,'intval');
			if($model->create()){
				if($pid){
					$model->lev = $model->where('id='.$pid)->getField('lev')+1;
				}
				if($id){
					$str = '修改';
					$res = $model->save();
				}else{
					$str = '添加';
					$res = $model->add();
				}

				if ($res) {
                    $this->success( $str."成功" ,U('Cate/catelist'));
                } else {
                    $this->error( $str."失败" );
                }

			}else{
				$this->error($model->getError());
			}

		}else{
			$this->error('数据错误');
		}
    }


	public function catedel(){
		$cat = D('Cate');
		$id = I('get.id');
		if($cat->getTree(M('Cate')->where(array('status'=>1))->select(),$id)){
			$this->error('不能删除，该类有子类请先删除其子类');
		}else{
			$cat->delete($id);
			redirect('catelist', 1, '删除成功，页面跳转中...');
		}
	}
}