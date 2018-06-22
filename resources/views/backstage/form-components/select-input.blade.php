<div class="layui-form-item">
    <label class="layui-form-label layui-bg-black">
        {!! $required ? '<font color="#ff4500">*</font>' : '' !!}
        {{ $label }}
    </label>
    <div class="layui-input-block">
        <select name="{{ $inputName }}" {!! $required ? 'required lay-verify="required"' : '' !!}>
            @foreach($options as $key => $item)
                <option value="{{ $key }}" {{ $key==$value ? 'selected' : '' }}>{{ $item }}</option>
            @endforeach
        </select>
    </div>
</div>