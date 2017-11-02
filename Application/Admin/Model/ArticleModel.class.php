<?php
namespace Admin\Model;
use Think\Model;
class ArticleModel extends Model{
	protected $_validate = array(
		array('article_name','','文章名不能为空！',1,'notequal',3),
		array('article_author','','请填写作者名',1,'notequal',3),
		array('category_id','is_category_id','不存在的分类！',1,'callback',3),
        array('img',0,'请选择图片',1,'notequal',3)
	);
	protected $_auto = array (
		array('create_time','time',1,'function'),
		array('update_time','time',3,'function'),
	);
	public function is_category_id($category_id){
		if($category_id == 0)
			return true;
		return M('cate')->where('id='.$category_id)->find()?true:false;
	}
	public function paging($limit=7){
	    $where = array('is_delete'=>0);
	    $count = $this->where("is_delete='0'")->count();
        $Page  = new \Think\Page($count,$limit);
        return $Page->show();
    }
}
?>