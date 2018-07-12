<div class="section">
    <div class="row">
        @if(isset($articles))
            @foreach($articles as $articleList)
                <div class="col s12 m3">
                    @foreach($articleList as $item)
                        <div class="card z-depth-2 hoverable">
                            <div class="card-image">
                                <img src="{{ $item['page_image'] }}">
                                <span class="card-title">{{ $item['release_time'] }}</span>
                            </div>
                            <div class="card-content waves-effect">
                                <a href="{{ url('home/detail') }}">
                                    {{ $item['desc'] }}
                                </a>
                            </div>
                            <div class="card-action flow-text">
                                @foreach($item['label'] as $tags)
                                    <img src="{{ asset('img/icon/' . $tags['label_icon']) }}" class="responsive-img tooltipped" alt="{{ $tags['label'] }}" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am {{ $tags['label'] }}">
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif

        {{--<div class="col s12 m3">--}}
            {{--<div class="card z-depth-2 hoverable">--}}
                {{--<div class="card-image">--}}
                    {{--<img src="{{ asset('img/c9.jpg') }}">--}}
                    {{--<span class="card-title">立春</span>--}}
                {{--</div>--}}
                {{--<div class="card-content">--}}
                    {{--<a href="#" style="color: #09003f">我是一个很简单的卡片。我很擅长于包含少量的信息。我很方便，因为我只需要一个小标记就可以有效地使用。</a>--}}
                {{--</div>--}}
                {{--<div class="card-action">--}}
                    {{--<img src="{{ asset('img/icon/php.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">--}}
                    {{--<img src="{{ asset('img/icon/linux.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">--}}
                    {{--<img src="{{ asset('img/icon/git.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">--}}
                    {{--<img src="{{ asset('img/icon/vuejs.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="card z-depth-2 hoverable">--}}
                {{--<div class="card-image">--}}
                    {{--<img src="{{ asset('img/c2.jpg') }}">--}}
                    {{--<span class="card-title">三月</span>--}}
                {{--</div>--}}
                {{--<div class="card-content">--}}
                    {{--<p>我是一个很简单的卡片。我很擅长于包含少量的信息。我很方便，因为我只需要一个小标记就可以有效地使用。</p>--}}
                {{--</div>--}}
                {{--<div class="card-action">--}}
                    {{--<img src="{{ asset('img/icon/life.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">--}}
                    {{--<img src="{{ asset('img/icon/angular.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col s12 m3">--}}
            {{--<div class="card z-depth-2 hoverable">--}}
                {{--<div class="card-image">--}}
                    {{--<img src="{{ asset('img/c10.jpg') }}">--}}
                    {{--<span class="card-title">立春</span>--}}
                {{--</div>--}}
                {{--<div class="card-content">--}}
                    {{--<a href="#" style="color: #09003f">我是一个很简单的卡片。我很擅长于包含少量的信息。我很方便，因为我只需要一个小标记就可以有效地使用。</a>--}}
                {{--</div>--}}
                {{--<div class="card-action">--}}
                    {{--<img src="{{ asset('img/icon/php.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">--}}
                    {{--<img src="{{ asset('img/icon/linux.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">--}}
                    {{--<img src="{{ asset('img/icon/git.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">--}}
                    {{--<img src="{{ asset('img/icon/vuejs.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="card z-depth-2 hoverable">--}}
                {{--<div class="card-image">--}}
                    {{--<img src="{{ asset('img/c3.jpg') }}">--}}
                    {{--<span class="card-title">十二月</span>--}}
                {{--</div>--}}
                {{--<div class="card-content">--}}
                    {{--<a href="#" style="color: #09003f">我是一个很简单的卡片。我很擅长于包含少量的信息。我很方便，因为我只需要一个小标记就可以有效地使用...</a>--}}
                {{--</div>--}}
                {{--<div class="card-action">--}}
                    {{--<img src="{{ asset('img/icon/python.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">--}}
                    {{--<img src="{{ asset('img/icon/js.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col s12 m3">--}}
            {{--<div class="card z-depth-2 hoverable">--}}
                {{--<div class="card-image">--}}
                    {{--<img src="{{ asset('img/c11.jpg') }}">--}}
                    {{--<span class="card-title">立春</span>--}}
                {{--</div>--}}
                {{--<div class="card-content">--}}
                    {{--<a href="#" style="color: #09003f">我是一个很简单的卡片。我很擅长于包含少量的信息。我很方便，因为我只需要一个小标记就可以有效地使用。</a>--}}
                {{--</div>--}}
                {{--<div class="card-action">--}}
                    {{--<img src="{{ asset('img/icon/php.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">--}}
                    {{--<img src="{{ asset('img/icon/linux.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">--}}
                    {{--<img src="{{ asset('img/icon/git.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">--}}
                    {{--<img src="{{ asset('img/icon/vuejs.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="card z-depth-2 hoverable">--}}
                {{--<div class="card-image">--}}
                    {{--<img src="{{ asset('img/c6.jpg') }}">--}}
                    {{--<span class="card-title">立春</span>--}}
                {{--</div>--}}
                {{--<div class="card-content">--}}
                    {{--<a href="#" style="color: #09003f">我是一个很简单的卡片。我很擅长于包含少量的信息。我很方便，因为我只需要一个小标记就可以有效地使用。</a>--}}
                {{--</div>--}}
                {{--<div class="card-action">--}}
                    {{--<img src="{{ asset('img/icon/php.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">--}}
                    {{--<img src="{{ asset('img/icon/linux.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">--}}
                    {{--<img src="{{ asset('img/icon/git.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">--}}
                    {{--<img src="{{ asset('img/icon/vuejs.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>

    <!-- pagination -->
    <div class="section center-align">
        <div class="row">
            <div class="col s12 m12">
                <ul class="pagination">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="active"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>