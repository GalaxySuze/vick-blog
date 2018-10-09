<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="images/x-icon" href="<?php echo e(asset('icon.png')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Login</title>

    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/typed.js/2.0.5/typed.js"></script>

    <style>
        /* 打字机动画 */
        .typed-cursor{
            opacity: 1;
            -webkit-animation: blink 0.7s infinite;
            -moz-animation: blink 0.7s infinite;
            animation: blink 0.7s infinite;
        }
        @keyframes  blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        @-webkit-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        @-moz-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }

        /* terminal box */
        body {
            background-color: #83858C;
        }
        .terminal_window {
            margin: 10% auto;
            width: 600px;
            height: 450px;
            tex-align: left;
            postion: relative;
            border-radius: 10px;
            background-color: #0D1F2D;
            color: #F4FAFF;
            font-size: 11pt;
            box-shadow: rgba(0, 0, 0, 0.8) 0 20px 70px;
        }
        .terminal_window header {
            background-color: #E0E8F0;
            height: 30px;
            border-radius: 8px 8px 0 0;
            padding-left: 10px;
        }
        .terminal_window .button {
            width: 12px;
            height: 12px;
            margin: 10px 4px 0 0;
            display: inline-block;
            border-radius: 8px;
        }
        .terminal_text {
            margin-top: 15px;
            margin-left: 20px;
            font-family: Menlo, Monaco, "Consolas", "Courier New", "Courier";
        }
        .red_btn {
            background-color: #E75448;
        }
        .green_btn {
            background-color: #3BB662;
        }
        .yellow_btn {
            background-color: #E5C30F;
        }
        #typed-strings {
            display: inline-block;
            postiion: relative;
        }
        #typed {
            font-family: Menlo, Monaco, "Consolas", "Courier New", "Courier";
            margin-left: 10px;
        }
        .head-symbol {
            color: #ff8a80;
        }
        .uname {
            color: #80d8ff;
        }
        .home-symbol {
            color: #ffff8d;
        }
        .mac {
            color: #b9f6ca;
        }
        .pass {
            color: #78909c;
        }
        #pass-input {
            background-color: #0D1F2D;
            border: none;
            color: #F4FAFF;
        }
    </style>

    <!-- 百度网站统计 -->
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?c5d1faf4548a7b97c3308cdfd3c18494";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics Google网站统计 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-127193501-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-127193501-1');
    </script>
</head>
<body>
    <div class="terminal_window">
        <header>
            <div class="red_btn button"></div>
            <div class="green_btn button"></div>
            <div class="yellow_btn button"></div>
        </header>
        <div id="typed-strings" class="terminal_text">
            <p><span class="head-symbol">$</span> <span class="uname">Vick</span> @ <span class="mac">MacBook-Pro</span> in <b class="home-symbol">~</b> [<?php echo e(date('H:i:s', time())); ?>]</p>
            <span class="head-symbol">$</span><span id="typed"></span>
        </div>
    </div>
</body>
<script>
    var typed = new Typed('#typed', {
        strings: ["ssh my-site", "ssh your-heart <p class='pass'>Password:🔑</p><span id='input-box'></span>"],
        typeSpeed: 100, //打字速度
        backSpeed: 50, //回退速度
        onComplete: function (result) {
            $("#input-box").html('<input type="password" id="pass-input" name="pass" value="******">');
        }
    });
</script>
</html>