<div class="layui-form-item">
    <label class="layui-form-label layui-bg-black">
        {!! $required ? '<font color="#ff4500">*</font>' : '' !!}
        {{ $label }}
    </label>
    <div class="layui-input-block">
        <input type="{{ $inputBoxType ?? 'text' }}"
               name="{{ $inputName }}"
               value="{{ $value }}"
               placeholder="{{ $placeholder }}"
               autocomplete="off"
               class="layui-input"
                {!! $required ? 'required lay-verify="required"' : '' !!}>
    </div>
</div>