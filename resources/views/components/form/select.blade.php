@php
    $options = $attributes['options'];
    $option = $attributes['option'];
    $selected = old($attributes['name'], $attributes['value'])??request($attributes['name']);
    $placeholder = $attributes['placeholder']??'----------';
@endphp
<div class="form-group {{ $attributes['class'] }}" style="{{ $attributes['style'] }}">
    @isset($attributes['label'])
        <label for="{{ $attributes['name'] }}-id">{{ $attributes['label'] }}</label>
    @endisset
    <select name="{{ $attributes['name'] }}" class="select2 form-control" id="{{ $attributes['name'] }}-id"
            @if(isset($attributes['multiple'])) multiple="multiple" @endif>
        @if(!$attributes['not-nullable'])
            <option value="{{ null }}">{{$placeholder}}</option>
        @endif
        @foreach ($options as $item)
            <option value="{{ $item['id'] }}"
                    @if (($selected!==null and $item['id']==$selected)||(is_array($selected) and in_array($item['id'], $selected))) selected @endif>
                {{ $item[$option] }}</option>
        @endforeach
    </select>
    @error($attributes['name'])
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
