<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>时光轴 - 青春往事个人博客模板</title>
<meta name="keywords" content="青春往事,个人博客模板" />
<meta name="description" content="回忆过往，青春时光！个人博客模板下载" />
<link href="/blog/Public/Home/css/style.css" rel="stylesheet" type="text/css"/>
<link href="/blog/Public/Home/css/footer.css" rel="stylesheet" type="text/css"/>
<!--[if lt IE 9]>
<link href="/blog/Public/Home/cssstyle-suiyue.css" rel="stylesheet" type="text/css"/>
<script src="js/moder.js"></script>
<link href="/blog/Public/Home/cssstyle_ie.css" rel="stylesheet" type="text/css"/>
<![endif]-->
<!-- 加载IE6对PNG图片透明的支持 -->
<!--[if IE 6]>
	<script src="js/dd_belatedpng.min.js"></script>
	<![endif]-->
</head>
<body>
<div class="header">
<!--<div class="logo"><img src="/blog/Public/Home/images/logo.png" /></div>-->
  <h1><a href="http://www.lmlblog.com/blog/7/">青春往事</a></h1>
  <p>最美的季节，遇见你.......</p>
</div>
<div class="b_nav">
  <div class="navswf"  style="margin-top:3px;">
    <object type="application/x-shockwave-flash" data="/blog/Public/Home/images/nav.swf"
width="600" height="40">
      <param name="movie" value="/blog/Public/Home/images/nav.swf" />
      <param name="wmode" value="transparent" />
    </object>
    <div id="nav">
      <ul>
        <li><a href="<?php echo U('Home/Index/index');?>">网站首页</a></li>
        <li><a href="<?php echo U('Home/About/about');?>">关于我</a> </li>       
        <li><a href="<?php echo U('Home/Timeline/timeline');?>">时光轴</a> </li>
        <li><a href="<?php echo U('Home/Message/message');?>">留言板</a> </li>
        <li><a href="#">相册</a> </li>
      </ul>
      <script src="js/silder_2.js"></script>
      <!--获取当前页导航 高亮显示标题-->
    </div>
  </div>
</div>
<div class="main">
  <div class="position"><span>您当前的位置：<a href="<?php echo U('Home/Index/index');?>">首页</a> &gt; <a href="<?php echo U('Home/Timeline/timeline');?>" title="时光轴">时光轴</a></span></div>
  <div class="bloglist">
  <?php if(is_array($list)): foreach($list as $key=>$v): ?><ul class="arrow_box">
      <div class="sy">
        <p><?php echo ($v["content"]); ?></p>
      </div>
      <span class="dateview"><?php echo ($v["add_time"]); ?></span>
    </ul><?php endforeach; endif; ?>
    
  </div>
  <div class="page">
    <nav class="pagination">
      <ul>
       <?php echo ($page); ?>
      </ul>
    </nav>
  </div>
</div>
<div class="footer-container">
  <div class="container">
    <div class="footer-row">
      <div class="span3 footer-col">
        <h5>学无止境</h5>
        <ul class="post-list">
          <li class="conent_width"><a class="pull-right">39</a><a class="bq9 rightpx equipment">1</a> <a href="#" title="轻摇时光，我站在孤独里守望">轻摇时光，我站在孤独里守望</a></li>
          <li class="conent_width"><a class="pull-right">12</a><a class="bq2 rightpx equipment">2</a> <a href="#" title="这次你借我，咱俩就还是朋友">这次你借我，咱俩就还是朋友</a></li>
          <li class="conent_width"><a class="pull-right">13</a><a class="bq6 rightpx equipment">3</a> <a href="#" title="去女神家里修笔记本">去女神家里修笔记本</a></li>
          <li class="conent_width"><a class="pull-right">22</a><a class="bq1 rightpx equipment">4</a> <a href="#" title="我以为你们不会给美女开罚单的。">我以为你们不会给美女开罚单的。</a></li>
          <li class="conent_width"><a class="pull-right">21</a><a class="bq2 rightpx equipment">5</a> <a href="#" title="若只是过客、只是路过">若只是过客、只是路过</a></li>
        </ul>
      </div>
      <div class="span3 footer-col">
        <h5>精选文章</h5>
        <ul class="popular-comment comment_li">
          <li><a title="云来云散，回忆中有你牵绊释" href="#"> <img src="/blog/Public/Home/images/9.jpg" class="img-circle img_45x45"/>云来云散，回忆中有你牵绊</a>
            <div class="conent_width"> <a href="#" >时光从没停留，脆弱的美好，怎能搭建起牢固的城堡。让过去消失在风里，停留在心里。...</a></div>
          </li>
          <li><a title="送给心中有我的人！" href="#"> <img src="/blog/Public/Home/images/1.jpg" class="img-circle img_45x45"/>送给心中有我的人！</a>
            <div class="conent_width"> <a href="#" >总有一天你会知道：人心换不来人...</a></div>
          </li>
          <li><a title="最美红尘，愿你相伴" href="#"> <img src="/blog/Public/Home/images/4.jpg" class="img-circle img_45x45"/>最美红尘，愿你相伴</a>
            <div class="conent_width"> <a href="#" >浅握时光，任岁月冉冉的滑过季节的轮回，回首往昔，悲喜交织的情怀温润了这一季明媚的笑颜，浓了春秋，淡了忧愁。...</a></div>
          </li>
        </ul>
      </div>
      <div class="span3 footer-col">
        <h5>随机推荐</h5>
        <ul class="post-list">
          <li class="conent_width"> <a class="bq3 rightpx equipment">1</a> <a href="#" title="在孤独中心如止水">在孤独中心如止水</a></li>
          <li class="conent_width"> <a class="bq3 rightpx equipment">2</a> <a href="#" title="心深处，念你如初如昔">心深处，念你如初如昔</a></li>
          <li class="conent_width"> <a class="bq7 rightpx equipment">3</a> <a href="#" title="愿人生无可辜负">愿人生无可辜负</a></li>
          <li class="conent_width"> <a class="bq8 rightpx equipment">4</a> <a href="#" title="适当的放弃，也许是人生优雅的转身！">适当的放弃，也许是人生优雅的转身！</a></li>
          <li class="conent_width"> <a class="bq11 rightpx equipment">5</a> <a href="#" title="生活就算琐碎，仍充满希望">生活就算琐碎，仍充满希望</a></li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="span12 footer-col footer-sub">
        <div class="row no-margin">
          <div class="span6"><p>Design by &nbsp;2016/10/6 广州天气阴天多云&nbsp; 青春往事个人博客模板(lmlblog.com) &nbsp;模板下载地址：更新中....</p></div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>