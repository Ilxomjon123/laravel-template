@php
$id = isset($attributes['id'])?$attributes['id']:'';

@endphp

<div class="{{ $attributes['class'] }} mb-2">
    <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" @if ($attributes['value']) checked @endif
            id="customSwitch1-{{ $attributes['name'] }}-{{ $id }}">
        <input type="hidden" name="{{ $attributes['name'] }}"
            id="customSwitch1-{{ $attributes['name'] }}-{{ $id }}-input">
        <label class="custom-control-label" for="customSwitch1-{{ $attributes['name'] }}-{{ $id }}">{{
            $attributes['label']
            }}</label>
    </div>
</div>

@push('scripts')
<script>
    $("#customSwitch1-{{ $attributes['name'] }}-{{ $id }}").on('change', function(){
        $("#customSwitch1-{{ $attributes['name'] }}-{{ $id }}-input").val(this.checked ? 1 : 0);
        // this.value = this.checked;
        // alert(this.value);
    }).change();
</script>
@endpush