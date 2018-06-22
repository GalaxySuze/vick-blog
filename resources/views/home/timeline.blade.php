@extends('home.home')

@section('content')
    <div class="section container">
        <div class="row">
            <div class="col s12 m12">
                <ul class="tabs z-depth-1">
                    <li class="tab" id="year-tab-first"><a href="#month-tab-2016" class="active" >2016</a></li>
                    <li class="tab"><a href="#month-tab-2017">2017</a></li>
                    <li class="tab"><a href="#month-tab-2018">2018</a></li>
                    <li class="tab"><a href="#month-tab-2019">2019</a></li>
                    <li class="tab"><a href="#month-tab-2020">2020</a></li>
                </ul>
            </div>
            <div id="month-tab-2016" class="col s12">
                <ul class="tabs z-depth-1">
                    <li class="tab"><a href="#January">一月</a></li>
                    <li class="tab"><a href="#February">二月</a></li>
                    <li class="tab"><a href="#March">三月</a></li>
                    <li class="tab"><a href="#April">四月</a></li>
                    <li class="tab"><a href="#May">五月</a></li>
                    <li class="tab"><a href="#June">六月</a></li>
                    <li class="tab"><a href="#July">七月</a></li>
                    <li class="tab"><a href="#August">八月</a></li>
                    <li class="tab"><a href="#September">九月</a></li>
                    <li class="tab"><a href="#October">十月</a></li>
                    <li class="tab"><a href="#November">十一月</a></li>
                    <li class="tab"><a href="#December">十二月</a></li>
                </ul>
            </div>
            <div id="January" class="col s12 m12">
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card small horizontal hoverable">
                            <div class="card-image hide-on-small-only" style="width: 100%;height: 100%; background: url('{{ asset('img/c10.jpg') }}'); background-size: cover;">
                                <span class="card-title">那年三月</span>
                            </div>
                            <div class="card-stacked center-align">
                                <div class="card-content">
                                    <a href="{{ url('detail') }}" class="waves-effect">
                                        <blockquote>
                                            <h5><b>深入浅出Composer</b></h5>
                                        </blockquote>
                                        我是一个很简单的卡片。我很擅长于包含少量的信息。我是一个很简单的卡片。我很擅长于包含少量的信息。我是一个很简单的卡片。我很擅长于包含少量的信息。
                                    </a>
                                </div>
                                <div class="card-action">
                                    <img src="{{ asset('img/icon/life.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">
                                    <img src="{{ asset('img/icon/linux.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">
                                    <img src="{{ asset('img/icon/git.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">
                                    <img src="{{ asset('img/icon/vuejs.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12">
                        <div class="card small horizontal hoverable">
                            <div class="card-image hide-on-small-only" style="width: 100%;height: 100%; background: url('{{ asset('img/c15.jpg') }}'); background-size: cover;">
                                <span class="card-title">那年大暑</span>
                            </div>
                            <div class="card-stacked center-align">
                                <div class="card-content">
                                    <a href="{{ url('detail') }}" class="waves-effect">
                                        <blockquote>
                                            <h5><b>深入浅出Composer</b></h5>
                                        </blockquote>
                                        我是一个很简单的卡片。我很擅长于包含少量的信息。我是一个很简单的卡片。我很擅长于包含少量的信息。我是一个很简单的卡片。我很擅长于包含少量的信息。
                                    </a>
                                </div>
                                <div class="card-action">
                                    <img src="{{ asset('img/icon/life.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">
                                    <img src="{{ asset('img/icon/linux.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">
                                    <img src="{{ asset('img/icon/git.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">
                                    <img src="{{ asset('img/icon/vuejs.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12">
                        <div class="card small horizontal hoverable">
                            <div class="card-image hide-on-small-only" style="width: 100%;height: 100%; background: url('{{ asset('img/c9.jpg') }}'); background-size: cover;">
                                <span class="card-title">那年大暑</span>
                            </div>
                            <div class="card-stacked center-align">
                                <div class="card-content">
                                    <a href="{{ url('detail') }}" class="waves-effect">
                                        <blockquote>
                                            <h5><b>深入浅出Composer</b></h5>
                                        </blockquote>
                                        我是一个很简单的卡片。我很擅长于包含少量的信息。我是一个很简单的卡片。我很擅长于包含少量的信息。我是一个很简单的卡片。我很擅长于包含少量的信息。
                                    </a>
                                </div>
                                <div class="card-action">
                                    <img src="{{ asset('img/icon/life.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">
                                    <img src="{{ asset('img/icon/linux.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">
                                    <img src="{{ asset('img/icon/git.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">
                                    <img src="{{ asset('img/icon/vuejs.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12">
                        <div class="card small horizontal hoverable">
                            <div class="card-image hide-on-small-only" style="width: 100%;height: 100%; background: url('{{ asset('img/c7.jpg') }}'); background-size: cover;">
                                <span class="card-title">那年大暑</span>
                            </div>
                            <div class="card-stacked center-align">
                                <div class="card-content">
                                    <a href="{{ url('detail') }}" class="waves-effect">
                                        <blockquote>
                                            <h5><b>深入浅出Composer</b></h5>
                                        </blockquote>
                                        我是一个很简单的卡片。我很擅长于包含少量的信息。我是一个很简单的卡片。我很擅长于包含少量的信息。我是一个很简单的卡片。我很擅长于包含少量的信息。
                                    </a>
                                </div>
                                <div class="card-action">
                                    <img src="{{ asset('img/icon/life.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">
                                    <img src="{{ asset('img/icon/linux.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">
                                    <img src="{{ asset('img/icon/git.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">
                                    <img src="{{ asset('img/icon/vuejs.png') }}" class="responsive-img tooltipped" alt="PHP" width="10%" height="10%" data-position="top" data-delay="50" data-tooltip="I am PHP">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection