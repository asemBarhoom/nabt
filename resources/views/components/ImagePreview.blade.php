<div class="imageCont @has_error($name)" style="text-align: center">
    <h5 style="text-align: center"> {{ $text }} </h5>
    <small style="color: gray; text-align: center; display: block;">
        {{ $hint ?? '400 * 400 بيكسل' }}
    </small>
    @show_error($name)
    <div class="imageContainer">
        <label for="MYimage_{{ $name }}" style="width: 100%; cursor: pointer;">
            <img
                src="{{ old($name, $data ?? null) ? url('uploads/' . old($name, $data ?? null)) : url('avatar.png') }}"
                style="height: 60px;"
                class="MyImagePreview thumbnail"
                id="Prev_{{ $name }}"
                alt=""
            />
        </label>

        <input type="file" id="MYimage_{{ $name }}" style="display: none" class="file-upload" name="file" />
        <input type="hidden" value="{{ old($name, $data ?? null) }}" name="{{ $name }}" id="{{ $name }}" class="uploaded_image_name" />
        <div class="image-loader" id="loader_{{ $name }}"></div>
    </div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" style="padding: 10px !important; max-height: 85vh; overflow-y: auto;">
                <div class="img-container">
                    <img id="Modal_image" src="" />
                </div>
            </div>
            <div class="modal-footer" style="padding: 3px !important;">
                <button type="button" class="btn btn-block btn-success" id="crop">حفظ</button>
            </div>
        </div>
    </div>
</div>

@section('upload1_scripts')
    <style>
        .img-container img {
            width: 100%;
            height: auto;
        }
    </style>
    <script>
        // Include your JavaScript logic here
        let image_{{ $name }} = '{{ old($name, $data ?? null) }}';
        let image_{{ $name }}_req = 1;

        $(function () {
            // Your JavaScript logic
        });
    </script>
@endsection
