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
        $(document).ready(function () {
            if (window.File && window.FileList && window.FileReader) {
                $("#{{$attributes['name']}}-id").on("change", function (e) {
                    var files = e.target.files,
                        filesLength = files.length;
                    for (var i = 0; i < filesLength; i++) {
                        var f = files[i]
                        var fileReader = new FileReader();
                        fileReader.onload = (function (e) {
                            var file = e.target;
                            $("<span class=\"pip\">" +
                                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                                "<br/><span class=\"remove\">Удалить</span>" +
                                "</span>").insertAfter("#{{$attributes['name']}}-id");
                            $(".remove").click(function () {
                                $(this).parent(".pip").remove();
                            });
                        });
                        fileReader.readAsDataURL(f);
                    }
                    console.log(files);
                });
            }
        });
    </script>
@endpush

@push('css')
    <style>
        input[type="file"] {
            display: block;
        }

        .imageThumb {
            max-height: 75px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
        }

        .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }

        .remove {
            display: block;
            background: #444;
            border: 1px solid black;
            color: white;
            text-align: center;
            cursor: pointer;
        }

        .remove:hover {
            background: white;
            color: black;
        }
    </style>
@endpush
