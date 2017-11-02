<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>账号注册</title>
	<link rel="stylesheet" href="/blog/Public/Admin/styles/style.css" />
</head>
<body class="login">
<div class="top">
	<h1 class="left">欢迎注册</h1>
</div>
<div class="box">
	<h1>账号注册</h1>
	<form action="<?php echo U('Home/Index/reg');?>" method="post">
		<table>
			<div id = "div" style="color:red;"></div>
			<tr><th width="80">用户名：</th><td><input class="input" type="text" name="username" required /></td></tr>
			<tr><th>密　码：</th><td><input class="input" type="password" name="password" required /></td></tr>
			<tr><th>验证码：</th><td><input class="input" type="text" name="verify"  /></td></tr>
			<tr><td> </td><td ><img src="<?php echo U('Home/Index/verify');?>" id="verify_img" title="点击刷新验证码" /></td></tr>
			<tr><td> </td><td><input class="login_btn" type="submit" value="注册" /></td></tr>
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
			url : "<?php echo U('Home/Index/checkUser1','','');?>/username/"+username,
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
		this.setAttribute('src',"<?php echo U('Home/Index/verify');?>?id="+parseInt(Math.random()*1000));
	}
	
</script>
</body>
</html>