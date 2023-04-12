@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible">
        {{ session('success') }}
        <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
    </div>
    <script>
        setTimeout(function () {
            $('.alert').hide();
        }, 20000);
    </script>
@endif
@if (session()->has('warning'))
    <div class="alert alert-warning alert-dismissible">
        {{ session('warning') }}
        <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
    </div>
    <script>
        setTimeout(function () {
            $('.alert').hide();
        }, 20000);
    </script>
@endif
@if (session()->has('not-allowed'))
    <div class="alert alert-danger alert-dismissible">
        {{ session('not-allowed') }}
        <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
    </div>
    <script>
        setTimeout(function () {
            $('.alert').hide();
        }, 20000);
    </script>
@endif
@if (session()->has('not-deleteable'))
    <div class="alert alert-warning alert-dismissible">
        {{ session('not-deleteable') }}
        <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
    </div>
    <script>
        setTimeout(function () {
            $('.alert').hide();
        }, 20000);
    </script>
@endif
