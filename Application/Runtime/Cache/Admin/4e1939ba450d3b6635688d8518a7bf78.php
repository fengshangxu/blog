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
      <form id="form" enctype="multipart/form-data" action="<?php echo U('Admin/Article/articleadd',array('id'=>$info['id']));?>" method="post" name="theForm" >
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
            <td><input type="text" name="article_author" value="<?php echo ($info['author']); ?>" size="20"  />
        </td>
          </tr>
          <tr>
            <td class="label">文章分类：</td>
            <td><select name="category_id"  >
                <option value="0">其他</option>
                <?php if(is_array($cat)): foreach($cat as $key=>$v): ?><option value="<?php echo ($v['id']); ?>"  <?php if(($v["id"]) == $info["category_id"]): ?>selected<?php endif; ?>><?php echo str_repeat('—',$v['lev']); echo ($v["cate_name"]); ?>
                    </option><?php endforeach; endif; ?>
            </select>
             </td>
          </tr>    
		   <tr>
            <td class="label">文章内容：</td>
            <td>
				<textarea name="article_content" id="container" style="width:500px;" ><?php echo ($info['content']); ?></textarea>
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
                <td class="label">上传文章图片：</td>
                <td>
                    <input type="hidden" name="img" value=<?php echo ($info['img']); ?>>
                    <input id='img' type="file" name="article_img" size="35" style="display:none" onchange="img_upload()" />
                    <?php echo W('Common/UploadImage/render',array(array('type'=>'article','id'=>$info['img'])));?>
                </td>
                <script>

                    function select_img(){
                        document.getElementById('img').click();
                    }
                    function img_upload(){
                        var fr = document.getElementById('form');
                        var fd = new FormData(fr);
                        var xhr = new XMLHttpRequest();

                        xhr.onreadystatechange=function(){
                            if(this.readyState == 4){
                                var data = eval("("+this.responseText+")");
                                if(data.status){
                                    document.getElementsByName('img')[0].value = data.id;
                                    document.getElementsByClassName('img')[0].src = "/blog"+data.path;
                                }else{
                                    alert(data.info);
                                }
                            }
                        }

                        xhr.open('post','<?php echo U("Admin/Article/img_upload");?>',true);
                        xhr.send(fd);
                    }

                </script>
            </tr>
        </table>             
        <div class="button-div">
          <input type="hidden" name="id" value="<?php echo ($info['id']); ?>" />
        <input type="submit" value=" 确定 " class="button" />
          <input type="reset" value=" 重置 " class="button" />
        </div>

      </form>
    </div>
</div>
<!-- end goods form -->

</body>
</html>