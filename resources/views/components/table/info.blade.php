@php
$key = getKey();
@endphp

<table class="table table-hover table-valign-middle table-bordered" id="{{ $model->id }}">
    <tbody>
        {{ $slot }}
    </tbody>
</table>
<div class="d-flex">
    <x-button.back />
    @if (!isset($attributes['not-editable']))
    <a href="{{ route($key . '.edit', $model->id) }}" class="btn btn-primary ml-auto mr-2">Изменить</a>
    @endif
    <form action="{{ route($key . '.delete', $model->id) }}" method="POST"
        class="@if (isset($attributes['not-editable'])) ml-auto @endif">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверен?')">Удалить</button>
    </form>
</div>