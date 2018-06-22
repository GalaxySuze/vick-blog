@inject('BuildForm', 'App\Services\FormServices\BaseBuildFormService')

@extends('backstage.dashboard')

@section('main')
    <div class="layui-col-md12">
        <form class="layui-form layui-form-pane" method="post" action="">
            <div class="layui-row layui-col-space5">
                <!-- 构建表单 -->
                @foreach($BuildForm->buildForm($formName, $modelId) as $formParts)
                    <div class="{{ $formParts['colM'] }}">
                        @foreach($formParts['formParts'] as $part)
                            @component("backstage.form-components.{$part['inputType']}", $part)
                            @endcomponent
                        @endforeach
                    </div>
                @endforeach

                <!-- btn bar -->
                <div class="layui-col-md12">
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input type="hidden" name="id" value="{{ $modelId }}">
                            <button class="layui-btn layui-bg-blue" lay-submit lay-filter="{{ $formEvent }}">提交</button>
                            <a href="{{ url('backstage/article/list') }}" class="layui-btn layui-btn-primary">返回</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

<script>
    @section('scriptMain')
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
                layer.msg('接口请求异常，请打开debug，通过浏览器调试工具查看错误信息!');
            }
            layer.closeAll('loading');
        },
        error: function () {
            layer.closeAll('loading');
            layer.msg('接口请求异常，请打开debug，通过浏览器调试工具查看错误信息!');
        }
    });

    showUploadImgBox('#uploadImgBox');

    $('#delUploadImg').click(function () {
        layer.confirm('是否确认删除!', function(index){
            var img = $('#page_image').val();
            var imgRowId = $('#id').val();
            submitAjax('post', '{{ url('backstage/article/del-upload-image') }}', {'img': img, 'id': imgRowId});
        });
    });
    
    function delImgDone() {
        $('#page_image').val('');
        $('#uploadBar').show(100);
        $('#uploadShow').hide(100);
    }

    $('#uploadPageImg').hover(function () {
        layer.tips('点击查看图片', '#uploadPageImg', {
            tips: 3
        });
    }, function () {
        layer.closeAll('tips');
    });

@endsection
</script>