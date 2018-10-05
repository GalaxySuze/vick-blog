<table class="layui-table"
       lay-filter="listTable"
       lay-data="{
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
                    width: '{{ $thead['width']}}',
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
    @{{# if(d.allowEdit){ }}
        <a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="edit">
            <i class="layui-icon layui-icon-edit"></i>编辑
        </a>
    @{{# } }}
    @{{# if(d.allowDel){ }}
        <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">
            <i class="layui-icon layui-icon-delete"></i>删除
        </a>
    @{{# } }}
</script>

<script type="text/html" id="uploadImageTd">
    <div class="uploadImageAlbum">
        @{{# if(d.page_image){ }}
            <img layer-pid="@{{ d.id }}" src="@{{ d.page_image }}" alt="@{{ d.title }}">
        @{{# } }}
    </div>
</script>

<script type="text/html" id="labelIconTd">
    <div class="labelIconAlbum">
        @{{# if(d.label_icon){ }}
        <img layer-pid="@{{ d.id }}" src="@{{ d.label_icon }}" alt="@{{ d.label }}" width="15%" height="15%">
        @{{# } }}
    </div>
</script>

<script type="text/html" id="linkImageTd">
    <div class="linkImageAlbum">
        @{{# if(d.image){ }}
        <img layer-pid="@{{ d.id }}" src="@{{ d.image }}" alt="@{{ d.label }}" width="100%" height="100%">
        @{{# } }}
    </div>
</script>
