<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="images/x-icon" href="{{ asset('icon.png') }}">

    <title>Hello World @yield('title')</title>

    <!-- css -->
    <link type="text/css" rel="stylesheet" href="{{ asset('materialize/css/materialize.min.css') }}"
          media="screen,projection"/>

    <!-- font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- js -->
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('materialize/js/materialize.min.js') }}"></script>

    <!-- highlight -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>

    <style>
        html {
            height: 100%;
        }

        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background-color: #f5f8fa;
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
            color: #09003f
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
<header>
    <!-- navigation bar -->
    <div class="navbar-fixed" id="navbar-div">
        <nav>
            <div class="nav-wrapper" style="background: #98A9F9;">
                <a href="{{ url('/') }}" class="brand-logo center waves-effect">Vick ` Blog</a>
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
                    <li><a href="#" class="waves-effect">求知</a></li>
                    <li><a href="#" class="waves-effect">生活</a></li>
                    <li><a href="{{ url('home/label') }}" class="waves-effect">标签</a></li>
                    <li><a href="{{ url('home/time-line') }}" class="waves-effect">归档</a></li>
                    <li><a href="{{ url('home/about') }}" class="waves-effect">关于</a></li>
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
                    <li><a href="#" class="waves-effect">求知</a></li>
                    <li><a href="#" class="waves-effect">生活</a></li>
                    <li><a href="{{ url('home/label') }}" class="waves-effect">标签</a></li>
                    <li><a href="{{ url('home/time-line') }}" class="waves-effect">归档</a></li>
                    <li><a href="{{ url('home/about') }}" class="waves-effect">关于</a></li>
                </ul>
                @yield('outlineBar')
            </div>
        </nav>
    </div>
</header>

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
        @component('home.layouts.main.card-list', [ 'articles' => $articles ?? []]) @endcomponent

    @show
</main>

<!-- footer -->
<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">
                    <img src="{{ asset('logo.png') }}" alt="logo" width="50%" height="50%">
                </h5>
                <p class="grey-text text-lighten-4">网站图片均来自网络，如有侵权请联系ABOUT ME页面邮箱，立删。</p>
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
    <div class="footer-copyright">
        <div class="container">
            © 2017 - {{ date('Y', time()) }} Copyright Vick`Blog. All Rights Reserved.
            <a class="grey-text text-lighten-4 right" href="#">😏Vicky</a>
        </div>
    </div>
</footer>
</body>
<script>
    $(document).ready(function () {
        // 代码高亮
        hljs.initHighlightingOnLoad();
        // Materialize.fadeInImage('#cover');
        // $('.parallax').parallax();
        $('.scrollspy').scrollSpy();
        $('.slider').slider({full_width: true});
        $('ul.tabs').tabs('select_tab', 'month-tab-2016');

        $('.collapsible').collapsible();

        $('.carousel, .carousel-slider').carousel({
            full_width: true
        });

        $('#outlineBtn').dropdown({
            constrain_width: false, // 自动宽度
            belowOrigin: true // 下拉列表在触发的下方显示
        });

        // 侧边评论栏
        $(".slide-comments-btn").sideNav({
            menuWidth: '32%', // Default is 240
            edge: 'right', // Choose the horizontal origin
            draggable: true // Choose whether you can drag to open on touch screens
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

        $(".month-li").click(function () {
            var monthVal = $(this).find('a').attr('href');
            var yearVal = $('.year-tab-bar').children('.active').text();
            $.get("{{ url('home/time-line/articles') }}", {'month': monthVal, 'year': yearVal}, function (result) {
                $('#time-line-article').html(result);
            })
        });
        $("[href='#January_01']").trigger('click');
    });
</script>

</html>
