<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="images/x-icon" href="{{ asset('charmman_icon.png') }}">

        <title>Hello Charm Man</title>

        <link type="text/css" rel="stylesheet" href="{{ asset('materialize/css/materialize.min.css') }}"  media="screen,projection"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js
"></script>
        <script type="text/javascript" src="{{ asset('materialize/js/materialize.min.js') }}"></script>
        <style>
            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
            }
            main {
                flex: 1 0 auto;
            }
        </style>
    </head>
    <body>
    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo"><i class="material-icons">cloud</i>Logo</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#"><i class="material-icons">search</i></a></li>
                <li><a href="#"><i class="material-icons">view_module</i></a></li>
                <li><a href="#"><i class="material-icons">refresh</i></a></li>
                <li><a href="#"><i class="material-icons">more_vert</i></a></li>
            </ul>
        </div>
    </nav>
    <div class="carousel carousel-slider center" data-indicators="true">
        <div class="carousel-fixed-item center">
            <a class="btn waves-effect white grey-text darken-text-2">按钮</a>
        </div>
        <div class="carousel-item red white-text" href="#one!">
            <h2>第一面板</h2>
            <p class="white-text">这是第一面板</p>
        </div>
        <div class="carousel-item amber white-text" href="#two!">
            <h2>第二面板</h2>
            <p class="white-text">这是第二面板</p>
        </div>
        <div class="carousel-item green white-text" href="#three!">
            <h2>第三面板</h2>
            <p class="white-text">这是第三面板</p>
        </div>
        <div class="carousel-item blue white-text" href="#four!">
            <h2>第四面板</h2>
            <p class="white-text">这是第四面板</p>
        </div>
    </div>
    <div class="container">
        <div class="divider"></div>
        <div class="section">
            <div class="row">
                <div class="col s4 card-panel hoverable">
                    <!-- Promo Content 1 goes here -->
                    demo
                </div>
                <div class="col s4 card-panel hoverable">
                    <!-- Promo Content 2 goes here -->
                    demo
                </div>
                <div class="col s4 card-panel hoverable">
                    <!-- Promo Content 3 goes here -->
                    demo
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <div class="section">
            <h5>第三部分</h5>
            <p>集体</p>
        </div>
    </div>
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">页脚内容</h5>
                    <p class="grey-text text-lighten-4">你可以用行和列来组织你的页脚内容。</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">链接</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">链接 1</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">链接 2</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">链接 3</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">链接 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2014 Copyright 文本
                <a class="grey-text text-lighten-4 right" href="#!">更多链接</a>
            </div>
        </div>
    </footer>
    </body>
    <script>
        $(document).ready(function () {
            $('.carousel.carousel-slider').carousel({full_width: true});
        });
    </script>
</html>
