<div class="row">
    <!-- articles -->
    @if(isset($articles['data']))
        @foreach($articles['data'] as $articleList)
            <div class="col s12 m3">
                @foreach($articleList as $item)
                    <div class="card z-depth-2 hoverable">
                        <div class="card-image">
                            <img src="{{ $item['page_image'] }}">
                            <span class="card-title">{{ $item['release_time'] }}</span>
                        </div>
                        <a href="{{ url('home/detail', $item['id']) }}">
                            <div class="card-content waves-effect black-text">
                                {{ $item['desc'] }}
                            </div>
                        </a>
                        <div class="card-action flow-text">
                            @foreach($item['label'] as $tags)
                                <img src="{{ asset('img/icon/' . $tags['label_icon']) }}"
                                     class="responsive-img tooltipped" alt="{{ $tags['label'] }}"
                                     width="10%" height="10%" data-position="top" data-delay="50"
                                     data-tooltip="I am {{ $tags['label'] }}">
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @endif
</div>

<!-- pagination -->
@component('home.layouts.main.pagination-list', ['pagination' => $articles])@endcomponent