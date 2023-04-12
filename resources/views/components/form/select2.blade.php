@php
if(isset($value)){
if(old($name)){
$selected = old($name);
}else {
$selected = $value;
}
}else{
$selected = request()->get($name, null);
}
$defaultOptionLabel = $attributes['default-option-label']??'----------';
@endphp
<div class="form-group {{ $attributes['class'] }}">
    <label for="{{ $name }}-id">{{ $attributes['label'] }}</label>
    <select name="{{ $name }}" class="form-control" id="{{ $name }}-id" @if($attributes['required']) required @endif>
        {{-- @if(!$attributes['not-nullable'])
        <option value="{{ optional($value)->id }}" selected>{{
            optional($value)->$attributes['title'] }}
        </option>
        @endif --}}
    </select>
    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        $("#{{ $name }}-id").select2({
            placeholder: "{{ $attributes['placeholder'] }}",
            allowClear: true,
            language:'ru',
            ajax: {
                url: "{{ url('api/' . $attributes['key']) }}",
                data: function (params) {
                    var query = {
                        search: params.term,
                        per_page: params.per_page || 100,
                        page: params.page || 1
                    }
                    return query;
                },
                dataType: 'json',
                processResults: function (data, params) {
                    return {
                        results: $.map(data.result.data, function(obj) {
                            return { 
                                id: obj.id,
                                text: obj.name,
                            };
                        }),
                        pagination: {
                            more: data.result.total > data.result.to
                        }
                    };
                }
            },
        });
    });
</script>
@endpush