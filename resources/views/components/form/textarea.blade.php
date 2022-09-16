<div class="form-group {{ $attributes['class'] }}">
    <label for="{{ $attributes['name'] }}-id">{{ $attributes['label'] }}</label>
    <textarea name="{{ $attributes['name'] }}" class="form-control"
        id="{{ $attributes['name'] }}-id">{{ old($attributes['name'], $attributes['value']) }}</textarea>
    @error($attributes['name'])
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>