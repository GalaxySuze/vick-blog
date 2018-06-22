<table class="layui-table"
       lay-filter="listTable"
       lay-data="{
       height:315,
       url:'{{ $dataRoute }}',
       page:true,
       size:'lg',
       id:'list-table'
       }">
    <thead>
        <tr>
            @foreach($tableThead as $thead)
                <th lay-data="{
                    field: '{{ $thead['field'] ?? '' }}',
                    width: {{ $thead['width'] }},
                    align: '{{ $thead['align'] }}',
                    sort: {{ $thead['sort'] ?? 0 }},
                    toolbar: '{{ $thead['toolbar'] ?? '' }}',
                    fixed: '{{ $thead['fixed'] ?? '' }}',
                    templet: '{{ $thead['templet'] ?? '' }}',
                }">{{ $thead['name'] }}</th>
            @endforeach
        </tr>
    </thead>
</table>

<script type="text/html" id="operationBar">
    <a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="edit">
        <i class="layui-icon layui-icon-edit"></i>编辑
    </a>
    <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">
        <i class="layui-icon layui-icon-delete"></i>删除
    </a>
</script>

<script type="text/html" id="uploadImageTd">
    <div class="uploadImageAlbum">
        @{{# if(d.page_image){ }}
            <img layer-pid="@{{ d.id }}" src="@{{ d.page_image }}" alt="@{{ d.title }}">
        @{{# } }}
    </div>
</script>

<script>
@section('scriptMain')
//监听工具条
table.on('tool(listTable)', function(obj){
    var row = obj.data; //获得当前行数据
    var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）

    if(layEvent === 'del'){
        layer.confirm('是否确认删除!', function(index){
            submitAjax('get', row.delRoute, row.id, obj);
        });
    } else if(layEvent === 'edit'){ //编辑
        window.location.href = row.editRoute;
    }

});

@endsection
</script>
