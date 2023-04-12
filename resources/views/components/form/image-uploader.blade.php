<div class="{{ $attributes['class'] ?: '' }}">
    <div class="media media-lg">
        <div class="media-body">
            <x-form.input type="file" :name="$attributes['name']" :label="$attributes['label']" multiple/>
        </div>
        <div class="media-right">
            <img id="preview-image-before-upload" src="{{$attributes['default-image']}}" alt="preview image"
                 class="media-object rounded" onerror="this.onerror=null; this.style.display = 'none';">
        </div>
    </div>
</div>


@push('scripts')
    <script>
        document.getElementById("{{ $attributes['name'] }}-id").addEventListener('change', function (e) {
            previewImage(this);
        });

        function previewImage(e) {
            let reader = new FileReader();
            reader.onload = (e) => {
                const element = document.getElementById('preview-image-before-upload');
                element.setAttribute('src', e.target.result);
                if (element.style.display === "none") {
                    element.style.display = "block";
                } else {
                    element.style.display = "none";
                }
            }
            reader.readAsDataURL(e.files[0]);
        }
    </script>
@endpush
