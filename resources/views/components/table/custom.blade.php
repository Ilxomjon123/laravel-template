<div class="table-responsive">
    <table
        class="table table-bordered kv-grid-table table-valign-middle @if($attributes['striped']!==false)table-striped @endif table-condensed"
        id="{{ $attributes['id'] }}">
        <thead>
            @if (isset($header))
            <tr>
                {{ $header }}
            </tr>
            @endif
            @if (isset($filter))
            <tr>
                {{ $filter }}
            </tr>
            @endif
        </thead>
        <tbody>
            {{ $body }}
        </tbody>
    </table>
    @if ($attributes['length'] == 0)
    <p class="text-center">Результатов не найдено</p>
    @endif
</div>

@push('scripts')
<script>
    function order(order) {
        const curr_order = @json(request('order'));
        if (curr_order == order) order = `-${order}`
        const current_url = @json(url()->full());
        location.href = updateQueryStringParameter(current_url,'order',order);
    }

    function updateQueryStringParameter(uri, key, value) {
      var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
      var separator = uri.indexOf('?') !== -1 ? "&" : "?";
      if (uri.match(re)) {
          return uri.replace(re, '$1' + key + "=" + value + '$2');
      } else {
          return uri + separator + key + "=" + value;
      }
  }
</script>
@endpush