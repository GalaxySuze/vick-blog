@extends('home.home')

@section('content')
    <div class="container section">
        <div class="row center-align">
            @foreach($labelList as $label)
                <div class="col s12 m2" style="padding-top: 10px;">
                    <a href="#">
                        <div class="chip hoverable black-text">
                            <img src="{{ asset("img/icon/{$label['label_icon']}") }}" class="responsive-img" alt="{{ $label['desc'] }}" >

                                {{ $label['label'] }}：{{ $label['articleTotal'] }}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="progress">
        <div class="determinate red accent-1" style="width: 100%"></div>
    </div>

    <!-- search bar -->
    @component('home.layouts.main.search-bar') @endcomponent

    <div class="container">
        <!-- card list -->
        @component('home.layouts.main.card-list', ['articles' => $articles ?? []]) @endcomponent
    </div>

@endsection