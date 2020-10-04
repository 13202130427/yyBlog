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
                <div class="money-alert" id="money-alert" style="width: 100%;height: 400px;position: fixed;top:10%;left:30%;z-index: 999;" hidden = "hidden">
                    <div style="display:block;width: 50%;height: 600px;">
                        <div style="text-align: center;width:500px;height:500px;background-color: #fff;border-radius: 10px;border: 2px solid #bfbfbf; position: relative;">
                            <div style="display: inline-block;width: 100%;">
                                <div style="margin-top: 50px;">
                                    <img src="/img/log1.png" style="width: 120px;height: 40px;">
                                </div>
                                <div style="margin-top: 10px;color: #aaaaaa">感谢你的支持，我会继续努力！</div>
                                <div style="margin-top: 40px;">
                                    <div id="qrcode">
                                        <img src="/img/getmoney-wx.png" style="width: 180px;height: 180px;">
                                    </div>
                                    <div style="display: inline-block;margin-top: 20px;height: 60px;position: relative;">
                                        <div  style="position: absolute;left: 50px;">
                                            <img src="/img/zfb.png" style="width: 50px;height: 50px;background-color: #f1f1f1;border-radius: 10px;" onclick="changeZFB()">
                                            <input type="radio" name="zf" value="1"/>
                                        </div>
                                        <div style="position: absolute;right: 50px;">
                                            <img src="/img/wx.png" style="width: 50px;height: 50px;" onclick="changeWX()">
                                            <input type="radio" name="zf" checked value="2"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="position: absolute;right:20px;top: 20px;">
                                <img src="/img/close.png" style="width: 20px;height: 20px;" onclick="closeAlert()">
                            </div>
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
                            $("#money-alert").prop("hidden",false);
                        }
                        function closeAlert() {
                            $("#money-alert").prop("hidden",true);
                        }
                        $("input:radio[name='zf']").change(function () {
                            var value = $("input:radio[name='zf']:checked").val();
                            if(value == 1) {
                                $("#qrcode").html("<img src=\"/img/getmoney-zfb.png\" style=\"width: 180px;height: 180px;\">");
                            } else {
                                $("#qrcode").html("<img src=\"/img/getmoney-wx.png\" style=\"width: 180px;height: 180px;\">");
                            }
                        })
                        function changeZFB() {
                            $("input:radio[name='zf']")[0].checked = true
                            $("#qrcode").html("<img src=\"/img/getmoney-zfb.png\" style=\"width: 180px;height: 180px;\">");
                        }
                        function changeWX() {
                            $("input:radio[name='zf']")[1].checked = true
                            $("#qrcode").html("<img src=\"/img/getmoney-wx.png\" style=\"width: 180px;height: 180px;\">");
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
