@if(isset($pagination['total']) && $pagination['total'] > 0)
    <div class="section center-align">
        <div class="row">
            <div class="col s12 m12">
                <ul class="pagination">
                    <li class="{{ $pagination['current_page'] == $pagination['from'] ? 'disabled' : 'waves-effect' }}">
                        <a href="{{ $pagination['current_page'] == $pagination['from'] ? '#!' : $pagination['prev_page_url'] }}"><i class="material-icons">chevron_left</i></a>
                    </li>
                    @for($page = 1; $page <= $pagination['last_page']; $page++)
                        <li class="{{ $page == $pagination['current_page'] ? 'active' : 'waves-effect' }}">
                            <a href="{{ $page == $pagination['current_page'] ? '#!' : $pagination['path'] . '?page=' . $page }}">{{ $page }}</a>
                        </li>
                    @endfor
                    <li class="{{ $pagination['current_page'] == $pagination['last_page'] ? 'disabled' : 'waves-effect' }}">
                        <a href="{{ $pagination['current_page'] == $pagination['last_page'] ? '#!' : $pagination['next_page_url'] }}"><i class="material-icons">chevron_right</i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endif