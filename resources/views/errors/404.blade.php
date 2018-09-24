<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>404</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="images/x-icon" href="{{ asset('icon.png') }}">
    <link rel="stylesheet" href="{{ asset('404/css/404.css') }}">

    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="{{ asset('404/js/scriptalizer.js') }}" type="text/javascript"></script>
    <style>
        footer{text-align:center; margin-top: 26px;}
        .footer-a {text-decoration: none;color: #eeeeff; font-size: 14px;}
    </style>
</head>
<body>
<main>
    <div id="parallax">
        <div class="error1">
            <img src="{{ asset('404/images/wand.jpg') }}" alt="Mauer" />
        </div>
        <div class="error2">
            <img src="{{ asset('404/images/licht.png') }}" alt="Licht" />
        </div>
        <div class="error3">
            <img src="{{ asset('404/images/halo1.png') }}" alt="Halo1" />
        </div>
        <div class="error4">
            <img src="{{ asset('404/images/halo2.png') }}" alt="Halo2" />
        </div>
        <div class="error5">
            <img src="{{ asset('404/images/batman-404.png') }}" alt="Batcave 404" />
        </div>
    </div>
</main>
<footer>
    <a href="{{ route('home.index') }}" class="footer-a">
        返回首页
    </a>
    © 2017 - {{ date('Y', time()) }} Copyright Vick`Blog. All Rights Reserved.
    <a href="http://www.miitbeian.gov.cn/" class="footer-a">
        {{ env('DOMAIN_NAME_FILING') }}
    </a>
</footer>
</body>
<script type="text/javascript">
    $(function(){
        $('#parallax').jparallax({});
    });
</script>
</html>


