<div class="imageCont @has_error($name)" style="text-align: center">
    <h5 style="text-align: center"> {{$text}} </h5>
    <small style="color: gray;text-align: center;display: block;">{{isset($hint)?$hint:'400 * 400 بيكسل'}}</small>
    @show_error($name)
    <div class="imageContainer">
        <label for="MYimage_{{$name}}" style="width: 100%;cursor: pointer;">
            <img
                    src="<?= old($name, isset($data) ? $data : null) ? url('uploads/' . old($name, isset($data) ? $data : null)) : url('avatar.png') ?>"
                    style="height: 60px;" class="MyImagePrivew thumbnail" id="Prev_{{$name}}"
                    alt="">
        </label>

        <input type="file" id="MYimage_{{$name}}" style="display: none" class="file-upload"
               name="file">
        <input type="hidden" value="<?= old($name, isset($data) ? $data : null) ?>"
               name="{{$name}}" id="{{$name}}" class="uploaded_image_name">
        <div class="image-loader" id="loader_{{$name}}"></div>
    </div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" style="padding: 10px !important;max-height: 85vh;overflow-y: auto;">
                <div class="img-container">
                    <img id="Modal_image" src="">
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

        let image_{{$name}}= '{{old($name,isset($data)?$data:null)}}';
        let image_{{$name}}_req = 1;


        $(function () {

            $('#form').submit(function (eventObj) {
                $('#{{$name}}').val(image_{{$name}});
                if (image_{{$name}}_req == 1 && image_{{$name}}== '') {
                    swal({
                        title: 'الرجاء ادخال الصورة',
                        text: 'الرجاء ادخال الصورة المطلوبة',
                        type: 'error',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    eventObj.preventDefault();
                    return false
                }
                return true;
            });

            let Prev_{{$name}} = document.getElementById('Prev_{{$name}}');
            let Input_{{$name}} = document.getElementById('MYimage_{{$name}}');

            var Modal_image = document.getElementById('Modal_image');
            var $modal = $('#modal');
            var cropper;

            Input_{{$name}}.addEventListener('change', function (e) {



                {{--var files = e.target.files;--}}
                {{--var done = function (url) {--}}
                {{--    Input_{{$name}}.--}}
                {{--    value = '';--}}
                {{--    Modal_image.src = url;--}}
                {{--    $modal.modal('show');--}}
                {{--};--}}
                {{--var reader;--}}
                {{--var file;--}}
                {{--var url;--}}

                {{--if (files && files.length > 0) {--}}
                {{--    file = files[0];--}}

                {{--    if (URL) {--}}
                {{--        done(URL.createObjectURL(file));--}}
                {{--    } else if (FileReader) {--}}
                {{--        reader = new FileReader();--}}
                {{--        reader.onload = function (e) {--}}
                {{--            done(reader.result);--}}
                {{--        };--}}
                {{--        reader.readAsDataURL(file);--}}
                {{--    }--}}
                {{--}--}}
            });


            $modal.on('shown.bs.modal', function () {

                cropper = new Cropper(Modal_image, {
                    aspectRatio: {{HELPER::set_if($width,$config['def_image_width'])}}/{{HELPER::set_if($height,$config['def_image_height'])}},
                    viewMode: 3,
                });

            }).on('hidden.bs.modal', function () {
                cropper.destroy();
                cropper = null;
            });

            document.getElementById('crop').addEventListener('click', function () {
                var formData = new FormData();
                formData.append("_token", '{{csrf_token()}}');
                var files =$('.file-upload')[0].files;
                if(files.length>0){
                    formData.append('uploaded_file',files[0]);
                }
                // formData.append('uploaded_file',$('input[name=file]')[0].files[0]);
                console.log();


                // var canvas;

                // $modal.modal('hide');
                {{--if (cropper) {--}}
                {{--    canvas = cropper.getCroppedCanvas();--}}
                {{--    Prev_{{$name}}.src = canvas.toDataURL();--}}

                {{--    canvas.toBlob(function (blob) {--}}

                {{--    });--}}
                {{--}--}}
            });



        })

    </script>


@endsection

