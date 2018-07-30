<div class="row">
    <!-- articles -->
    @if(isset($articles['data']))
        @foreach($articles['data'] as $item)
            <div class="col s12 m12">
                <div class="card small horizontal hoverable">
                    <div class="card-image hide-on-small-only" style="width: 100%;height: 100%; background: url('{{ $item['page_image'] }}'); background-size: cover;">
                        <span class="card-title"><b>{{ $item['release_time'] }}</b></span>
                    </div>
                    <div class="card-stacked center-align">
                        <div class="card-content">
                            <a href="{{ url('home/detail', $item['id']) }}" class="waves-effect">
                                <blockquote>
                                    <h5><b>{{ $item['title'] }}</b></h5>
                                </blockquote>
                                {{ $item['desc'] }}
                            </a>
                        </div>
                        <div class="card-action">
                            @foreach($item['label'] as $tags)
                                <img src="{{ asset('img/icon/' . $tags['label_icon']) }}"
                                     class="responsive-img tooltipped"
                                     alt="{{ $tags['label'] }}"
                                     width="10%"
                                     height="10%"
                                     data-position="top"
                                     data-delay="50"
                                     data-tooltip="I am {{ $tags['label'] }}">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    <!-- pagination -->
    @component('home.layouts.main.pagination-list', ['pagination' => $articles])@endcomponent

</div>