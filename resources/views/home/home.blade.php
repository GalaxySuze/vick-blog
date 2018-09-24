<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="images/x-icon" href="{{ asset('icon.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hello World {{ config('app.name', 'Vick`Blog') }}</title>

    <!-- master css -->
    <link type="text/css" rel="stylesheet" href="{{ asset('materialize/css/materialize.min.css') }}" media="screen,projection"/>

    <!-- font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Let browser know website is optimized for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- master js -->
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('materialize/js/materialize.min.js') }}"></script>

    <!-- highlight - 代码高亮 -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>

    <!-- 分享功能 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/social-share.js/1.0.16/css/share.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/social-share.js/1.0.16/js/social-share.min.js"></script>

    <style>
        html {
            height: 100%;
            font-family: "Helvetica Neue", NotoSansHans-Regular, AvenirNext-Regular, arial, Hiragino Sans GB, "Microsoft Yahei", "Hiragino Sans GB", "WenQuanYi Micro Hei", sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background-color: #f5f8fa;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        main {
            flex: 1 0 auto;
        }

        .parallax-container {
            height: 100%;
        }

        .card-image {
            pointer-events: none;
        }

        .card-content > a {
            color: #09003f;
        }

        .comments-href {
            display: inline;
            padding: 0
        }

        .theme-color-gradient {
            -webkit-animation: color-gradient 5s;
            animation: color-gradient 5s;
            background-color: #98A9F9
        }

        @-webkit-keyframes color-gradient {
            0% {
                background-color: #bbdefb;
            }
            50% {
                background-color: #82b1ff;
            }
            100% {
                background-color: #98A9F9;
            }
        }

        @keyframes color-gradient {
            0% {
                background-color: #bbdefb;
            }
            50% {
                background-color: #82b1ff;
            }
            100% {
                background-color: #98A9F9;
            }
        }

        #normal-card > .card {
            visibility: hidden;
        }

        .content-typo > p {
            line-height: 1.8;
            font-size: 16px;
        }

        .content-typo > blockquote {
            margin: 20px 0;
            padding: 1.5rem;
            border-left: 6px solid #ee6e73;
            color: #8796A8;
            word-break: break-all;

            position: relative;
            background: #f5f8fc;
            background: linear-gradient(-150deg, transparent 1.5em, #ffffff 0);
        }

        .content-typo > blockquote::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            background: linear-gradient(to left bottom, transparent 50%, rgba(0, 0, 0, .2) 0, rgba(0, 0, 0, .4)) 100% 0 no-repeat;
            width: 1.73em;
            height: 3em;
            transform: translateY(-1.3em) rotate(-30deg);
            transform-origin: bottom right;
            border-bottom-left-radius: inherit;
            box-shadow: -.2em .2em .3em -.1em rgba(0, 0, 0, .15);
        }

        .content-typo > img {
            margin-left: auto;
            margin-right:auto;
            display:block;
        }

        .anchor-top {
            top:50%;
        }

        #loading-bar {
            /*background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);*/
            border-radius: 50%;
            background-image: url("{{ asset('img/mascot-vicky.gif') }}");
            /*开车送花*/
            width: 205px;
            height: 205px;
            background-position: 53% 58%;
            /*奔奔跳跳*/
            /*width: 175px;*/
            /*height: 175px;*/
            /*background-position: 106% 18%;*/
            /*洗澡*/
            /*width: 195px;*/
            /*height: 195px;*/
            /*background-position: 54% 18%;*/
        }

        #vicky:hover {
            /*background-position: 2% 78%;*/
            background-position: 55% 19%;
        }

        #vicky {
            display: block;
            background: url('{{ asset('img/mascot-vicky.gif') }}') no-repeat 1% 57%;
            width: 160px;
            height: 180px;
        }
    </style>
