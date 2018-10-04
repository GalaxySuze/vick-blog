<div class="layui-form-item">
    <label class="layui-form-label layui-bg-black">
        {!! $required ? '<font color="#ff4500">*</font>' : '' !!}
        {{ $label }}
    </label>
    <div class="layui-input-block">
        <input type="checkbox"
               name="{{ $inputName }}"
               lay-skin="switch"
               lay-text="是|否"
               {{ $value ? 'checked' : '' }}
               {!! $required ? 'required lay-verify="required"' : '' !!}>
    </div>
</div>