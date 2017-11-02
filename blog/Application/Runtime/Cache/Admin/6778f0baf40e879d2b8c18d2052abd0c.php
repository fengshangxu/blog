<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP Menu</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/blog/Public/admin/styles/general.css" rel="stylesheet" type="text/css" />

<style type="text/css">
body {
  background: #80BDCB;
}
#tabbar-div {
  background: #278296;
  padding-left: 10px;
  height: 21px;
  padding-top: 0px;
}
#tabbar-div p {
  margin: 1px 0 0 0;
}
.tab-front {
  background: #80BDCB;
  line-height: 20px;
  font-weight: bold;
  padding: 4px 15px 4px 18px;
  border-right: 2px solid #335b64;
  cursor: hand;
  cursor: pointer;
}
.tab-back {
  color: #F4FAFB;
  line-height: 20px;
  padding: 4px 15px 4px 18px;
  cursor: hand;
  cursor: pointer;
}
.tab-hover {
  color: #F4FAFB;
  line-height: 20px;
  padding: 4px 15px 4px 18px;
  cursor: hand;
  cursor: pointer;
  background: #2F9DB5;
}
#top-div
{
  padding: 3px 0 2px;
  background: #BBDDE5;
  margin: 5px;
  text-align: center;
}
#main-div {
  border: 1px solid #345C65;
  padding: 5px;
  margin: 5px;
  background: #FFF;
}
#menu-list {
  padding: 0;
  margin: 0;
}
#menu-list ul {
  padding: 0;
  margin: 0;
  list-style-type: none;
  color: #335B64;
}
#menu-list li {
  padding-left: 16px;
  line-height: 16px;
  cursor: hand;
  cursor: pointer;
}
#main-div a:visited, #menu-list a:link, #menu-list a:hover {
  color: #335B64
  text-decoration: none;
}
#menu-list a:active {
  color: #EB8A3D;
}
.explode {
  background: url("/blog/Public/Admin/images/menu_minus.gif") no-repeat 0px 3px;
  font-weight: bold;
}
.collapse {
  background: url(/blog/Public/admin/images/menu_plus.gif) no-repeat 0px 3px;
  font-weight: bold;
}
.menu-item {
  background: url(/blog/Public/admin/images/menu_arrow.gif) no-repeat 0px 3px;
  font-weight: normal;
}
#help-title {
  font-size: 14px;
  color: #000080;
  margin: 5px 0;
  padding: 0px;
}
#help-content {
  margin: 0;
  padding: 0;
}
.tips {
  color: #CC0000;
}
.link {
  color: #000099;
}
</style>

</head>
<body>
<div id="tabbar-div">
<p><span style="float:right; padding: 3px 5px;" ><a href="#"><img id="toggleImg" src="/blog/Public/admin/images/menu_minus.gif" width="9" height="9" border="0" alt="闭合" /></a></span>

  <span class="tab-front" id="menu-tab">菜单</span>
</p>
</div>
<div id="main-div">
<div id="menu-list">
<ul>  
<li class="explode" key="02_cat_and_goods" name="menu">
    前端       <ul>
          <li class="menu-item"><a href="<?php echo U('Home/Index/index');?>" target="_blank">首页</a></li>
          <li class="menu-item"><a href="<?php echo U('Home/Message/message');?>" target="_blank">留言板</a></li>
        </ul>
      </li>
  <li class="explode" key="02_cat_and_goods" name="menu">
    文章管理        <ul>
          <li class="menu-item"><a href="<?php echo U('Admin/Article/articlelist');?>" target="main-frame">文章列表</a></li>
          <li class="menu-item"><a href="<?php echo U('Admin/Article/articleadd');?>" target="main-frame">添加新文章</a></li>

          <li class="menu-item"><a href="<?php echo U('Admin/Cate/catelist');?>" target="main-frame">文章分类</a></li>
        </ul>
      </li>
         <li class="explode" key="02_cat_and_goods" name="menu">
    相册管理        <ul>
          <li class="menu-item"><a href="<?php echo U('Admin/Photo/photolist');?>" target="main-frame">相册列表</a></li>
          <li class="menu-item"><a href="<?php echo U('Admin/Photo/albumadd');?>" target="main-frame">添加相册</a></li>
        </ul>
      </li>
      <li class="explode" key="02_cat_and_goods" name="menu">
    说说管理        <ul>
          <li class="menu-item"><a href="<?php echo U('Admin/Say/saylist');?>" target="main-frame">说说列表</a></li>
          <li class="menu-item"><a href="<?php echo U('Admin/Say/sayadd');?>" target="main-frame">添加新说说</a></li>
        </ul>
      </li>

<!--   <li class="explode" key="04_order" name="menu">
    订单管理        <ul>
          <li class="menu-item"><a href="#" target="main-frame">订单列表</a></li>
        </ul>
      </li> -->
  <li class="explode" key="04_order" name="menu">
    会员管理        <ul>
          <li class="menu-item"><a href="#" target="main-frame">会员列表</a></li>
        </ul>
      </li>
  <li class="explode" key="04_order" name="menu">
    文章回收站        <ul>
          <li class="menu-item"><a href="<?php echo U('Admin/Article/articlerecycle');?>" target="main-frame">回收文章</a></li>
        </ul>
      </li>
</ul>
</div>
<div id="help-div" style="display:none">
<h1 id="help-title"></h1>

<div id="help-content"></div>
</div>
</div>


</body>
</html>