<div class="form-group {{ $attributes['class'] }}">
    <label for="{{ $attributes['name'] }}-id">{{ $attributes['label'] }}</label>
    <textarea name="{{ $attributes['name'] }}" class="form-control text-editor"
        id="{{ $attributes['name'] }}-id">{!! old($attributes['name'], $attributes['value']) !!}</textarea>
    @error($attributes['name'])
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

@push('scripts')

{{-- <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
            .create( document.querySelector( '.text-editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script> --}}

<script src="https://cdn.tiny.cloud/1/maf5d5cmdz73at7pcujnkatb57j1j428e4flg31x7o5vgmws/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
    tinymce.init({
selector: 'textarea.text-editor', // Replace this CSS selector to match the placeholder element for TinyMCE
file_picker_types: 'file image media',
plugins: 'code table lists image',
toolbar: 'undo redo | formatselect| bold italic | image | alignleft aligncenter alignright | indent outdent | bullist | numlist | code | table',
image_title: true,
/* enable automatic uploads of images represented by blob or data URIs*/
automatic_uploads: true,
/*
URL of our upload handler (for more details check:
https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
images_upload_url: 'postAcceptor.php',
here we add custom filepicker only to Image dialog
*/
file_picker_types: 'image',
file_picker_callback: (cb, value, meta) => {
const input = document.createElement('input');
input.setAttribute('type', 'file');
input.setAttribute('accept', 'image/*');

input.addEventListener('change', (e) => {
const file = e.target.files[0];

const reader = new FileReader();
reader.addEventListener('load', () => {
/*
Note: Now we need to register the blob in TinyMCEs image blob
registry. In the next release this part hopefully won't be
necessary, as we are looking to handle it internally.
*/
const id = 'blobid' + (new Date()).getTime();
const blobCache = tinymce.activeEditor.editorUpload.blobCache;
const base64 = reader.result.split(',')[1];
const blobInfo = blobCache.create(id, file, base64);
blobCache.add(blobInfo);

/* call the callback and populate the Title field with the file name */
cb(blobInfo.blobUri(), { title: file.name });
});
reader.readAsDataURL(file);
});

input.click();
},
});
</script>
@endpush