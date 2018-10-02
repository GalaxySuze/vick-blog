<div class="layui-form-item">
    <label class="layui-form-label layui-bg-black">
        {!! $required ? '<font color="#ff4500">*</font>' : '' !!}
        {{ $label }}
    </label>
    <div class="layui-input-block" id="uploadBar" style="display: {{ !empty($value) ? 'none' : 'block' }};">
        <div style="margin-left: 12px;">
            <button type="button" class="layui-btn layui-btn-warm" id="uploadImage"
                    lay-data="{url: '{{ $route }}', accept: 'images', size: '5000', number: 1, data: { _token: '{{ csrf_token() }}' }}">
                <i class="layui-icon">&#xe67c;</i>上传封面
            </button>
        </div>
    </div>
    <div class="layui-input-block" id="uploadShow" style="display: {{ !empty($value) || !empty($graphBedLink) ? 'block' : 'none' }};">
        <div style="margin-left: 12px;" id="uploadImgBox">
            <img src="{{ !empty($value) ? asset('storage/used/' . $value) : '' }}" id="uploadPageImg" style="width: 100px; height: 42px; background-size: cover;border: 1px #dddddd solid;">
            <button type="button" class="layui-btn layui-btn-danger" id="delUploadImg" style="margin-left: 12px;">删除图片</button>
            <input type="hidden" id="{{ $inputName }}" name="{{ $inputName }}" value="{{ $value }}">
        </div>
    </div>
</div>