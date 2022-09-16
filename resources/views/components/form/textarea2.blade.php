<div class="form-group row">
    <label for="{{ $attributes['name'] }}-id" class="col-sm-{{ $attributes['col-label'] }} col-form-label">{{
        $attributes['label'] }}</label>
    <div class="col-sm-{{ $attributes['col-input'] }}">
        <textarea class="form-control" id="{{ $attributes['name'] }}-id"
            name="{{ $attributes['name'] }}">{{ old($attributes['name'], $attributes['value']) }}</textarea>
        @error($attributes['name'])
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>