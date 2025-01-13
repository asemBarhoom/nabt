@extends('layouts.admin')
@section('hor_menu')
    {{ Menu::renderHorMenu(getHeaderMenuItems()['destinations']) }}
@endsection

@section('page_content')
    @component('components.AddEditCard',[
        'Disname'=>'التصنيفات',
        'Disinfo'=> isset($destination) ? 'تعديل التصنيف' : 'اضافة تصنيف جديد',
        'add_url'=> isset($destination) ? route('system.destinations.update' , $destination->id) : route('system.destinations.store'),
        'back_url'=>'system.destinations.index',
        'action'=> isset($destination) ? 'EDIT' : 'add',
    ])
        <div class="row justify-content-center">

            <div class="col-md-7">
                <div class="row mb-3 image ">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">{{t('Image')}}</label>
                    <div class="col-sm-10">
                        <div class="mb-3">
                            <input  class="form-control image_input d-none" type="file" name="image" id="image_preview">
                            @include('layouts.image_preview',[
                                        'image'=>isset($destination)?App\Helpers\FileHelper::getFullPathSingleAsset(object_get($destination , 'image')):'',
                                        'id'=>'image_preview'
                                        ])

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                @component('components.input',['name'=>'name_ar', 'data'=> @ isset($destination) ?$destination->getTranslation('name','ar'):'' , 'text'=>'العنوان','placeholder'=>'ادخل العنوان','icon'=>'fa-circle'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'name_en', 'data'=> @ isset($destination) ? $destination->getTranslation('name','en'):'' ,'text'=>'title','placeholder'=>'Enter the title','icon'=>'fa-circle'])
                @endcomponent
            </div>


        </div>

    @endcomponent
    <!-- END PAGE BASE CONTENT -->
@endsection

@section('custom_scripts')

    <script>

        $(function () {

            $('#form').validate({

                errorElement: 'div', //default input error message container
                errorClass: 'abs_error help-block has-error',

            }).init();

        })

    </script>
    <script>
        $(document).ready(() => {
            // When the value of the '.image_input' element changes
            $('.image_input').change(function() {
                const file = this.files[0];
                console.log(file);
                if (file) {
                    // Create a FileReader object to read the file
                    let reader = new FileReader();

                    // When the file is loaded
                    reader.onload = function(event) {
                        console.log(event.target.result);

                        // Set the 'src' attribute of the inner '.image_preview' element
                        $(this).siblings('.image_preview').attr('src', event.target.result);
                    }.bind(this);

                    // Read the file as a data URL
                    reader.readAsDataURL(file);
                }
            });

            $('img[for]').click(function (event) {
                $('#' +$(this).attr('for')).click()
            })
        });

    </script>

@endsection





