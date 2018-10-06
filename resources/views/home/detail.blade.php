@extends('home.home')

@section('headTitle')- {{ $detail['title'] }}@endsection

@section('headKeywords'){{ $detail['keyword'] }}@endsection

@section('content')
    <!-- 目录 -->
    @section('outlineBar')
        <li>
            <a class="dropdown-button" href="#" data-activates="outlineLi" id="outlineBtn">
                目录<i class="material-icons right">arrow_drop_down</i>
            </a>
        </li>
        <ul id="outlineLi" class="dropdown-content">
            @if(!empty($detail['outline']))
                @foreach($detail['outline'] as $outline)
                    <li>
                        <a href="#{{ $outline['titleId'] }}">
                            <b>{{ $outline['outlineTitle'] }}</b>
                        </a>
                    </li>
                @endforeach
            @else
                <li><a href="#!">未生成目录</a></li>
            @endif
        </ul>
    @endsection

    <div class="section">
        <div class="row container" style="width: 50%">
            <div class="col s12 m12 center-align">
                <div class="section">
                    <!-- 分类 -->
                    @foreach($detail['label'] as $tag )
                        <div class="chip tooltipped" data-position="top" data-delay="50" data-tooltip="点击查看标签">
                            <a href="{{ route('home.label-page', ['label' => $tag['id']]) }}" style="color: #0C0C0C;">
                                <img src="{{ $tag['label_icon'] }}" class="responsive-img" alt="{{ $tag['desc'] }}">
                                {{ $tag['label'] }}
                            </a>
                        </div>
                    @endforeach
                    <!-- 标题 -->
                    <div class="flow-text">
                        <h3>{{ $detail['title'] }}</h3>
                    </div>
                </div>
            </div>

            <!-- 文章信息 -->
            <div class="col s12 m12 center-align">
                <div class="valign-wrapper" style="color: #757575; font-size: 0.5rem; display: -webkit-inline-flex; display: inline-flex;">
                    <i class="material-icons red-text">assignment_ind</i>&nbsp; {{ $detail['created_user'] }} &nbsp;&nbsp;
                    <i class="material-icons orange-text">visibility</i>&nbsp; {{ $detail['views'] }} &nbsp;&nbsp;
                    {{--<i class="material-icons green-text">reply</i>&nbsp; {{ $detail['share'] }} &nbsp;&nbsp;--}}
                    <i class="material-icons blue-text">textsms</i>&nbsp; {{ $detail['comments_count'] }} &nbsp;&nbsp;
                    <i class="material-icons pink-text">schedule</i>&nbsp; {{ $detail['release_time_pop'] }}
                </div>
            </div>

            <!-- 文章内容 -->
            <div class="col s12 m12 content-typo card-panel z-depth-2" style="background-color: #f5f8fa; padding: 15px 20px 1px 30px">
                {!! $detail['content'] !!}

                <!-- 知识共享协议 -->
                <p class="red-text" style="padding: 15px; border: 1px #ff8a80 solid; margin-top: 6px; font-size: 13px;border-radius: 5px;">
                    <em>由 {{ $detail['created_user'] }} 创作，采用 <a href="https://creativecommons.org/licenses/by-nc/4.0/">知识共享 署名-非商业性使用 4.0 国际 许可协议进行许可。</a> 转载请注明出处。</em>
                </p>
            </div>

            <!-- 社交分享 -->
            <div class="col s12 m12 center-align" style="padding: 16px;">
                <div class="social-share"></div>
            </div>

            <!-- 评论区 -->
            <div class="col s12 m12">
                <div class="row">
                    <div class="section">
                        <div class="col s12 m12 center-align">
                            <div style="width: auto; height: 80px;background: url('{{ asset('img/c5.jpg') }}');background-size: cover;position: center; line-height: 80px;font-size: large;color: #EEEEEE;margin-bottom: 16px;" class="z-depth-2">
                                评论区
                            </div>
                        </div>
                        <form class="col s12 m12" action="#" method="post" id="discuss-form">
                            @csrf

                            @guest
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">person_pin</i>
                                    <input id="nickname" type="text" class="validate" name="nickname">
                                    <label for="nickname">昵称(必填)</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">email</i>
                                    <input id="email" type="email" class="validate" name="email">
                                    <label for="email">邮箱(必填,不会公开)</label>
                                </div>
                            @else
                                <div class="input-field col s12">
                                    <input id="nickname" type="hidden" name="nickname" value="{{ Auth::user()->name }}">
                                    <input id="email" type="hidden" name="email" value="{{ Auth::user()->email }}">
                                </div>
                            @endguest
                            <div class="input-field col s12">
                                <i class="material-icons prefix">mode_edit</i>
                                <textarea id="content" class="materialize-textarea" name="content" length="420"></textarea>
                                <label for="content">评论内容</label>
                            </div>
                            <div class="input-field col s12 center-align" style="padding: 12px;">
                                <input type="hidden" name="target" value="{{ $detail['id'] }}">
                                <button type="submit" class="blue accent-1 waves-effect waves-light btn">
                                    <i class="material-icons right">send</i>发表
                                </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="red accent-1 waves-effect waves-light btn">
                                    <i class="material-icons right">undo</i>重置
                                </button>
                            </div>
                        </form>
                        <!-- 评论 -->
                        <div class="row" style="padding: 16px;">
                            <div class="col s6">
                                <b>评论列表</b> <font color="#9e9e9e">(已有{{ $detail['comments_count'] }}条评论)</font>
                            </div>
                            <div class="col s6 right-align">
                                <input name="content-sort" type="radio" id="sort-time" class="with-gap" />
                                <label for="sort-time">时间</label>
                                <input name="content-sort" type="radio" id="sort-thumb" class="with-gap" />
                                <label for="sort-thumb">热度</label>
                            </div>
                        </div>
                        <div class="section center-align">
                            @foreach($detail['comments'] as $comment)
                                <div class="col s12">
                                    <div class="card lighten-4 hoverable">
                                        <div class="card-content">
                                            <div class="card-title center-align">
                                                <b>{{ $comment['nickname'] }}</b>
                                            </div>
                                            <p>「 {{ $comment['content'] }} 」</p>
                                        </div>
                                        <div class="card-action grey lighten-5" style="padding: 16px;">
                                            #{{ $comment['floor'] }} · {{ $comment['comment_time'] }} · <a href="#!" class="reply-comment" style="display: inline;padding: 0">回复</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 返回顶部 -->
    @includeWhen(isset($detail), 'home.layouts.footer.back-top')
@endsection