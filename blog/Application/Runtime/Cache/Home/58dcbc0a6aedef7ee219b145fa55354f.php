<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo ($info['article_name']); ?></title>
</head>
<body>
	<a href="<?php echo U('Home/Index/Index');?>" style="text-decoration:none;color:RED;">回到首页</a>
	<h2 style="width:300px;margin:50px auto;"><?php echo ($info['article_name']); ?></h2>
	<h4 style="width:200px;margin:50px auto;"><?php echo ($info['article_author']); ?></h4>
	<div style="width:800px;margin:0 auto;"><?php echo (htmlspecialchars_decode($info['article_content'])); ?></div>
</body>
</html>