</head>
<body>
    <header id="header-top">
        <!-- navigation bar -->
        <div class="navbar-fixed" id="navbar-div">
            <nav>
                <div class="nav-wrapper" style="background: #98A9F9;">
                    <a href="{{ route('home.index') }}" class="brand-logo center waves-effect">Vick ` Blog</a>
                    <a href="#" class="button-collapse" data-activates="mobile-menu" id="mobile-menu-btn">
                        <i class="material-icons">menu</i>
                    </a>
                    <!-- mobile menu -->
                    <ul id="mobile-menu" class="side-nav">
                        <li>
                            <div class="userView">
                                <div class="background">
                                    <img src="{{ asset('img/c5.jpg') }}">
                                </div>
                                <a href="#"><img class="circle waves-effect" src="{{ asset('icon.png') }}"></a>
                                <a href="#"><span class="white-text name waves-effect">Vick ` Blog</span></a>
                                <a href="#"><span class="white-text email waves-effect">1577972852@qq.com</span></a>
                            </div>
                        </li>
                        <li>
                            <div class="divider"></div>
                        </li>
                        <li><a href="{{ route('home.index') }}" class="waves-effect">首页</a></li>
                        <li><a href="{{ route('home.label-page') }}" class="waves-effect">标签</a></li>
                        <li><a href="{{ route('home.time-line-page') }}" class="waves-effect">归档</a></li>
                        <li><a href="{{ route('home.about') }}" class="waves-effect">关于</a></li>
                        <li>
                            <div class="divider"></div>
                        </li>
                        <li>
                            <nav style="background: #98A9F9">
                                <div class="nav-wrapper">
                                    <form>
                                        <div class="input-field">
                                            <input id="search" type="search" required>
                                            <label class="label-icon" for="search"><i
                                                        class="material-icons">search</i></label>
                                            <i class="material-icons">close</i>
                                        </div>
                                    </form>
                                </div>
                            </nav>
                        </li>
                    </ul>
                    <!-- normal menu -->
                    <ul class="left hide-on-med-and-down">
                        <li><a href="{{ route('home.index') }}" class="waves-effect">首页</a></li>
                        <li><a href="{{ route('home.label-page') }}" class="waves-effect">标签</a></li>
                        <li><a href="{{ route('home.time-line-page') }}" class="waves-effect">归档</a></li>
                        <li><a href="{{ route('home.about') }}" class="waves-effect">关于</a></li>
                    </ul>
                    <ul class="right">
                        @guest
                            <li>
                                <a href="{{ route('login') }}" class="waves-effect">登录</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}" class="waves-effect">注册</a>
                            </li>
                        @else
                            <li class="hide-on-med-and-down">
                                <a href="#" class="waves-effect dropdown-button" data-activates="loggedUser" id="loggedUserBtn">
                                    <i class="material-icons right">arrow_drop_down</i>{{ Auth::user()->name }}
                                </a>
                            </li>
                            <ul id="loggedUser" class="dropdown-content">
                                <li>
                                    <a href="{{ route('home.not-open') }}">个人中心</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        登出
                                    </a>
                                </li>
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endguest
                        @yield('outlineBar')
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    @section('body')
    <main>
    @section('content')
            <!-- scrolling banner -->
            <div class="slider">
                <ul class="slides" style="background: #98A9F9">
                    <li>
                        <img src="{{ asset('img/soul.jpg') }}">
                        <div class="caption left-align">
                            <h3> 『 Kill Time 』 </h3>
                            <h5 class="light grey-text text-lighten-3">「 Or Kiss Time 」</h5>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('img/iceberg.jpg') }}">
                        <div class="caption center-align">
                            <h3>『 指落惊风雨 』</h3>
                            <h5 class="light grey-text text-lighten-3">「 码成泣鬼神 」</h5>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('img/bird.jpg') }}">
                        <div class="caption center-align">
                            <h3>『 落花人独立 』</h3>
                            <h5 class="light grey-text text-lighten-3">「 微雨燕双飞 」</h5>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- search bar -->
            @component('home.layouts.main.search-bar') @endcomponent

            <!-- card list -->
            <div class="section card-list-box"></div>
    @show

        <!-- loading bar -->
        @include('home.layouts.main.loading-bar')

        <!-- 图钉 -->
        @includeWhen($index ?? false, 'home.layouts.footer.pushpin')

    </main>
    @show

    <!-- footer -->
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5>
                        <img src="{{ asset('logo.png') }}" alt="logo" width="50%" height="50%">
                    </h5>
                    <p class="grey-text text-lighten-4">网站图片均来自网络，如有侵权请联系「 关于 」页面邮箱，立删。</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">友情链接</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="https://laravel-china.org">😉Laravel China</a></li>
                        <li><a class="grey-text text-lighten-3" href="https://vuejscaff.com">😊Vuejs Caff</a></li>
                        <li><a class="grey-text text-lighten-3" href="https://pythoncaff.com">☺️Python Caff</a></li>
                        <li><a class="grey-text text-lighten-3" href="http://www.materializecss.cn">😘Materialize Css</a>
                        </li>
                        <li><a class="grey-text text-lighten-3" href="http://www.layui.com/">😎Layui</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @include('home.layouts.footer.footer-copyright')
    </footer>

