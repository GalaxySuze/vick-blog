@extends('home.home')

@section('content')
    <div class="container section">
        <div class="row center-align">
            @foreach($labelList as $label)
                <div class="col s12 m2" style="padding-top: 10px;">
                    <div class="chip hoverable">
                        <img src="{{ asset("img/icon/{$label['label_icon']}") }}" class="responsive-img" alt="{{ $label['desc'] }}" >
                        {{ $label['label'] }}：{{ $label['articleTotal'] }}篇
                    </div>
                </div>
            @endforeach

            {{--<div class="col s12 m2" style="padding-top: 10px;">--}}
                {{--<div class="chip hoverable">--}}
                    {{--<img src="{{ asset('img/icon/redis.png') }}" class="responsive-img" alt="PHP" >--}}
                    {{--PHP：1篇--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col s12 m2" style="padding-top: 10px;">--}}
                {{--<div class="chip hoverable">--}}
                    {{--<img src="{{ asset('img/icon/python.png') }}" class="responsive-img" alt="PHP" >--}}
                    {{--Python：2篇--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col s12 m2" style="padding-top: 10px;">--}}
                {{--<div class="chip hoverable">--}}
                    {{--<img src="{{ asset('img/icon/nginx.png') }}" class="responsive-img" alt="PHP" >--}}
                    {{--Nginx：4篇--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col s12 m2" style="padding-top: 10px;">--}}
                {{--<div class="chip hoverable">--}}
                    {{--<img src="{{ asset('img/icon/life.png') }}" class="responsive-img" alt="PHP" >--}}
                    {{--生活：12篇--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col s12 m2" style="padding-top: 10px;">--}}
                {{--<div class="chip hoverable">--}}
                    {{--<img src="{{ asset('img/icon/book.png') }}" class="responsive-img" alt="PHP" >--}}
                    {{--书籍：10篇--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col s12 m2" style="padding-top: 10px;">--}}
                {{--<div class="chip hoverable">--}}
                    {{--<img src="{{ asset('img/icon/js.png') }}" class="responsive-img" alt="PHP" >--}}
                    {{--JS：10篇--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col s12 m2" style="padding-top: 10px;">--}}
                {{--<div class="chip hoverable">--}}
                    {{--<img src="{{ asset('img/icon/vuejs.png') }}" class="responsive-img" alt="PHP" >--}}
                    {{--Vuejs：6篇--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>

    <div class="progress">
        <div class="determinate red accent-1" style="width: 100%"></div>
    </div>

    <!-- search bar -->
    @component('home.layouts.main.search-bar') @endcomponent

    <div class="container">
        <!-- card list -->
        @component('home.layouts.main.card-list') @endcomponent
    </div>



@endsection