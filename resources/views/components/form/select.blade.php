@php
$options = $attributes['options'];
$option = $attributes['option'];
if(isset($attributes['value'])){
if(old($attributes['name'])){
$selected = old($attributes['name']);
}else {
$selected = $attributes['value'];
}
}else{
$selected = request()->get($attributes['name'], null);
}
@endphp
<div class="form-group {{ $attributes['class'] }}" style="{{ $attributes['style'] }}">
    @isset($attributes['label'])
    <label for="{{ $attributes['name'] }}-id">{{ $attributes['label'] }}</label>
    @endisset
    <select name="{{ $attributes['name'] }}" class="select2 form-control" id="{{ $attributes['name'] }}-id"
        @if(isset($attributes['multile'])) multiple @endif onchange="this.form.submit()">
        <option value="{{ null }}">----------</option>
        @foreach ($options as $item)
        <option value="{{ $item['id'] }}" @if ($selected!==null and $item['id']==$selected) selected @endif>
            {{ $item[$option] }}</option>
        @endforeach
    </select>
    @error($attributes['name'])
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>