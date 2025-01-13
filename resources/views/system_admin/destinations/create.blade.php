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





            <div class="col-md-6">

                @include('layouts.image_preview', [
                        'id' => 'image',
                        'label' => 'Select or Upload Image',
                        'image' => App\Helpers\FileHelper::getFullPathSingleAsset(object_get($destination , 'image')
                )])

            </div>

            <div class="col-md-6">

                @include('layouts.image_preview', [
                        'id' => 'cover_image',
                        'label' => 'Select or Upload Cover Image',
                        'image' => App\Helpers\FileHelper::getFullPathSingleAsset(object_get($destination , 'cover_image')
                )])

            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'name_ar', 'data'=> @ isset($destination) ?$destination->getTranslation('name','ar'):'' , 'text'=>'العنوان','placeholder'=>'ادخل العنوان','icon'=>'fa-circle'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'name_en', 'data'=> @ isset($destination) ? $destination->getTranslation('name','en'):'' ,'text'=>'title','placeholder'=>'Enter the title','icon'=>'fa-circle'])
                @endcomponent
            </div>

            <div class="col-md-12">
                @component('components.multiupload_create',['name'=>'multi_images','name1'=>'def_image','text'=>'الصور '])
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
            // Handle image input change
            $('.image_input').change(function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        // Find the corresponding preview image by ID
                        const previewId = $(this).attr('id').replace('image_input_', 'image_preview_');
                        $('#' + previewId).attr('src', event.target.result);
                    }.bind(this);
                    reader.readAsDataURL(file);
                }
            });

            // Handle image click to trigger file input
            $('img[for]').click(function () {
                const inputId = $(this).attr('for'); // Get the associated file input ID
                $('#' + inputId).click(); // Trigger the file input click event
            });
        });


    </script>

@endsection





