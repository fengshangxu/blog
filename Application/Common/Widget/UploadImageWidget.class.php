<?php 
namespace Common\Widget;
use Think\Controller;
class UploadImageWidget extends Controller {
	public function render($arr=array()){
		if($arr['type'] == 'article'){
			if($arr['id']){
				$url =__ROOT__. M('picture')->where('id = '.$arr['id'])->getField('path');
			}else{
				$url = "/blog/Public/Common/images/add.png";
			}
		}elseif($arr['type'] == 'home_article'){
            if($arr['id']){
                $url =__ROOT__. M('picture')->where('id = '.$arr['id'])->getField('path');
            }else{
                $url = "/blog/Public/Home/images/001.png";
            }
        }
		$this->assign('url',$url);
		$this->display(T('Application://Common@Widget/uploadImage'));
	}	
}
?>