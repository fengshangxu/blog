<?php
namespace Admin\Model;
use Think\Model;
class ArticleModel extends Model {
	
	//����ͼƬ����ͼ  ͼƬ������
	public function image($path){
		$image = new \Think\Image();
			$image->open($path);
			$name = substr($path,strrpos($path,"/"));
			//[article_img] => /Uploads/2017-04-15/58f1b3a3e5501.jpg
			// ����ԭͼ�ı�������һ�����Ϊ150*150������ͼ������Ϊthumb.jpg
			$image->thumb(50,30)->save('__PUBLIC__/../Uploads/thumb'.$name);
			
			$path = '/Uploads/thumb'.$name;	
		return $path;
	}
	
	public function getName($cate_id){
		$cat = D("Cate");
		$name = $cat->where("id=".$cate_id)->getField("name");
		return $name;
	}
}