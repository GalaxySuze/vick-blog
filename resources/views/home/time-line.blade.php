@extends('home.home')

@section('content')
    <div class="section container">
        <div class="row">
            <!-- year -->
            <div class="col s12 m12">
                <ul class="tabs tabs-fixed-width z-depth-1">
                    @foreach($yearTimeline as $year)
                        <li class="tab col s12 year-tab-bar">
                            <a href="#month-tab-{{ $year }}">{{ $year }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- month -->
            <div class="col s12 m12">
                @foreach($yearTimeline as $yearBar)
                    <ul class="tabs tabs-fixed-width z-depth-1" id="month-tab-{{ $yearBar }}">
                        @foreach($monthTimeline as $month)
                            <li class="tab month-li">
                                <a href="#{{ $yearBar . '-' . $month['en'] }}">{{ $month['zh'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            </div>
            <!-- articles -->
            <div id="time-line-article" class="col s12 m12"></div>
        </div>
    </div>
@endsection