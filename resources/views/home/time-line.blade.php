@extends('home.home')

@section('content')
    <div class="section container">
        <div class="row">
            <!-- year -->
            <div class="col s12 m12">
                <ul class="tabs z-depth-1">
                    @foreach($yearTimeline as $year)
                        <li class="tab waves-effect year-tab-bar">
                            <a href="#month-tab-{{ $year }}">{{ $year }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- month -->
            <div class="col s12 m12">
                @foreach($yearTimeline as $yearBar)
                    <ul class="tabs z-depth-1" id="month-tab-{{ $yearBar }}">
                        @foreach($monthTimeline as $month)
                            <li class="tab waves-effect month-li">
                                <a href="#{{ $month['en'] }}">{{ $month['zh'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            </div>
            <!-- articles -->
            <div id="time-line-article" class="col s12 m12"></div>
            {{--@component('home.layouts.main.across-card-list', [ 'articles' => $articles ?? [] ]) @endcomponent--}}
        </div>
    </div>
@endsection