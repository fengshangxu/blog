<?php if (!defined('THINK_PATH')) exit();?><!-- $Id: goods_info.htm 17126 2010-04-23 10:30:26Z liuhui $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 添加新文章 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/blog/Public/admin/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/blog/Public/admin/styles/main.css" rel="stylesheet" type="text/css" />
  <style type="text/css">	
	li{
		list-style:none;
		width:200px;
		height:200px;
		float:left;
		margin:10px 10px;
	}
	a{
		font-size:16px;
		cursor:pointer;	
	}
	
  </style>
</head>
<body>

<h1>
<span class="action-span"><a href="<?php echo U('Admin/Photo/photolist');?>">相册列表</a></span>
<span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加新文章 </span>
<div style="clear:both"></div>
</h1>

<!-- start goods form -->
<div class="tab-div">
 	<div id="tabbody-div">
      <form enctype="multipart/form-data" action="<?php echo U('Admin/Photo/photoadd');?>" method="post" id="theForm" >
     
        <table width="90%" id="general-table" align="center">
          <tr>
            <td class="label">上传图片：</td>
            <td>
              <input type="file" name="img[]" multiple="multiple" size="35" />
            </td>
          </tr>
        </table>             
        <div class="button-div">
        <input type="submit" value=" 确定 " class="button" />
        <input type="hidden" name='cate'  value='<?php echo ($name); ?>'/>
        </div>
      </form>
    </div>
		<ul>
		<?php if(is_array($all)): foreach($all as $key=>$v): ?><li>
				<img width="200px" height="200px;" src="/blog<?php echo ($v['img']); ?>"><br>
				<a class='del' ajaxid="<?php echo ($v['id']); ?>" cate='<?php echo ($v["cate"]); ?>'>删除</a>&nbsp;&nbsp;<a class='show' ajaxid="<?php echo ($v['id']); ?>" show="<?php echo ($v['is_show']); ?>">前台显示(<?php echo ($v['is_show']); ?>)</a>
			</li><?php endforeach; endif; ?>
			<div style="clear:both;"></div>
		</ul>
		<script src="/blog/Public/common/jquery.min.js"></script>
		<script>
			$('.del').click(function(){
				var $this = $(this);
				var name = $(this).attr("cate");
				//alert(name);
				var id = $(this).attr("ajaxid");
				//console.log(id);
				$.ajax({
					type:"get",
					url:'<?php echo U("Admin/Photo/photodel");?>?id='+id+"&name="+name,
					success:function(data){
						$this.parent().remove();
					}
				});		
			});
			
			$('.show').click(function(){
				var $this = $(this);
				var show = $(this).attr("show");
				var id = $(this).attr("ajaxid");
				//console.log(id);
				$.ajax({
					type:"get",
					url:'<?php echo U("Admin/Photo/photoshow");?>?id='+id+'&is_show='+show,
					success:function(data){
						$this.text('前台显示('+data+')');
					}
				});		
			});
		</script>
	</div> 
<!-- end goods form -->

</body>
</html>