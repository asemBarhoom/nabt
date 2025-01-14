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
                        'image'=>isset($destination)?App\Helpers\FileHelper::getFullPathSingleAsset(object_get($destination , 'image')):'',
                ])

            </div>

            <div class="col-md-6">

                @include('layouts.image_preview', [
                        'id' => 'cover_image',
                        'label' => 'Select or Upload Cover Image',
                        'image'=>isset($destination)?App\Helpers\FileHelper::getFullPathSingleAsset(object_get($destination , 'cover_image')):'',
                 ])

            </div>


            <div class="col-md-6">
                @component('components.input',['name'=>'name_ar', 'data'=> @ isset($destination) ?$destination->getTranslation('name','ar'):'' , 'text'=>'العنوان','placeholder'=>'ادخل العنوان','icon'=>'fa-pen'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'name_en', 'data'=> @ isset($destination) ?$destination->getTranslation('name','en'):'' , 'text'=>'Title','placeholder'=>'Enter Title','icon'=>'fa-pen'])
                @endcomponent
            </div>





            <div class="col-md-6">
                @component('components.input',['name'=>'weather_description_ar', 'data'=> @ isset($destination) ?$destination->getTranslation('weather_description','ar'):'' , 'text'=>'وصف الطقس بالعربية','placeholder'=>'ادخل وصف الطقس بالعربية','icon'=>'fa-cloud'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input', [
                    'name' => 'weather_description_en',
                    'data' => @ isset($destination) ? $destination->getTranslation('weather_description', 'en') : '',
                    'text' => 'Weather Description',
                    'placeholder' => 'Enter Weather Description',
                    'icon' => 'fa-cloud'
                ])
                @endcomponent
            </div>




            <div class="col-md-6">
                @component('components.input', ['name' => 'amenities_ar','data'=> @ isset($destination) ?$destination->getTranslation('amenities','ar'):'', 'text' => 'المرافق', 'placeholder' => 'ادخل المرافق', 'icon'=>'fa-concierge-bell'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input', ['name' => 'amenities_en','data'=> @ isset($destination) ?$destination->getTranslation('amenities','en'):'', 'text' => 'Amenities', 'placeholder' => 'Enter Amenities', 'icon'=>'fa-concierge-bell'])
                @endcomponent
            </div>



            <div class="col-md-6">
                @component('components.input', ['name' => 'recommended_visit_season_ar','data'=> @ isset($destination) ?$destination->getTranslation('recommended_visit_season','ar'):'', 'text' => 'موسم الزيارة الموصى به', 'placeholder' => 'ادخل موسم الزيارة الموصى به', 'icon'=>'fa-calendar-alt'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input', ['name' => 'recommended_visit_season_en','data'=> @ isset($destination) ?$destination->getTranslation('recommended_visit_season','en'):'', 'text' => 'Recommended Visit Season', 'placeholder' => 'Enter Recommended Visit Season', 'icon'=>'fa-calendar-alt'])
                @endcomponent
            </div>

            <div class="col-md-4">
                @component('components.selectArr',['name'=>'category_id','data'=> @ isset($destination) ?$destination->category_id:'', 'select' => \App\Models\Category::query()->get()->pluck('name','id')->toArray(), 'text' => 'الفئة', 'icon'=>'fa-list'])
                @endcomponent
            </div>

            <div class="col-md-4">
                @component('components.input', ['name' => 'lat','data'=> @ isset($destination) ?$destination->lat:'', 'text' => 'خط العرض', 'placeholder' => 'ادخل خط العرض', 'icon'=>'fa-map-marker-alt'])
                @endcomponent
            </div>

            <div class="col-md-4">
                @component('components.input', ['name' => 'lng','data'=> @ isset($destination) ?$destination->lng:'', 'text' => 'خط الطول', 'placeholder' => 'ادخل خط الطول', 'icon'=>'fa-map-marker-alt'])
                @endcomponent
            </div>


            <div class="col-md-6">
                @component('components.input', ['name' => 'annual_visitors_min','data'=> @ isset($destination) ?$destination->annual_visitors_min:'', 'text' => 'الزوار السنويون (الحد الأدنى)', 'placeholder' => 'ادخل الحد الأدنى للزوار', 'icon'=>'fa-users'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input', ['name' => 'annual_visitors_max','data'=> @ isset($destination) ?$destination->annual_visitors_max:'', 'text' => 'الزوار السنويون (الحد الأقصى)', 'placeholder' => 'ادخل الحد الأقصى للزوار', 'icon'=>'fa-users'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.area',['name'=>'body_ar', 'data'=> @ isset($destination) ?$destination->getTranslation('body','ar'):'' , 'text'=>'الوصف بالعربية','placeholder'=>'ادخل الوصف بالعربية','icon'=>'fa-align-right'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.area',['name'=>'body_en', 'data'=> @ isset($destination) ?$destination->getTranslation('body','en'):'' , 'text'=>'Description','placeholder'=>'Enter Description','icon'=>'fa-align-left'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.area_editor',['name'=>'description_ar', 'data'=> @ isset($destination) ?$destination->getTranslation('description','ar'):'' , 'text'=>'الوصف بالعربية','placeholder'=>'ادخل الوصف بالعربية','icon'=>'fa-align-right'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.area_editor',['name'=>'description_en', 'data'=> @ isset($destination) ?$destination->getTranslation('description','en'):'' , 'text'=>'Description','placeholder'=>'Enter Description','icon'=>'fa-align-left'])
                @endcomponent
            </div>



{{--            <div class="col-md-12">--}}
{{--                @component('components.multiupload_create',['name'=>'multi_images','name1'=>'def_image','text'=>'الصور '])--}}
{{--                @endcomponent--}}

{{--            </div>--}}


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





