<tr>
    @if(!$attributes['without-actions'])
        <td><a href="{{ route(getKey().'.show', $item->id) }}">{{ $item->id }}</a></td>
        {{ $slot }}
        <td>{{ $item->created_at }}</td>
        <td>
            <x-table.actions :item="$item"/>
        </td>
    @else
        <td>{{ $item->id }}</td>
        {{ $slot }}
        <td>{{ $item->created_at }}</td>
    @endif
</tr>
