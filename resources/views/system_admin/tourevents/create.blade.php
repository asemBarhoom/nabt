@extends('layouts.admin')
@section('hor_menu')
    {{ Menu::renderHorMenu(getHeaderMenuItems()['tourevents']) }}
@endsection

@section('page_content')
    @component('components.AddEditCard',[
        'Disname'=>t('tourevents'),
        'Disinfo'=> isset($tourevent) ? t('edit') : t('add_tourevent'),
        'add_url'=> isset($tourevent) ? route('system.tourevents.update' , $tourevent->id) : route('system.tourevents.store'),
        'back_url'=>'system.tourevents.index',
        'action'=> isset($tourevent) ? 'EDIT' : 'add',
    ])
        <div class="row justify-content-center">

            <div class="col-md-6">

                @include('layouts.image_preview', [
                        'id' => 'image',
                        'label' => 'Select or Upload Image',
                        'image'=>isset($tourevent)?App\Helpers\FileHelper::getFullPathSingleAsset(object_get($tourevent , 'image')):'',
                ])

            </div>

            <div class="col-md-6">

                @include('layouts.image_preview', [
                        'id' => 'cover_image',
                        'label' => 'Select or Upload Cover Image',
                        'image'=>isset($tourevent)?App\Helpers\FileHelper::getFullPathSingleAsset(object_get($tourevent , 'cover_image')):'',
                 ])

            </div>


            <div class="col-md-6">
                @component('components.input', ['name' => 'name_ar','data'=> @ isset($tourevent) ?$tourevent->getTranslation('name','ar'):'' , 'text' => 'الاسم بالعربية', 'placeholder' => 'ادخل الاسم بالعربية', 'icon' => 'fa-building'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input', ['name' => 'name_en','data'=> @ isset($tourevent) ?$tourevent->getTranslation('name','en'):'' , 'text' => 'Name', 'placeholder' => 'Enter Name', 'icon' => 'fa-globe'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input', ['name' => 'position_ar','data'=> @ isset($tourevent) ?$tourevent->getTranslation('position','ar'):'' , 'text' => 'الوظيفة', 'placeholder' => 'ادخل الوظيفة', 'icon' => 'fa-briefcase'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input', ['name' => 'position_en','data'=> @ isset($tourevent) ?$tourevent->getTranslation('position','en'):'' , 'text' => 'Position', 'placeholder' => 'Enter Position', 'icon' => 'fa-briefcase'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.area', ['name' => 'body_ar','data'=> @ isset($tourevent) ?$tourevent->getTranslation('body','ar'):'' , 'text' => 'الوصف بالعربية', 'placeholder' => 'ادخل الوصف بالعربية', 'icon' => 'fa-paragraph'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.area', ['name' => 'body_en','data'=> @ isset($tourevent) ?$tourevent->getTranslation('body','en'):'' , 'text' => 'Description', 'placeholder' => 'Enter Description', 'icon' => 'fa-paragraph'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.area_editor', ['name' => 'description_ar','data'=> @ isset($tourevent) ?$tourevent->getTranslation('description','ar'):'' , 'text' => 'تفاصيل', 'placeholder' => 'ادخل التفاصيل', 'icon' => 'fa-info-circle'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.area_editor', ['name' => 'description_en','data'=> @ isset($tourevent) ?$tourevent->getTranslation('description','en'):'' , 'text' => 'Details', 'placeholder' => 'Enter Details', 'icon' => 'fa-info-circle'])
                @endcomponent
            </div>

            <div class="col-md-6">

                    @component('components.input', [
                           'name' => 'at',
                           'type' => 'date',
                           'text' => 'التاريخ',
                           'placeholder' => 'التاريخ',
                           'data' => isset($tourevent) && $tourevent->at ? \Carbon\Carbon::parse($container->at)->format('Y-m-d') : '',
                           'not_req' => false, // Optional parameter for non-required fields
                           'icon' => 'fa-calendar',

                       ])
                    @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'rating', 'data'=> @ isset($tourevent) ?$tourevent->rating:'' , 'text'=>'rating','placeholder'=>'ادخل التقييم','icon'=>'fa-star'])
                @endcomponent
            </div>




            <div class="col-md-4">
                @component('components.selectArr',['name'=>'category_id','data'=> @ isset($tourevent) ?$tourevent->category_id:'', 'select' => \App\Models\Category::query()->get()->pluck('name','id')->toArray(), 'text' => 'الفئة', 'icon'=>'fa-list'])
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

    <script>
        $(function () {
            $('.input-date').datepicker({
                rtl: true,
                autoclose: true,
                format: "yyyy-mm-dd"
            });
        })
    </script>

@endsection





