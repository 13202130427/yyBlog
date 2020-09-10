@extends('layout')
@section('content')
    <div class="w_container">
        <div class="container">
            <div class="row w_main_row">
                <div class="col-lg-9 col-md-9 w_main_left">
                    <!--滚动图开始-->
                    <div class="panel panel-default">

                        <div id="w_carousel" class="carousel slide w_carousel" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#w_carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#w_carousel" data-slide-to="1"></li>
                                <li data-target="#w_carousel" data-slide-to="2"></li>
                                <li data-target="#w_carousel" data-slide-to="3"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                @foreach($show_images as $show_images)
                                    @if ($loop->first)
                                        <div class="item active">
                                            <img src="{{$show_images->url}}" alt="...">
                                        </div>
                                    @else
                                        <div class="item">
                                            <img src="{{$show_images->url}}" alt="...">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <!-- Controls -->
                            <a class="left carousel-control" href="#w_carousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#w_carousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    </div>

                    <div class="panel panel-default contenttop">
                        <a href="article_detail.html">
                            <strong>博主置顶</strong>
                            <h3 class="title">一起努力呀</h3>
                            <p class="overView">个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中。。。</p>
                        </a>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">最新发布</h3>
                        </div>

                        <div class="panel-body">

                            <!--文章列表开始-->
                            <div class="contentList">
                                @foreach($article as $article)
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="contentleft">
                                                <h4><a class="title" href="/article/{{$article['id']}}">{{$article['title']}}</a></h4>
                                                <p>
                                                    @foreach($article['tag'] as $tag)
                                                        <a class="label label-default">{{$tag}}</a>
                                                    @endforeach
                                                </p>
                                                <p class="overView">{{$article['show_content']}}</p>
                                                <p><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">{{$article['author']}}</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:{{$article['read_num']}}</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:{{$article['comment_num']}}</span><span class="count"><i class="glyphicon glyphicon-time"></i>{{$article['created_at']}}</span></p>
                                            </div>
                                            <div class="contentImage">
                                                <div class="row">
                                                    <a href="#" class="thumbnail w_thumbnail">
                                                        <img src="{{$article['image']}}" alt="...">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!--文章列表结束-->

                        </div>
                    </div>
                </div>

                <!--左侧开始-->
                <div class="col-lg-3 col-md-3 w_main_right">

                    <div class="panel panel-default sitetip">
                        <a href="article_detail.html">
                            <strong>站点公告</strong>
                            <h3 class="title">个人网站建设中</h3>
                            <p class="overView">该技术博客将会记载我在工作中的技术知识，一起加油啊</p>
                        </a>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">热门标签</h3>
                        </div>
                        <div class="panel-body">
                            <div class="labelList">
                                @foreach($right_tag as $right_tag)
                                    <a class="label label-default">{{$right_tag}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">最新发布</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="list-unstyled sidebar">
                                @foreach($right_article as $key =>  $right_article)
                                    <li>
                                        <a href="/article/{{$key}}">{{$right_article}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">友情链接</h3>
                        </div>
                        <div class="panel-body">
                            <div class="newContent">
                                <ul class="list-unstyled sidebar shiplink">
                                    <li>
                                        <a href="https://www.baidu.com/" target="_blank">百度</a>
                                    </li>
                                    <li>
                                        <a href="https://www.oschina.net/" target="_blank">开源中国</a>
                                    </li>
                                    <li>
                                        <a href="http://www.ulewo.com/" target="_blank">有乐网</a>
                                    </li>
                                    <li>
                                        <a href="http://www.sina.com.cn/" target="_blank">新浪网</a>
                                    </li>
                                    <li>
                                        <a href="http://www.qq.com/" target="_blank">腾讯网</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">打钱爱你</h3>
                        </div>
                        <div class="panel-body">
                            <img src="img/getmoney-wx.jpg" style="height: 300.5px;width: 230.5px;" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var $backToTopEle = $('<a href="javascript:void(0)" class="Hui-iconfont toTop" title="返回顶部" alt="返回顶部" style="display:none">^</a>').appendTo($("body")).click(function() {
            $("html, body").animate({ scrollTop: 0 }, 120);
        });
        var backToTopFun = function() {
            var st = $(document).scrollTop(),
                winh = $(window).height();
            (st > 0) ? $backToTopEle.show(): $backToTopEle.hide();
            /*IE6下的定位*/
            if(!window.XMLHttpRequest) {
                $backToTopEle.css("top", st + winh - 166);
            }
        };

        $(function() {
            $(window).on("scroll", backToTopFun);
            backToTopFun();
        });
    </script>
@stop
