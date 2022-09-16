@php
$id = $attributes['id']??'modal-id';

@endphp
@isset($button)
{{ $button }}
@else
<div style="display: flex;">
    <button type="button" class="btn btn-sm {{ $attributes['class'] }}" style="margin-left: auto;" data-toggle="modal"
        data-target="#{{ $id }}">
        {{ $attributes['label'] }}
    </button>
</div>
@endisset
<div class="modal" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id }}-Title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ $attributes['title'] }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $body }}
            </div>
        </div>
    </div>
</div>