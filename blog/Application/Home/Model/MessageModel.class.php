<?php
namespace Home\Model;
use Think\Model;
class MessageModel extends Model {
	//取出留言下面的回复留言
	public function msgTree($arr,$pid=0){
		$t=array();
		foreach($arr as $v){
			if($v['pid'] == $pid){
				$t[] = $v;
				$t = array_merge($t,$this->msgTree($arr,$v['id']));
					
			}
		}
		return $t;
	}
	
	//传入所有留言二维数组$list 和所有$pid=0的二维数组 返回$a为一个四维数组
	public function getSon($list,$arr){
		$a = array();
		foreach($arr as $v){
			$v[] = $this->msgTree($list,$v['id']);
			$a[] = $v;
		}
		return $a;
	}
	/*
	[1] => Array
	(
			[id] => 2
			[username] => feng
			[content] => &lt;p&gt;111111&lt;/p&gt;
			[top_img] => /Uploads/top/100.jpg
			[add_time] => 2017-04-20 09:04:42
			[pid] => 0
			[0] => Array(
					[0] => Array
					(
							[id] => 49
							[username] => feng
							[content] => 天好烂
							[top_img] => /Uploads/top/100.jpg
							[add_time] => 2017-04-20 15:04:51
							[pid] => 2
					)
	
					[1] => Array
					(
							[id] => 51
							[username] => feng
							[content] => 蓝蓝的
							[top_img] => /Uploads/top/100.jpg
							[add_time] => 2017-04-20 15:04:19
							[pid] => 49
					)
			
					[2] => Array
					(
							[id] => 50
							[username] => feng
							[content] => 也很大
							[top_img] => /Uploads/top/100.jpg
							[add_time] => 2017-04-20 15:04:08
							[pid] => 2
					)
			
					[3] => Array
					(
							[id] => 52
							[username] => feng
							[content] => 11111
							[top_img] => /Uploads/top/100.jpg
							[add_time] => 2017-04-20 15:04:31
							[pid] => 50
					)
			
					[4] => Array
					(
							[id] => 53
							[username] => feng
							[content] => 2121
							[top_img] => /Uploads/top/100.jpg
							[add_time] => 2017-04-20 15:04:24
							[pid] => 50
					)
			
					[5] => Array
					(
							[id] => 54
							[username] => feng
							[content] => 11111
							[top_img] => /Uploads/top/100.jpg
							[add_time] => 2017-04-20 16:04:58
							[pid] => 50
					)
			
					[6] => Array
					(
							[id] => 55
							[username] => feng
							[content] => 秀群
							[top_img] => /Uploads/top/100.jpg
							[add_time] => 2017-04-20 16:04:11
							[pid] => 54
					)
	
				)
	
	)
	*/
	
}