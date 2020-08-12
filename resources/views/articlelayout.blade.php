@extends('layout')
@section('content')
    <div class="w_container">
        <div class="container">
            <div class="row w_main_row">

                <ol class="breadcrumb w_breadcrumb">
                    <li><a href="/">首页</a></li>
                    <li><a >文章</a></li>
                    <li class="active">@yield('title')</li>
                    <span class="w_navbar_tip">我们长路漫漫，只因学无止境。</span>
                </ol>

                <div class="col-lg-9 col-md-9 w_main_left">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h2 class="c_titile">@yield('title')</h2>
                            <p class="box_c"><span class="d_time">发布时间：@yield('push_time')</span><span>编辑：<a href="">@yield('author')</a></span><span>阅读（@yield('read_num')）</span></p>
                            @yield('article')
                            <div class="keybq">
                                <p><span>关键字</span>：
                                    @yield('tag')
                                </p>
                            </div>
                            <div class="nextinfo">
                                @yield('page')
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <center><div id="cyReward" role="cylabs" data-use="reward" sid="5eab7e4c363e4cb8bed0efa3604e6b42"></div></center>
                            <!--<div id="cyEmoji" role="cylabs" data-use="emoji" sid="5eab7e4c363e4cb8bed0efa3604e6b42"></div>-->
                            <script type="text/javascript" charset="utf-8" src="https://changyan.itc.cn/js/lib/jquery.js"></script>
                            <script type="text/javascript" charset="utf-8" src="https://changyan.sohu.com/js/changyan.labs.https.js?appid=cysPwLFm1"></script>


                            <!--PC版-->
                            <!--<div id="SOHUCS" sid="5eab7e4c363e4cb8bed0efa3604e6b42"></div>
                            <script charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/changyan.js" ></script>
                            <script type="text/javascript">
                            window.changyan.api.config({
                            appid: 'cysPwLFm1',
                            conf: 'prod_6c6350e206c502f569b865b4bf121e60'
                            });
                            </script>-->
                            <!-- 多说评论框 start -->
                            <div class="ds-thread" data-thread-key="testarticle" data-title="我的个人博客之——阿里云空间选择" data-url="http://127.0.0.1:8020/wilco/article_detail.html"></div>
                            <!-- 多说评论框 end -->
                            <!-- 多说公共JS代码 start (一个网页只需插入一次) -->
                            <script type="text/javascript">
                                var duoshuoQuery = {short_name:"wfyvv"};
                                (function() {
                                    var ds = document.createElement('script');
                                    ds.type = 'text/javascript';ds.async = true;
                                    ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
                                    ds.charset = 'UTF-8';
                                    (document.getElementsByTagName('head')[0]
                                        || document.getElementsByTagName('body')[0]).appendChild(ds);
                                })();
                            </script>
                            <!-- 多说公共JS代码 end -->

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 w_main_right">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">最新发布</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="list-unstyled sidebar">
                                @yield('right_article')
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
                                    <li><a href="https://www.baidu.com/" target="_blank">百度</a></li>
                                    <li><a href="https://www.oschina.net/" target="_blank">开源中国</a></li>
                                    <li><a href="http://www.ulewo.com/" target="_blank">有乐网</a></li>
                                    <li><a href="http://www.sina.com.cn/" target="_blank">新浪网</a></li>
                                    <li><a href="http://www.qq.com/" target="_blank">腾讯网</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@stop
