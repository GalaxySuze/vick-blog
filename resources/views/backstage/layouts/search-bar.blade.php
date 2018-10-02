<form class="layui-form layui-form-pane" method="get" action="" id="searchForm">
    <div class="layui-row layui-col-space5" style="text-align: center;">
        <div class="layui-col-md2">
            <a href="{{ $addPageRoute }}" class="layui-btn layui-btn-warm">
                <i class="layui-icon layui-icon-add-1"></i>新增
            </a>
            <button type="button" lay-submit lay-filter="{{ $submitForm }}" class="layui-btn layui-btn-normal">
                <i class="layui-icon layui-icon-search"></i>搜索
            </button>
        </div>
        @foreach($searchBar as $bars)
            <div class="{{ $bars['colM'] }}">
                @foreach($bars['formParts'] as $bar)
                    @component("backstage.form-components.{$bar['inputType']}", $bar)
                    @endcomponent
                @endforeach
            </div>
        @endforeach
    </div>
</form>

<script>
@section('scriptMain')
    form.on('submit({{ $submitForm }})', function(data){
        table.reload('list-table', {
            url: '{{ $dataRoute }}',
            where: { 'conditions': data.field }
        });
        return false;
    });
@endsection
</script>