<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>青春往事个人博客模板 - lmlblog.com</title>
<meta name="keywords" content="青春往事,个人博客模板" />
<meta name="description" content="回忆过往，青春时光！个人博客模板下载" />
<script type="text/javascript" src="/blog/Public/Common/jquery.min.js"></script>
<script type="text/javascript" src="/blog/Public/Home/js/sliders.js"></script>
<link href="/blog/Public/Home/css/style.css" rel="stylesheet" type="text/css"/>
<link href="/blog/Public/Home/css/footer.css" rel="stylesheet" type="text/css"/>
<!--[if lt IE 9]>
<link href="/blog/Public/Home/css/style-suiyue.css" rel="stylesheet" type="text/css"/>
<script src="js/moder.js"></script>
<link href="/blog/Public/Home/css/style_ie.css" rel="stylesheet" type="text/css"/>
<![endif]-->
<!-- 加载IE6对PNG图片透明的支持 -->
<!--[if IE 6]>
	<script src="js/dd_belatedpng.min.js"></script>
	<![endif]-->
<style>
.box{width:200px;background:#fff;margin:7% auto;padding:20px;box-shadow:0 0 15px #ccc;}
.box h1{font-size:20px;color:#555;text-align:center;text-shadow: 1px 1px 1px #ccc;}
.box img{width:150px;height:60px;cursor:pointer;}
.box table{width:100%;height:300px;margin:0 auto;margin-top:20px;}
.box th{text-align:right;font-weight:normal;}
.box .input{width:150px;height:20px;border:1px solid #ddd;padding:5px;color:#666;font-size:20px;}
.box .login_btn{font-size:16px;margin:0 10px;background:white;color:black;border:0px solid #DEEFFA;cursor:pointer;}
.box .login_reg{display:inline-block;font-size:16px;width:50px;height:50px;margin:0 10px;background:#0077A2;color:#fff;border:1px solid #DEEFFA;cursor:pointer;}
.box .login_btn:hover{background:#005580;}
</style>
</head>
<body>
<div class="header">
  <!--<div class="logo"><img src="/blog/Public/Home/images/logo.png" /></div>-->
  <h1><a href="/wo/">青春往事</a></h1>
  <p>青春时光，匆匆恍恍。还没来得及尽情挥霍，便已奔向远方。</p>
</div>
<div class="b_nav">
  <div class="navswf"  style="margin-top:3px;">
    <object type="application/x-shockwave-flash" data="/blog/Public/Home/images/nav.swf" width="600" height="40">
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
  <div class="left w760">
    <!--banner开始-->
    <div class="banner w760">
      <div id="slide-holder">
        <div id="slide-runner"> <a href="/wo/" target="_blank"><img id="slide-img-1" src="/blog/Public/Home/images/a1.jpg"  alt="回忆--桌面物品散乱，我的回忆永远新鲜。" /></a> <a href="/wo/" target="_blank"><img id="slide-img-2" src="/blog/Public/Home/images/a2.jpg"  alt="暖光--那一束暖光，一直陪伴着我。" /></a><a href="/wo/" target="_blank"><img id="slide-img-3" src="/blog/Public/Home/images/a3.jpg"  alt="love you--冬日的咖啡慢慢冷却" /></a><a href="/wo/" target="_blank"><img id="slide-img-4" src="/blog/Public/Home/images/a4.jpg"  alt="时光--胶片的时光，不褪色的记忆。" /></a><a href="/wo/" target="_blank"><img id="slide-img-5" src="/blog/Public/Home/images/a5.jpg"  alt="回忆是橡皮擦--时光是记忆的橡皮擦" /></a><a href="/wo/" target="_blank"><img id="slide-img-6" src="/blog/Public/Home/images/a6.jpg"  alt="游记--同一个镜头记录下不同国度的风土人情。" /></a>
          <div id="slide-controls">
            <p id="slide-client" class="text"><span></span></p>
            <p id="slide-desc" class="text"></p>
            <p id="slide-nav"></p>
          </div>
        </div>
      </div>
      <script>
	  if(!window.slider) {
		var slider={};
	}

	slider.data= [
    {
        "id":"slide-img-1", // 与slide-runner中的img标签id对应
        "client":"",
        "desc":"回忆--桌面物品散乱，我的回忆永远新鲜。" //这里修改描述
    },
    {
        "id":"slide-img-2",
        "client":"",
        "desc":"暖光--那一束暖光，一直陪伴着我。"
    },
    {
        "id":"slide-img-3",
        "client":"",
        "desc":"love you--冬日的咖啡慢慢冷却"
    },
    {
        "id":"slide-img-4",
        "client":"",
        "desc":"时光--胶片的时光，不褪色的记忆。"
    },
	{
        "id":"slide-img-5",
        "client":"",
        "desc":"回忆是橡皮擦--时光是记忆的橡皮擦"
    },
	{
        "id":"slide-img-6",
        "client":"",
        "desc":"游记--同一个镜头记录下不同国度的风土人情"
    },
	];

	  </script>
    </div>
    <!--banner结束-->
    <div class="left_news w760">
      <div class="news_title w760">文章推荐<span><a href="#">Recommend</a></span></div>
      <div class="news_lis w760">
        <ul>
        <?php if(is_array($show)): foreach($show as $key=>$v): ?><li class="lis">
            <div class="news_thumb"><a href="<?php echo U('Home/Index/info',array(id=>$v['id'],click=>$v['click']));?>"><img src="/blog/Public/..<?php echo ($v['article_img']); ?>"/></a></div>
            <div class="nwes_li">
              <div class="titlt_n"><a href="<?php echo U('Home/Index/info',array(id=>$v['id'],click=>$v['click']));?>"><?php echo ($v['article_name']); ?></a></div>
              <div class="txt" style="font-size:14px;overflow:hidden;width:450px;text-overflow:ellipsis;"><?php echo (htmlspecialchars_decode($v['article_content'])); ?></div>
              <div class="data">
                <ul>
                  <li class="bolg_n w60"><a href="/wo/">个人博客</a></li>
                  <li class="time_n w60" style='width:150px;'><?php echo ($v['add_time']); ?></li>
                  <li class="read_n w60">浏览（<?php echo ($v['click']); ?>）</li>
                </ul>
              </div>
              
            </div>
          </li><?php endforeach; endif; ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="right w300">
    <div class="new w300">
      <div class="new_article">最新文章</div>
      <div class="r_news">
        <ul>
        <?php if(is_array($show)): foreach($show as $key=>$v): ?><li><a href="<?php echo U('Home/Index/info',array(id=>$v['id'],click=>$v['click']));?>"><?php echo ($v["article_name"]); ?></a></li><?php endforeach; endif; ?>
        </ul>
      </div>
    </div>
    <div class="tag w300">
      <div class="new_article">热门标签</div>
      <div class="tag_n"> <a href="#" class="bq9">北方有佳人</a> <a href="#" class="bq12">心如止水</a> <a href="#" class="bq9">好久不见</a> <a href="#" class="bq8">人生</a> <a href="#" class="bq1">愿人生无可辜负</a> <a href="#" class="bq9">优雅</a> <a href="#" class="bq5">青春回忆</a> <a href="#" class="bq6">经典台词</a> <a href="#" class="bq6">追忆过往</a><a href="#" class="bq9">时光里</a><a href="#" class="bq5">岁月</a> </div>
    </div>
    <div class="tuwen w300">
      <div class="new_article">图文推荐</div>
      <div class="r_news2">
        <ul>
          <li>
            <div class="tu"><img src="/blog/Public/Home/images/7.jpg" /></div>
            <div class="tu_title"><a href="#" target="_blank">北方有佳人，绝世而独立</a>
              <p class="time_r">2016-10-12</p>
            </div>
          </li>
          <li>
            <div class="tu"><img src="/blog/Public/Home/images/11.jpg" /></div>
            <div class="tu_title"><a href="#" target="_blank">那些年，你追过的初恋还好吗？</a>
              <p class="time_r">2016-10-25</p>
            </div>
          </li>
          <li>
            <div class="tu"><img src="/blog/Public/Home/images/3.jpg" /></div>
            <div class="tu_title"><a href="#" target="_blank">青春语录：喜欢一个人，始于颜值，陷于才华，忠于人品。</a>
              <p class="time_r">2016-10-16</p>
            </div>
          </li>
          <li>
            <div class="tu"><img src="/blog/Public/Home/images/9.jpg" /></div>
            <div class="tu_title"><a href="#" target="_blank">(转载)心静了世界就静了</a>
              <p class="time_r">2016-10-21</p>
            </div>
          </li>
          <li>
            <div class="tu"><img src="/blog/Public/Home/images/40.jpg" /></div>
            <div class="tu_title"><a href="#" target="_blank">在孤独中心如止水</a>
              <p class="time_r">2016-10-19</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="weixin w300">
      <div class="new_article">关注我</div>
      <div class="gz">扫二维码，交个朋友</div>
      <div class="code"><img src="/blog/Public/Home/images/QQ.jpg"/></div>
    </div>
    <div class="link">
      <div class="new_article">友情链接：</div>
      <div class="links">
        <li><a href="http://www.aicoffees.com/" target="_blank" title="咖啡之念">咖啡之念</a></li>
        <li><a href="http://xiaoshuangyu.com" target="_blank" title="小双鱼博客">小双鱼博客</a></li>
        <li><a href="http://www.yudouyudou.com/" target="_blank" title="余斗个人博客">余斗个人博客</a></li>
        <li><a href="http://www.jxiaowen.com/" target="_blank" title="秋风落叶博客">秋风落叶博客</a></li>
        <li><a href="http://www.lmlblog.com/" target="_blank" title="MAOLAI个人博客">MAOLAI个人博客</a></li>
        <li><a href="http://zhouqiuju.com/" target="_blank" title="周秋菊个人博客">周秋菊个人博客</a></li>
        <li><a href="http://daohang.lusongsong.com" target="_blank" title="博客大全">博客大全</a></li>
        <li><a href="http://www.lmlblog.com/time/" target="_blank" title="时光.记录博客">时光.记录博客</a></li>
        <li><a href="http://www.lmlblog.com/wo/" target="_blank" title="个人博客主页">个人博客主页</a></li>
      </div>
    </div>
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