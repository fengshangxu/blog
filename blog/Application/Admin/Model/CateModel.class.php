<?php
namespace Admin\Model;
use Think\Model;
class CateModel extends Model {
	 protected $_validate = array(
		array('name','','类名不能重复',0,'unique',3),	 
	 );
		
		//封装得到所有的函数
		public function getAll(){
			return $this->select();
		}

		//无限极分类
		public function getTree($arr,$pid=0,$lev=0){
			$t = array();
			foreach($arr as $v){
				if($v['pid']==$pid){
					$v['lev'] = $lev;
					$t[] = $v;
					$t = array_merge($t,$this->getTree($arr,$v['id'],$lev+1));
				}
			}
			return $t;
		}
}