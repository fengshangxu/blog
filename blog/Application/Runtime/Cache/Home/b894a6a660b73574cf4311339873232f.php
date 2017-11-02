<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言板-BLOG</title>
<meta name="keywords" content="留言板,周秋菊,周秋菊个人博客,个人博客网站" />
<meta name="description" content="周秋菊个人博客,传递正能量,分享一些心得和经验,希望结识更多朋友,欢迎来访!" />
<link href="/blog/Public/Home/css/mess.css" rel="stylesheet" type="text/css"/>
<link href="/blog/Public/Home/css/mess2.css" rel="stylesheet" type="text/css"/>
<!--[if lt IE 9]>
<link href="/views/mybolg/css/style-suiyue.css" rel="stylesheet" type="text/css"/>
<script src="/views/mybolg/js/moder.js"></script>
<link href="/views/mybolg/css/style_ie.css" rel="stylesheet" type="text/css"/>
<![endif]-->
<!-- 加载IE6对PNG图片透明的支持 -->
<!--[if IE 6]>
	<script src="http://cdn.bootcss.com/dd_belatedpng/0.0.8/dd_belatedpng.min.js"></script>
	<![endif]-->
<style>
	body{
		position:relative;
	}
	.posi{
		position:fixed;
		top:50%;
		left:19%;
	}
	.page a{
	cursor:pointer;
	}
</style>
</head>
<script src="/blog/Public/Common/jquery.min.js"></script>
<body>
 <div class="header">
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?70d04a3093ee6a1673cbc48dda7f2499";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

<!--
<div class="logo"><img src="/views/mybolg/images/logo.png" /></div>
-->
<h1><a href="<?php echo U('Home/Index/index');?>">个人Blog </a></h1>
  
  <p>有一种思念，是淡淡的幸福；有一种幸福，是常常的牵挂；有一种牵挂，是远远地欣赏.......</p>
</div>
<div class="b_nav">
  <div class="navswf"  style="margin-top:3px;">
    
    <object type="application/x-shockwave-flash" data="/views/mybolg/images/nav.swf"
width="600" height="40">
<param name="movie" value="/views/mybolg/images/nav.swf" />
<param name="wmode" value="transparent" />
    </object>
    
    <div id="nav">
      <ul>
        <li><a href="<?php echo U('Home/Index/index');?>">网站首页</a></li>
                <li><a href="<?php echo U('Home/About/about');?>">关于我</a> </li>                   
       
              
          
       
                <li><a href="<?php echo U('Home/Timeline/timeline');?>">时光轴</a> </li>
          
       
                <li><a href="<?php echo U('Home/Message/message');?>">留言板</a> </li>         
       
                <li><a href="/photos/">相册</a> </li>
          
       
              </ul>
      <script src="/views/mybolg/js/silder_2.js"></script><!--获取当前页导航 高亮显示标题--> 
    </div>
  </div>
</div>

<div class="main">
  <div class="position"><span>您当前的位置：<a href="<?php echo U('Home/Index/index');?>">首页</a> &gt; <a href="/message/" title="留言板">留言板</a></span></div>
  <div class="left w760">
  <h2 style="font-size: 22px;margin-bottom: 20px;">Leave your footprints</h2>
  <button>我要留言</button>
  <script>
  $('button').click(function(){  
		$('#form').addClass("posi");
	});
  </script>
`<div class="page" style="margin-top:50px;">
		<!-- 实现无限极分类显示 -->
		<?php if(is_array($list)): foreach($list as $key=>$v): ?><div style="height:88px;border-top: 2px solid rgba(200,208,206,0.7);">            	
            	<div class="ds-avatar right" style="width:600px;text-align:left;">
            		<a style="text-align:left;"><?php echo ($v['username']); ?></a><br/>
            		<p><?php echo (htmlspecialchars_decode($v['content'])); ?></p>
            		<div class="left ds-comment-footer ds-comment-actions">
            			<?php echo ($v['add_time']); ?>  <a class="reply" mid="<?php echo ($v['id']); ?>">回复</a>
            		</div>
            	</div>
            </div>
            <?php if(is_array($v[0]) and empty($v[0]) != 1): if(is_array($v[0])): foreach($v[0] as $key=>$a): ?><div class="ds-avatar" style="width:600px;text-align:left;margin-left:4em;margin-top:10px;background:#DDD;">
            		<p><a style="text-align:left;"><?php echo ($a['username']); ?></a>回复&nbsp;&nbsp;&nbsp;<a style="text-align:left;"><?php echo ($a['name']); ?></a></p>
            		<p><?php echo (htmlspecialchars_decode($a['content'])); ?></p>
            		<div class="ds-comment-footer ds-comment-actions">
            			<?php echo ($a['add_time']); ?>  <a class="reply" mid="<?php echo ($v['id']); ?>">回复</a>
            		</div>
            	</div><?php endforeach; endif; endif; endforeach; endif; ?>
            <div style="font-size:16px;">
            <?php echo ($page); ?>
            </div>
            <script>
            	//点击回复触发
            	$('.reply').click(function(){  
            		var	pid = $(this).attr("mid");
            		$('#p').val(pid);
            		$('#form').addClass("posi");
            	});
            	//点击取消触发
            	function a(){
            		$('#form').removeClass("posi");
            		$('#p').val("");
            	}
            	
            	//提交触发
            	function b(){           		
            		var content = ue.getContent();
            		var pid = $('#p').val();
            		//console.log(content);
            		$.ajax({
            			type:'POST',
            			url:"<?php echo U('Home/Message/add','','');?>",
            			data:{"content":content,"pid":pid},
            			success:function(data){
            				location.reload();//实现页面的重新加载
            				alert(data);
            			}
            		});
            		a();
            		return false;
            	}
            </script>                  
            <form onsubmit="return b();" id="form" >
            	<textarea name="content" id="container" style="width:650px;"></textarea>
				<!-- 配置文件 -->
				<script type="text/javascript" src="/blog/Public/Common/ueditor/ueditor.config.js"></script>
				<!-- 编辑器源码文件 -->
				<script type="text/javascript" src="/blog/Public/Common/ueditor/ueditor.all.js"></script>
				<!-- 实例化编辑器 -->
				<script type="text/javascript">
					var ue = UE.getEditor('container');
				</script>
				<input type="hidden" name="pid" id="p"></input>
				<input type="submit" value="提交" style="width:100px;"></input>
				<input onclick="a()" type="reset" value="取消" style="width:100px;"></input>
            </form>
            
	</div>
  </div>
 

</div></body>
</html>