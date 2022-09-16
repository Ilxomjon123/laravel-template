<label>{{ $attributes['label'] }}</label>
<div class="row">
    <div class="col-md-6">
        <x-form.input type="{{ $attributes['type'] }}" name="{{ $attributes['name'] }}_start"
            :value="request($attributes['name'] . '_start')" placeholder="От" />
    </div>
    <div class="col-md-6">
        <x-form.input type="{{ $attributes['type'] }}" name="{{ $attributes['name'] }}_end"
            :value="request($attributes['name'] . '_end')" placeholder="До" />
    </div>
</div>