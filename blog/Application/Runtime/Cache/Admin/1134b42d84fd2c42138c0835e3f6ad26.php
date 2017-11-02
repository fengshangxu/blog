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
<span class="action-span"><a href="<?php echo U('Admin/Say/saylist');?>">说说列表</a></span>
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
      <form action="<?php echo U('Admin/Say/sayadd');?>" method="post" name="theForm" >

        <!-- 通用信息 -->
        <table width="90%" id="general-table" align="center">
         
		   <tr>
            <td class="label">说说内容：</td>
            <td>
				<textarea name="content" id="container" style="width:300px;height:200px;font-size:18px;"maxlength="100"></textarea>				
            </td>
          </tr>
        </table>             
        <div class="button-div">
        <input type="submit" value=" 确定 " class="button" />
          <input type="reset" value=" 重置 " class="button" />
        </div>
        <input type="hidden" name="act" value="insert" />
      </form>
    </div>
</div>
<!-- end goods form -->

</body>
</html>