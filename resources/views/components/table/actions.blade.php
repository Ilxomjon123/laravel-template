<div class="d-flex float-right">
    <a class="btn btn-xs btn-info mr-1" href="{{ route(getKey().'.show', $item->id) }}"><i class="fa fa-eye"></i></a>
    {{-- <a class="btn btn-xs btn-warning mr-1" href="{{ route(getKey().'.chat', $item->id) }}"><i
            class="fa fa-comment"></i></a> --}}
    <a href="{{ route(getKey().'.edit', $item->id) }}" class="btn btn-xs btn-primary mr-1"><i class="fa fa-pen"></i></a>
    <form action="{{ route(getKey().'.delete', $item->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Вы уверен?')" class="btn btn-xs btn-danger"><i
                class="fa fa-trash"></i></button>
    </form>
</div>
