<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>鱼影个人博客</title>
</head>

<link href="/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/common.css" />
<link rel="stylesheet" type="text/css" href="/css/article.css" />
<link rel="stylesheet" type="text/css" href="/css/article_detail.css" />
<link href="logo.ico" rel="shortcut icon" />
<script src="/plugin/jquery.min.js"></script>
<script src="/plugin/bootstrap/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="plugin/jquery.page.js"></script>-->
<!--<script src="js/common.js"></script>-->
<!--<script src="js/snowy.js"></script>-->

<body>
<div class="w_header">
    <div class="container">
        <div class="w_header_top">
            <a href="#" class="w_logo"></a>
            <span class="w_header_nav">
					<ul>
						<li><a href="/" class="active">首页</a></li>
						<li><a href="about.html">关于</a></li>
						<li><a href="article.html">成长</a></li>
						<li><a href="">学习</a></li>
						<li><a href="">娱乐</a></li>
						<li><a href="moodList.html">说说</a></li>
						<li><a href="comment.html">留言</a></li>
					</ul>
				</span>
            <div class="w_search">
                <div class="w_searchbox">
                    <input type="text" placeholder="search" />
                    <button>搜索</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--公共头部-->

@yield('content')

<!-- 公共尾部-->
<div class="w_foot">
    <div class="w_foot_copyright">Copyright &copy; 2017-2020, www.genban.org. All Rights Reserved. <span>|</span>
        <a target="_blank" href="http://www.miitbeian.gov.cn/" rel="nofollow">皖ICP备17002922号</a>
    </div>
</div>
</body>
</html>
