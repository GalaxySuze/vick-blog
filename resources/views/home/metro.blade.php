<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="images/x-icon" href="{{ asset('charmman_icon.png') }}">

    <title>Hello Charm Man @yield('title')</title>

    <link type="text/css" rel="stylesheet" href="{{ asset('materialize/css/materialize.min.css') }}"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js
"></script>
    <script type="text/javascript" src="{{ asset('materialize/js/materialize.min.js') }}"></script>

    <style>
        html, body {
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="blue lighten-3" style="height: 100%;">
        <!-- parallax -->
        <div class="parallax-container hide-on-med-and-down">
            <div class="parallax">
                <img src="{{ asset('img/soul.jpg') }}" alt="cover" id="cover" class="responsive-img">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">&nbsp;</div>
                <div class="col s6 m4 l2">
                    <div class="card-panel blue accent-1 center-align">
                        <span class="white-text ">
                            <i class="medium material-icons">power_settings_new</i>
                        </span>
                    </div>
                </div>

                <div class="col s6 m4 l2">
                    <div class="card-panel deep-purple accent-1 center-align">
                        <span class="white-text ">
                            <i class="medium material-icons">language</i>
                        </span>
                    </div>
                </div>

                <div class="col s12 m5 l4">
                    <div class="card horizontal teal accent-2 white-text center-align">
                        <div class="valign-wrapper" style="padding: 20px;">
                            <i class="medium material-icons">perm_phone_msg</i>
                        </div>
                        <div class="card-content">
                            <h4>Phone</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container section">
                <div class="row center-align">
                    <div class="col s12 m3">
                        <div class="card-panel red accent-1 hoverable tooltipped" data-position="bottom" data-delay="50" data-tooltip="I am PHP">
                        <span class="white-text">
                            <img src="{{ asset('img/icon/php.png') }}" alt="php">
                        </span>
                        </div>
                    </div>
                    <div class="col s12 m3">
                        <div class="card-panel yellow accent-1 hoverable tooltipped " data-position="bottom" data-delay="50" data-tooltip="I am PHP">
                        <span class="white-text">
                            <img src="{{ asset('img/icon/nginx.png') }}" alt="php">
                        </span>
                        </div>
                    </div>
                    <div class="col s12 m3">
                        <div class="card-panel green accent-1 hoverable tooltipped" data-position="bottom" data-delay="50" data-tooltip="I am PHP">
                        <span class="white-text">
                            <img src="{{ asset('img/icon/python.png') }}" alt="php">
                        </span>
                        </div>
                    </div>
                    <div class="col s12 m3">
                        <div class="card-panel light-blue accent-1 hoverable tooltipped" data-position="bottom" data-delay="50" data-tooltip="I am PHP">
                        <span class="white-text">
                            <img src="{{ asset('img/icon/js.png') }}" alt="php">
                        </span>
                        </div>
                    </div>

                    <div class="col s12 m3">
                        <div class="card-panel red accent-1 hoverable tooltipped" data-position="bottom" data-delay="50" data-tooltip="I am PHP">
                        <span class="white-text">
                            <img src="{{ asset('img/icon/angular.png') }}" alt="php">
                        </span>
                        </div>
                    </div>
                    <div class="col s12 m3">
                        <div class="card-panel yellow accent-1 hoverable tooltipped " data-position="bottom" data-delay="50" data-tooltip="I am PHP">
                        <span class="white-text">
                            <img src="{{ asset('img/icon/vuejs.png') }}" alt="php">
                        </span>
                        </div>
                    </div>
                    <div class="col s12 m3">
                        <div class="card-panel green accent-1 hoverable tooltipped" data-position="bottom" data-delay="50" data-tooltip="I am PHP">
                        <span class="white-text">
                            <img src="{{ asset('img/icon/life.png') }}" alt="php">
                        </span>
                        </div>
                    </div>
                    <div class="col s12 m3">
                        <div class="card-panel light-blue accent-1 hoverable tooltipped" data-position="bottom" data-delay="50" data-tooltip="I am PHP">
                        <span class="white-text">
                            <img src="{{ asset('img/icon/book.png') }}" alt="php">
                        </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
