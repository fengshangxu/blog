<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo ($info['article_name']); ?></title>
</head>
<body>
	<a href="javascript:history.go(-1);" style="text-decoration:none;color:RED;">文章列表</a>
	<h2 style="width:300px;margin:50px auto;"><?php echo ($info['article_name']); ?></h2>
	<h4 style="width:200px;margin:50px auto;"><?php echo ($info['author']); ?></h4>
	<div style="width:800px;margin:0 auto;"><?php echo (htmlspecialchars_decode($info['content'])); ?></div>
</body>
</html>