<button class="btn btn-inverse" type="button" onclick="goBack()"><span class="fa fa-angle-double-left"></span>
    Назад</button>

@push('scripts')
<script>
    function goBack(){
        let currentUrl = window.location.href;
        window.location.href = currentUrl.substr(0, currentUrl.lastIndexOf("/"));
    }
</script>
@endpush