<?php if (!defined('THINK_PATH')) exit();?><!-- $Id: goods_info.htm 17126 2010-04-23 10:30:26Z liuhui $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 添加新文章 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/blog/Public/admin/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/blog/Public/admin/styles/main.css" rel="stylesheet" type="text/css" />

</head>
<body>

<h1>
<span class="action-span"><a href="<?php echo U('Admin/article/articlelist');?>">文章列表</a></span>
<span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加新文章 </span>
<div style="clear:both"></div>
</h1>

<!-- start goods form -->
<div class="tab-div">
    <!-- tab bar -->
    <div id="tabbar-div">
      <p>
        <span class="tab-front" id="general-tab" onclick="charea('general');">通用信息</span>

      </p>
    </div>

    <!-- tab body -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" action="<?php echo U('Admin/Article/articleedit');?>" method="post" name="theForm" >
        <!-- 最大文件限制 -->
        <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
        <!-- 通用信息 -->
        <table width="90%" id="general-table" align="center">
          <tr>
            <td class="label">文章名称：</td>
            <td><input type="text" name="article_name" value="<?php echo ($info['article_name']); ?>" style="float:left;color:;" size="30" /></td>
          </tr>
          <tr>
            <td class="label"> 文章作者： </td>
            <td><input type="text" name="article_author" value="<?php echo ($info['article_author']); ?>" size="20"  />
        </td>
          </tr>
          <tr>
            <td class="label">文章分类：</td>
            <td><select name="cat_id"  >
                <option value="0">请选择...</option>
                       <?php if(is_array($cat)): foreach($cat as $key=>$v): if($v["id"] == $info["cate_id"]): ?><option value="<?php echo ($v['id']); ?>" selected><?php echo str_repeat('-- ',$v['lev']),$v['name']; ?>
                       </option>
                       <?php else: ?> <option value="<?php echo ($v['id']); ?>"><?php echo str_repeat('-- ',$v['lev']),$v['name']; ?>
                       </option><?php endif; endforeach; endif; ?>
            </select>
             </td>
          </tr>    
		   <tr>
            <td class="label">文章内容：</td>
            <td>
				<textarea name="article_content" id="container" style="width:500px;" ><?php echo ($info['article_content']); ?></textarea>
				<!-- 配置文件 -->
				<script type="text/javascript" src="/blog/Public/Common/ueditor/ueditor.config.js"></script>
				<!-- 编辑器源码文件 -->
				<script type="text/javascript" src="/blog/Public/Common/ueditor/ueditor.all.js"></script>
				<!-- 实例化编辑器 -->
				<script type="text/javascript">
					var ue = UE.getEditor('container');
				</script>
            </td>
          </tr>
          <tr>
            <td class="label">旧的图片：</td>
            <td>
              <img width="200px" src='/blog/Public/../<?php echo ($info["article_img"]); ?>'/>
            </td>
          </tr>
          <tr>
            <td class="label">新的图片：</td>
            <td>
              <input type="file" name="article_img" size="35" />
            </td>
          </tr>
        </table>             
        <div class="button-div">
          <input type="hidden" name="id" value="<?php echo ($info['id']); ?>" />
        <input type="submit" value=" 确定 " class="button" />
          <input type="reset" value=" 重置 " class="button" />
        </div>
        <input type="hidden" name="img" value="<?php echo ($info["article_img"]); ?>" />
      </form>
    </div>
</div>
<!-- end goods form -->

</body>
</html>