<div class="section" id="across-card">
    <div class="row">
        <!-- articles -->
        @if(isset($articles['data']) && !empty($articles['data']))
            <div class="col s12 m12 center-align" style="color: rgba(238,110,115,0.7);">{{ $totalQty }}篇</div>
            @foreach($articles['data'] as $item)
                <div class="col s12 m12">
                    <div class="card small horizontal hoverable">
                        <div class="card-image hide-on-small-only" style="width: 100%;height: 100%; background: url('{{ $item['page_image'] }}'); background-size: cover;">
                            <span class="card-title"><b>{{ $item['release_time'] }}</b></span>
                        </div>
                        <div class="card-stacked center-align">
                            <div class="card-content">
                                <blockquote>
                                    <h5><b>{{ $item['title'] }}</b></h5>
                                </blockquote>
                                <a href="{{ url('home/detail', $item['id']) }}" class="waves-effect" style="width: 100%;">
                                    {{ $item['desc'] }}
                                </a>
                            </div>
                            <div class="card-action">
                                @foreach($item['label'] as $tags)
                                    <a href="{{ route('home.label-page', ['label' => $tags['id']]) }}" class="card-label-btn">
                                        <img src="{{ $tags['label_icon'] }}"
                                             class="circle responsive-img tooltipped hoverable"
                                             alt="{{ $tags['label'] }}"
                                             width="8%"
                                             height="8%"
                                             data-position="bottom"
                                             data-delay="50"
                                             data-tooltip="I am {{ $tags['label'] }}">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col s12 m12 center-align" style="margin-top: 26px;">
                <h5>😅 没有相关文章~</h5>
            </div>
        @endif
    </div>

    <!-- pagination -->
    {{--@component('home.layouts.main.pagination-list', ['pagination' => $articles]) @endcomponent--}}
</div>
