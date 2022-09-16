<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                {{-- @dd($attributes) --}}
                <h4 class="panel-title">{{ $attributes['title'] }}</h4>
                <div class="panel-heading-btn">
                    @isset($attributes['add-url'])
                    <a href="{{ $attributes['add-url'] }}" class="btn btn-xs btn-success"><i class="fa fa-plus">
                            Add</i></a>
                    @endisset
                    {{-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                        data-click="panel-collapse"><i class="fa fa-minus"></i></a> --}}
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                        data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    {{-- <a href="" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                            class="fa fa-redo"></i></a> --}}
                    {{-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                        data-click="panel-remove"><i class="fa fa-times"></i></a> --}}
                </div>
            </div>
            <div class="panel-body">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>