@php
$order = requestOrder();
if($order['key'] == $attributes['column']){
$asc = ($order['value'] == 'asc');
}
@endphp

<a href="javascript:;" onclick="order('{{ $attributes['column'] }}')">
    {{ $slot }}
    @if (isset($asc))
    @if ($asc)
    <i class="fa fa-caret-down"></i>
    @else
    <i class="fa fa-caret-up"></i>
    @endif
    @endif
</a>