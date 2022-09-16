<div class="form-group row">
    <label for="{{ $attributes['name'] }}-id" class="col-sm-{{ $attributes['col-label'] }} col-form-label">{{
        $attributes['label'] }}</label>
    <div class="col-sm-{{ $attributes['col-input'] }}">
        <input class="form-control" id="{{ $attributes['name'] }}-id" name="{{ $attributes['name'] }}"
            value="{{ old($attributes['name'], $attributes['value']) }}">
        @error($attributes['name'])
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>