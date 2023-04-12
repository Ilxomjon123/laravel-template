<form action="">
    {{ $slot }}

    <div class="d-flex">
        <button class="btn btn-primary">Фильтровать</button>
        <a class="btn btn-warning ml-auto" href="{{ url()->current() }}">Очистить</a>
    </div>
</form>
