@inject('BuildForm', 'App\Services\FormServices\BaseBuildFormService')

@extends('backstage.dashboard')

@section('main')
    <div class="layui-col-md12">
        <form class="layui-form layui-form-pane" method="post" action="">
            <div class="layui-row layui-col-space5">

                <!-- btn bar -->
                <div class="layui-col-md12" style="margin-bottom: 16px;">
                    <div class="layui-row layui-col-space5">
                        <div class="layui-col-md6">
                            <input type="hidden" name="id" value="{{ $modelId }}" id="modelId">
                            <button class="layui-btn layui-bg-cyan layui-btn-fluid" lay-submit
                                    lay-filter="{{ $formEvent }}"><i class="layui-icon">&#xe609;</i>&nbsp;提交
                            </button>
                        </div>
                        <div class="layui-col-md6">
                            <a style="background-color: #f5f5f5" href="{{ $listRoute }}"
                               class="layui-btn layui-btn-primary layui-btn-fluid"><i class="layui-icon">&#xe623;</i>&nbsp;返回</a>
                        </div>
                    </div>
                </div>

                <!-- 构建表单 -->
                @foreach($BuildForm->buildForm($formName, $modelId) as $formParts)
                    <div class="{{ $formParts['colM'] }}">
                        @foreach($formParts['formParts'] as $part)
                            @if(!isset($part['hidden']) || $part['hidden'] != false)
                                @component("backstage.form-components.{$part['inputType']}", $part)@endcomponent
                            @endif
                        @endforeach
                    </div>
                @endforeach

            </div>
        </form>
    </div>
@endsection

<script>
    @section('scriptMain')

    form.on('submit({{ $formEvent }})', function (data) {
        submitAjax('post', '{{ $editRoute }}', data.field);
        return false;
    });

    //文件上传
    upload.render({
        elem: '#uploadImage',
        before: function (obj) {
            layer.load(1);
        },
        done: function (result, index, upload) {
            if (result.code === 0) {
                $('#page_image').val(result.data.imgName);
                $('#uploadBar').hide(100);
                $('#uploadShow').show(100);
                $('#uploadPageImg').attr('src', result.data.imgUrl);
                layer.msg(result.msg);
                showUploadImgBox('#uploadImgBox');
            } else {
                layer.msg(interfaceEXMsg);
            }
            layer.closeAll(loadingMask);
        },
        error: function () {
            layer.closeAll(loadingMask);
            layer.msg(interfaceEXMsg);
        }
    });

    //删除文件
    $('#delUploadImg').click(function () {
        layer.confirm('是否确认删除!', function (index) {
            var img = $('#page_image').val();
            var imgRowId = $('#modelId').val();
            submitAjax('post', '{{ url('backstage/article/del-upload-image') }}', {'img': img, 'id': imgRowId});
        });
    });

    function delImgDone() {
        $('#page_image').val('');
        $('#uploadBar').show(100);
        $('#uploadShow').hide(100);
    }

    $('#uploadPageImg').click(function () {
        showUploadImgBox('#uploadImgBox');
    });

    $('#uploadPageImg').hover(function () {
        layer.tips('点击查看图片', '#uploadPageImg', {
            tips: 3
        });
    }, function () {
        layer.closeAll('tips');
    });

    @endsection
</script>