</body>
<script>
    $(document).ready(function () {
        // 代码高亮
        hljs.initHighlightingOnLoad();

        $('.slider').slider({full_width: true});

        $('.collapsible').collapsible();

        $('.carousel, .carousel-slider').carousel({full_width: true});

        $('#outlineBtn, #loggedUserBtn').dropdown({
            constrain_width: false, // 自动宽度
            belowOrigin: true // 下拉列表在触发的下方显示
        });

        // 目录滚定定位
        $('#outlineLi > li > a').click(function () {
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top - 80
            }, 1000);
        });

        // card-container 改变文章排版
        $("#card-container").click(function () {
            var this_i = $(this).find("i");
            var i_text = this_i.text();
            if (i_text === 'web') {
                this_i.html('subtitles');
                $(".card-list-box").addClass("container");
            } else {
                this_i.html('web');
                $(".card-list-box").removeClass("container");
            }
            return false;
        });

        // 小屏幕导航条
        $("#mobile-menu-btn").sideNav();
        $("#mobile-menu-btn").click(function () {
            $('#sidenav-overlay').remove();
        });

        @if(false)
        $(window).scroll(function () {
            var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
            if (scrollTop >= 100) {
                $("#navbar-div").removeClass('navbar-fixed');
            } else {
                $("#navbar-div").addClass('navbar-fixed');
            }
        });
        @endif

        // 初始化模态层
        $('.modal').modal({
            dismissible: false,
            opacity: .1,
            starting_top: '30%',
            ending_top: '30%'
        });

        // 文章数据ajax
        function cardListData(pageHref, data) {
            if (typeof data === 'undefined') {
                data = {};
            }
            $("#loading-bar").modal('open');
            $.get(pageHref, data, function (listView) {
                $(".card-list-box").html(listView);
                $("#loading-bar").modal('close');
                $('.tooltipped').tooltip();
                return false;
            });
        }

        function cardListQuery() {
            var selectedLabel = "{{ isset($selectedLabel) && !empty($selectedLabel) ? $selectedLabel : '' }}";
            var searchText = $("#search-content").val();
            return {
                'label': selectedLabel,
                'desc': searchText
            };
        }

        // 分页请求
        $("body").on('click', '.pagination-href', function () {
            var pageHref = $(this).attr('href');
            if (pageHref !== 'javascript:;') {
                cardListData(pageHref, cardListQuery());
            }
            return false; // 阻止a链接跳转
        });
        // 页面文章列表初始化
        if ($(".card-list-box").length > 0) {
            cardListData("{{ url('home/articles-list') }}", cardListQuery());
        }
        // 时间轴文章ajax
        $(".month-li").click(function () {
            var monthVal = $(this).find('a').attr('href');
            var yearVal = $('.year-tab-bar').children('.active').text();
            $("#loading-bar").modal('open');
            $.get("{{ url('home/time-line/articles') }}", {'month': monthVal, 'year': yearVal}, function (listView) {
                $('#time-line-article').html(listView);
                $('.tooltipped').tooltip();
                $("#loading-bar").modal('close');
            });
        });
        // 时间轴页面文章初始化
        if ($("[href='#2017-January-01']").length > 0) {
            $("[href='#2017-January-01']").trigger('click');
        }
        // 搜索文章
        $("#search-form").submit(function () {
            if ($("#search-content").val().length <= 0) {
                Materialize.toast('请输入搜索内容!', 5000);
                return false;
            }
            cardListData("{{ url('home/articles-list') }}", cardListQuery());
            return false;
        });
        // 提交评论
        $("#discuss-form").submit(function () {
            $.ajax({
                type: 'post',
                url: "{{ route('home.discuss-article') }}",
                data: $("#discuss-form").serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (result) {
                    Materialize.toast(result.msg, 4000);
                    $("#discuss-form")[0].reset();
                },
                error: function (e) {
                    var eContent = errMsg(e);
                    Materialize.toast(eContent, 5000);
                    console.log('error', eContent);
                }
            });
            return false;
        });
        // ajax错误信息处理
        function errMsg(ajaxErrResult) {
            var errMsgStr = '';
            $.each(ajaxErrResult.responseJSON.errors, function (k, v) {
                for (var i = 0; i < v.length; i++) {
                    errMsgStr += v[i] + '<br/>';
                }
            });
            if (!errMsgStr) {
                return interfaceEXMsg;
            }
            return errMsgStr;
        }

        @yield('scriptContent')
    });
</script>

</html>
