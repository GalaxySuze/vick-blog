<div class="layui-form-item">
    <label class="layui-form-label layui-bg-black">
        {!! $required ? '<font color="#ff4500">*</font>' : '' !!}
        {{ $label }}
    </label>
    <div class="layui-input-block">
        @foreach($options as $keyId => $item)
            <input type="checkbox"
                   name="{{ $inputName }}[{{ $keyId }}]"
                   title="{{ $item }}"
                    {{ !empty($value) && in_array($keyId, $value) ? 'checked' : '' }}>
        @endforeach
    </div>
</div>