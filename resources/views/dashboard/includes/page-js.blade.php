<!-- ================== BEGIN BASE JS ================== -->
<script src="{{ asset('dash/assets/js/app.min.js') }}"></script>
<script src="{{ asset('dash/assets/js/theme/default.min.js') }}"></script>
<script src="{{ asset('dash/assets/js/select2.js') }}"></script>
<!-- ================== END BASE JS ================== -->

<script>
    $(document).ready(function () {
      $('.select2').select2();
  });

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

@stack('scripts')