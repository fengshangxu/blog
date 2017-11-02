<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>后台登录</title>
	<link rel="stylesheet" href="/blog/Public/Admin/styles/style.css" />
</head>
<body class="login">
<div class="top">
	<h1 class="left">个人博客<span>后台管理系统</span></h1>
</div>
<div class="box">
	<h1>欢迎访问后台</h1>
	<form action="<?php echo U('Admin/Admin/index');?>" method="post">
		<table>
			<div id = "div" style="color:red;"></div>
			<tr><th width="80">用户名：</th><td><input class="input" type="text" name="username" required /></td></tr>
			<tr><th>密　码：</th><td><input class="input" type="password" name="password" required /></td></tr>
			<tr><th>验证码：</th><td><input class="input" type="text" name="verify"  /></td></tr>
			<tr><td> </td><td ><img src="<?php echo U('Admin/Admin/verify');?>" id="verify_img" title="点击刷新验证码" /></td></tr>
			<tr><td> </td><td><input class="login_btn" type="submit" value="登录" /></td></tr>
		</table>
	</form>
</div>
<script src="/blog/Public/Common/jquery.min.js"></script>
<script>
	//得到焦点时间	
	$('.input').eq(0).blur(function(){
		var username = $(this).val();
		//alert(username);
		$.ajax({
			type : 'get',
			url : "<?php echo U('Admin/Admin/checkUser','','');?>/username/"+username,
			success : function(data){
				$('#div').html(data);
			}
		});		
	});
	//失去焦点事件
	$('.input').eq(0).focus(function(){
		$('#div').html("");
	});
	
	var img = document.getElementById('verify_img');
	//console.log(img);
	img.onclick = function(){
		//this.setAttribute('src',"<?php echo U('Admin/Admin/verify');?>/id/"+parseInt(Math.random()*1000));//这种传参方法不行
		this.setAttribute('src',"<?php echo U('Admin/Admin/verify');?>?id="+parseInt(Math.random()*1000));
	}
	
</script>
</body>
</html>