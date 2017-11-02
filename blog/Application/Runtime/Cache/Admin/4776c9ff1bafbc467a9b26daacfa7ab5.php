<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 文章列表 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/blog/Public/admin/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/blog/Public/admin/styles/main.css" rel="stylesheet" type="text/css" />
<style>
.pagelist{line-height:14px;margin-top:20px;}
.pagelist a{padding:5px 8px;margin:0 2px;display:inline-block;border:1px solid #ccc;background:#fff;}
.pagelist a:hover{text-decoration:none;background:#eee;}
.pagelist span{padding:5px 8px;margin:0 2px;}
</style>
</head>
<body>

<h1>
<span class="action-span"><a href="<?php echo U('Admin/Say/sayadd');?>">添加新说说</a></span>
<span class="action-span1"><a href="#">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 文章列表 </span>
<div style="clear:both"></div>
</h1>
<form method="post" action="" name="listForm" >

  <div class="list-div" id="listDiv">
<table cellpadding="3" cellspacing="1">
  <tr>
    <th style="width:50px;">编号  </th>
    <th >说说内容</th>
    <th>添加时间</th>
	<th>是否前台显示</th>
  <tr>
   <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
	    <td><?php echo ($v["id"]); ?></td>
		<td align="center"><?php echo ($v["content"]); ?></td>	   
	    <td align="center"><?php echo ($v["add_time"]); ?></td>
	    <td align="center"><a class="ajax" ajaxid=<?php echo ($v["id"]); ?> style="cursor:pointer"><?php echo ($v["is_show"]); ?></a></td>
	  </tr><?php endforeach; endif; ?>
   <script src="/blog/Public/Common/jquery.min.js"></script>
   <script>
   $(".ajax").click(function(){
		var id = $(this).attr("ajaxid");
		var content = $(this).text();
		var $this = $(this);
		console.log(content);
		console.log(id);
  		$.ajax({
  			type:'GET',
  			url:'<?php echo U("Admin/Say/sayedit","","");?>/id/'+id+"/content/"+content,
  			success:function(data){
  				$this.text(data);
  			}
  		});
   });
   </script>
      </table>

<table id="page-table" cellspacing="0">
  <tr>
    <td align="right" nowrap="true">
    <div class="pagelist"><?php echo ($page); ?></div> 
    </td>
  </tr>

</table>

</div>
</form>

<div id="footer">
共执行 7 个查询，用时 0.112141 秒，Gzip 已禁用，内存占用 3.085 MB<br />
版权所有 &copy; 2005-2010 上海商派网络科技有限公司，并保留所有权利。</div>
</body>
</html>