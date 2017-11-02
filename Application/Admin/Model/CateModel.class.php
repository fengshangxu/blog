<?php
namespace Admin\Model;
use Think\Model;
class CateModel extends Model{
	protected $_validate = array(
		array('cate_name','','名称不能为空！',1,'notequal',3),
		array('cate_name','','该分类名已经存在！',1,'unique',3),
		array('pid','is_pid','不存在的父类id！',1,'callback',3)
	);
	protected $_auto = array (
		array('create_time','time',1,'function'),
		array('update_time','time',3,'function'),
	);
	public function is_pid($pid){
		if($pid == 0)
			return true;
		return M('cate')->where('id='.$pid)->find()?true:false;
	}
	public function getTree($arr,$pid=0){
		$t = array();
		foreach ($arr as $v) {
			if($v['pid']==$pid){
				$t[] = $v;
				$t = array_merge($t,$this->getTree($arr,$v['id']));
			}
		}
		return $t;
	}	
}
?>