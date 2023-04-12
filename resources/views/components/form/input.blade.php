<div class="form-group {{ $attributes['class'] }}" style="{{ $attributes['style'] }}">
    @if ($attributes['label'])
        <label for="{{ $attributes['name'] }}-id">{{ $attributes['label'] }}</label>
    @endif
    <input type="{{ $attributes['type'] }}" name="{{ $attributes['name'] }}" class="form-control"
           id="{{ $attributes['name'] }}-id"
           value="{{ old($attributes['name'], $attributes['value'])??request($attributes['name']) }}"
           placeholder="{{ $attributes['placeholder'] }}" @if ($attributes['disabled']) disabled @endif
           @if($attributes['required']) required @endif @if($attributes['multiple']) multiple @endif
           @if($attributes['max']) max="{{$attributes['max']}}" @endif
           @if($attributes['min']) min="{{$attributes['min']}}" @endif
           @if($attributes['step']) step="{{$attributes['step']}}" @endif
    />
    @error($attributes['error-name']??$attributes['name'])
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
