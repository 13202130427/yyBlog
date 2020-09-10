@extends('layout')
@section('content')
    <div class="w_container" >
        <div class="container">
            <div class="row w_main_row">

                <ol class="breadcrumb w_breadcrumb">
                    <li><a href="/">首页</a></li>
                    <li><a >文章</a></li>
                    <li class="active">@yield('title')</li>
                    <span class="w_navbar_tip">我们长路漫漫，只因学无止境。</span>
                </ol>
                <div class="money-alert" style="width: 100%;height: 400px;position: fixed;top:10%;left:30%;z-index: 999;" >
                    <div style="display:block;width: 50%;height: 600px;">
                        <div style="text-align: center;width:500px;height:500px;background-color: #fff;border-radius: 10px;border: 2px solid #bfbfbf; position: relative;">
                            <div style="">
                                <div>logo</div>
                                <div>感谢你的支持，我会继续努力！</div>
                                <div>码</div>
                            </div>
                            <div style="position: absolute;right:20px;top: 20px;">x</div>
                        </div>
                    </div>
                </div>

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
                        <div style="width: 100%;height: 100px;">
                            <div style="text-align: center;line-height: 100px;">
                                <button style="width: 134px;height: 49px;line-height:50px;border: none;background-color:#d73925;color:#fff;border-radius: 25px;display: inline-block;font-size: 20px;font-weight: bold;" onclick="getMoney()">打赏</button>
                            </div>
                        </div>
                    </div>
                    <script>
                        function getMoney() {

                        }
                    </script>
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
