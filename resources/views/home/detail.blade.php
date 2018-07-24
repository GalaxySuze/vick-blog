@extends('home.home')

@section('content')
    <!-- 目录 -->
    @section('outlineBar')
        <div class="hide-on-med-and-down">
            <ul id="outlineLi" class="dropdown-content">
                @if(!empty($detail['outline']))
                    @foreach($detail['outline'] as $outline)
                        <li><a href="#{{ $outline['titleId'] }}">
                                <b>{{ $outline['outlineTitle'] }}</b>
                            </a></li>
                    @endforeach
                @endif
            </ul>
            <nav>
                <div class="nav-wrapper theme-color-gradient">
                    <ul class="right">
                        <li>
                            <a class="dropdown-button" href="#" data-activates="outlineLi" id="outlineBtn">
                                目录<i class="material-icons right">arrow_drop_down</i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    @endsection

    <div class="section">
        <div class="row">
            <div class="container">
                <div class="col s12 m12 center-align">
                    <div class="section">
                        <!-- 分类 -->
                        @foreach($detail['label'] as $tag )
                            <div class="chip tooltipped" data-position="top" data-delay="50" data-tooltip="点击查看标签">
                                <img src="{{ asset('img/icon/' . $tag['label_icon']) }}" class="responsive-img" alt="{{ $tag['desc'] }}" >{{ $tag['label'] }}
                            </div>
                        @endforeach

                        {{--<div class="chip tooltipped" data-position="top" data-delay="50" data-tooltip="点击查看标签">--}}
                            {{--<img src="{{ asset('img/icon/laravel.png') }}" class="responsive-img" alt="PHP" >Laravel--}}
                        {{--</div>--}}
                        {{--<div class="chip tooltipped" data-position="top" data-delay="50" data-tooltip="点击查看标签">--}}
                            {{--<img src="{{ asset('img/icon/nginx.png') }}" class="responsive-img" alt="PHP" >Nginx--}}
                        {{--</div>--}}
                        <!-- 标题 -->
                        <div class="flow-text">
                            <h4>{{ $detail['title'] }}</h4>
                        </div>
                    </div>
                </div>

                <!-- 文章信息 -->
                <div class="col s12 m12 center-align">
                    <div class="valign-wrapper" style="color: #757575; font-size: 0.5rem; display: -webkit-inline-flex; display: inline-flex;">
                        <i class="material-icons red-text">assignment_ind</i>&nbsp; {{ $detail['created_user'] }} &nbsp;&nbsp;
                        <i class="material-icons yellow-text">visibility</i>&nbsp; {{ $detail['views'] }} &nbsp;&nbsp;
                        <i class="material-icons green-text">thumb_up</i>&nbsp; 66 &nbsp;&nbsp;
                        <i class="material-icons blue-text slide-comments-btn tooltipped" data-activates="slide-comments" data-position="bottom" data-delay="50" data-tooltip="点击查看评论区">textsms</i>&nbsp; 22 &nbsp;&nbsp;
                        <i class="material-icons pink-text">schedule</i>&nbsp; {{ $detail['release_time_str'] }}
                    </div>
                </div>

                <!-- 分割线 -->
                <div class="col s12 m12">
                    <hr class="grey darken-1" style="height: 2px; border: none;">
                </div>

                <!-- 文章 -->
                <div class="col s12 m12">
                    {!! $detail['content'] !!}
                </div>

                <!-- 图钉 -->
                <div class="fixed-action-btn horizontal left">
                    <a class="btn-floating btn-large grey">
                        <i class="large material-icons">menu</i>
                    </a>
                    <ul>
                        <li>
                            <a href="#" class="btn-floating red slide-comments-btn" data-activates="slide-comments">
                                <i class="material-icons">textsms</i>
                            </a>
                        </li>
                        <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
                        <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
                        <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
                    </ul>
                </div>

                <!-- 评论功能 -->
                <ul id="slide-comments" class="side-nav center-align">
                    <li>
                        <div class="userView">
                            <span class="white-text email" style="padding-bottom: 8%; font-size: 24px;">评论区</span>
                            <div class="background">
                                <img src="{{ asset('img/c5.jpg') }}">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="container">
                            <div class="row">
                                <form class="col s12 m12" action="" method="post">
                                    <input placeholder="昵称(必填)" id="name" type="text">
                                    <input placeholder="邮箱(必填,不会被公开)" id="email" type="email" class="validate">
                                    <textarea placeholder="评论" id="textarea" class="materialize-textarea"></textarea>
                                    <button type="button" class="red accent-1 waves-effect waves-light btn">提交</button>
                                </form>
                            </div>
                        </div>
                    </li>
                    <li><div class="divider"></div></li>
                    <li>
                        <b>评论总数：12</b>
                    </li>
                    <li>
                        <div class="card lighten-4 hoverable">
                            <div class="card-content grey lighten-5">
                                <span class="card-title"><b>Jack</b></span>
                                <p>我是一个很简单的卡片。我很擅长于包含少量的信息。我很方便，因为我只需要一个小标记就可以有效地使用。</p>
                            </div>
                            <div class="card-action" style="padding: 0;">
                                #1 · 一周前 · <a href="#" style="display: inline;padding: 0">回复</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="card lighten-4 hoverable">
                            <div class="card-content grey lighten-5">
                                <span class="card-title"><b>Rose</b></span>
                                <p>
                                    <a href="#" style="display: inline;padding: 0">@Jack</a>
                                    这个评论功能将呈现十分美妙的效果。敬请期待哟~
                                </p>
                            </div>
                            <div class="card-action" style="padding: 0;">
                                #1 · 一周前 · <a href="#" style="display: inline;padding: 0">回复</a>
                            </div>
                        </div>
                    </li>
                </ul>

                <!-- 分割线 -->
                <div class="col s12 m12">
                    <hr class="grey darken-1" style="height: 2px; border: none;">
                </div>

                <!-- 分享和附言 -->
                <div class="col s12 m12">
                    <blockquote class="valign-wrapper">
                        <i class="large material-icons" style="font-size: 25px;">info_outline</i>
                        <i class="large material-icons" style="font-size: 25px;">language</i>
                        <i class="large material-icons" style="font-size: 25px;">query_builder</i>
                        <i class="large material-icons" style="font-size: 25px;">settings_input_svideo</i>
                        <i class="large material-icons" style="font-size: 25px;">swap_vertical_circle</i>
                        <i class="large material-icons" style="font-size: 25px;">offline_pin</i>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#navbar-div">P.S 点击标题下面的留言图标打开评论区~</a>
                    </blockquote>
                </div>
            </div>

        </div>
    </div>
@endsection