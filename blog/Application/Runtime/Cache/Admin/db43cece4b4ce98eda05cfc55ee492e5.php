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
<span class="action-span"><a href="<?php echo U('Admin/Article/articleadd');?>">添加新文章</a></span>
<span class="action-span1"><a href="#">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 文章列表 </span>
<div style="clear:both"></div>
</h1>
<form method="post" action="" name="listForm" >

  <div class="list-div" id="listDiv">
<table cellpadding="3" cellspacing="1">
  <tr>
    <th>
      编号  </th>

    <th>文章名称</th>
    <th>文章分类</th>
    <th>文章作者</th>
    <th>文章图片</th>
    <th>添加时间</th>
        <th>操作</th>
  <tr>
   <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
	    <td><?php echo ($v["id"]); ?></td>
	
	    <td class="first-cell" style=""><span ><a href="<?php echo U('Admin/Article/info',array('id'=>$v['id']));?>"><?php echo ($v["article_name"]); ?></a></span></td>
	    <td><span ><?php echo ($v["cate_name"]); ?></span></td>
	    <td align="right"><span ><?php echo ($v["article_author"]); ?></span></td>
	    <td align="center"><img src="/blog/Public/..<?php echo ($v["article_img"]); ?>"  /></td>
	    <td align="center"><?php echo ($v["add_time"]); ?></td>
	   
	        <td align="center">
	      <a href="<?php echo U('Admin/Article/info',array('id'=>$v['id']));?>" target="_blank" title="查看"><img src="/blog/Public/admin/images/icon_view.gif" width="16" height="16" border="0" /></a>
	      <a href="<?php echo U('Admin/Article/articleedit',array('id'=>$v['id']));?>" title="编辑"><img src="/blog/Public/admin/images/icon_edit.gif" width="16" height="16" border="0" /></a>
	      <a style="cursor: pointer" class="ajax" ajaxid="<?php echo ($v['id']); ?>" title="回收站"><img src="/blog/Public/admin/images/icon_trash.gif" width="16" height="16" border="0" /></a>
          </td>
	  </tr><?php endforeach; endif; ?>
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
<script src="/blog/Public/common/jquery.min.js"></script>
<script>
	$('.ajax').click(function(){
		var $this = $(this);
		var id = $(this).attr("ajaxid");
		//console.log(id);
		$.ajax({
			type:"get",
			url:'<?php echo U("Admin/Article/recycle");?>?id='+id,
			success:function(data){
				$this.parent().parent().remove();
			}
		});		
	});
</script>
<div id="footer">
共执行 7 个查询，用时 0.112141 秒，Gzip 已禁用，内存占用 3.085 MB<br />
版权所有 &copy; 2005-2010 上海商派网络科技有限公司，并保留所有权利。</div>
</body>
</html>