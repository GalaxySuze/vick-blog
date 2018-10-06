<div class="row" id="normal-card">
    <!-- articles -->
    @if(isset($articles['data']) && !empty($articles['data']))
        @foreach($articles['data'] as $articleList)
            <div class="col s12 m3">
                @foreach($articleList as $item)
                    <div class="card z-depth-2 hoverable hover-link">
                        <div class="card-image">
                            <img src="{{ $item['page_image'] }}">
                            <span class="card-title">{{ $item['release_time'] }}</span>
                        </div>
                        <a href="{{ url('home/detail', $item['id']) }}">
                            <div class="card-content waves-effect black-text" style="width: 100%;">
                                {{ $item['desc'] }}
                            </div>
                        </a>
                        <div class="card-action">
                            @foreach($item['label'] as $tags)
                                <a href="{{ route('home.label-page', ['label' => $tags['id']]) }}">
                                    <img src="{{ $tags['label_icon'] }}"
                                         class="circle responsive-img tooltipped hoverable" alt="{{ $tags['label'] }}"
                                         width="8%" height="8%" data-position="bottom" data-delay="50"
                                         data-tooltip="I am {{ $tags['label'] }}">
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @else
        <div class="col s12 m12 center-align" style="margin-top: 26px;">
            <h5>😅 没有相关文章~</h5>
        </div>
    @endif
</div>

<!-- pagination -->
@component('home.layouts.main.pagination-list', ['pagination' => $articles])@endcomponent