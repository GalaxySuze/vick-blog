<div class="section">
    <div class="row">
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
                                         class="responsive-img tooltipped" alt="{{ $tags['label'] }}" width="10%"
                                         height="10%" data-position="top" data-delay="50"
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
    <div class="section center-align">
        <div class="row">
            <div class="col s12 m12">
                @if(isset($articles))
                    <ul class="pagination">
                        <li class="{{ $articles['current_page'] == 1 ? 'disabled' : 'waves-effect' }}">
                            <a href="{{ $articles['prev_page_url'] }}"><i class="material-icons">chevron_left</i></a>
                        </li>
                        @for($page = 1; $page <= $articles['last_page']; $page++ )
                            <li class="{{ $page == $articles['current_page'] ? 'active' : 'waves-effect' }}">
                                <a href="{{ $page == $articles['current_page'] ? '#!' : $articles['path'] . '?page=' . $page }}">{{ $page }}</a>
                            </li>
                        @endfor
                        <li class="{{ $articles['current_page'] == $articles['last_page'] ? 'disabled' : 'waves-effect' }}">
                            <a href="{{ $articles['next_page_url'] }}"><i class="material-icons">chevron_right</i></a>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>