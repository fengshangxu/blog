<?php
//分页
function paging($Model,$where,$page=1,$limit=4){
    $count = $Model->where($where)->count();
    $Page  = new \Think\Page($count,$limit);
    $list = $Model->where($where)->page($page,$limit)->select();
    $data = array(
        'list'=>$list,
        'page'=>$Page->show()
    );
    return $data;
}
?>