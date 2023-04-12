<div class="{{ $attributes['class'] }} mb-2">
    <div class="custom-control custom-switch">
        <input type="checkbox" name="{{ $attributes['name'] }}" class="custom-control-input"
            @if(in_array($attributes['value'], $attributes['selected-options'])) checked @endif
            id="customSwitch2-{{ $attributes['value'] }}-{{ $attributes['name'] }}" value="{{ $attributes['value'] }}">
        <label class="custom-control-label" for="customSwitch2-{{ $attributes['value'] }}-{{ $attributes['name'] }}">{{
            $attributes['label']
            }} </label>
        @if ($attributes['url'])
        <a href="{{ $attributes['url'] }}" target="blank"><i class="fa fa-link"></i></a>
        @endif
    </div>
</div>