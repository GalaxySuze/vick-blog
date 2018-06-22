<div class="layui-form-item layui-form-text">
    <label class="layui-form-label layui-bg-black">
        {!! $required ? '<font color="#ff4500">*</font>' : '' !!}
        {{ $label }}
    </label>
    <div class="layui-input-block">
        <textarea
                style="height: 300px;"
                name="{{ $inputName }}"
                placeholder="{{ $placeholder }}"
                class="layui-textarea"
                {!! $required ? 'required lay-verify="required"' : '' !!}>{{ $value }}</textarea>
    </div>
</div>