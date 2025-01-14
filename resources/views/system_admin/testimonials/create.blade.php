@extends('layouts.admin')
@section('hor_menu')
    {{ Menu::renderHorMenu(getHeaderMenuItems()['testimonials']) }}
@endsection

@section('page_content')
    @component('components.AddEditCard',[
        'Disname'=>t('testimonials'),
        'Disinfo'=> isset($testimonial) ?t('edit') : t('add_testimonial'),
        'add_url'=> isset($testimonial) ? route('system.testimonials.update' , $testimonial->id) : route('system.testimonials.store'),
        'back_url'=>'system.testimonials.index',
        'action'=> isset($testimonial) ? 'EDIT' : 'add',
    ])
        <div class="row justify-content-center">


            <div class="col-md-7">

                @include('layouts.image_preview', [
                        'id' => 'image',
                        'label' => 'Select or Upload Image',
                        'image' =>  App\Helpers\FileHelper::getFullPathSingleAsset(isset($testimonial)? object_get($testimonial,'image'):null)
                 ])

            </div>


            <div class="col-md-6">
                @component('components.input',['name'=>'name_ar', 'data'=> @ isset($testimonial) ?$testimonial->getTranslation('name','ar'):'' , 'text'=>'العنوان','placeholder'=>'ادخل الاسم','icon'=>'fa-user'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'name_en', 'data'=> @ isset($testimonial) ? $testimonial->getTranslation('name','en'):'' ,'text'=>'title','placeholder'=>'Enter the fa-user','icon'=>'fa-user'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'position_ar', 'data'=> @ isset($testimonial) ?$testimonial->getTranslation('position','ar'):'' , 'text'=>'الوظيفة','placeholder'=>'ادخل الوظيفة','icon'=>'fa-briefcase'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'position_en', 'data'=> @ isset($testimonial) ? $testimonial->getTranslation('position','en'):'' ,'text'=>'position','placeholder'=>'Enter the position','icon'=>'fa-briefcase'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.area',['name'=>'body_ar', 'data'=> @ isset($testimonial) ?$testimonial->getTranslation('body','ar'):'' , 'text'=>'نص الشهادة','placeholder'=>'ادخل نص الشهادة','icon'=>'fa-quote-right'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.area',['name'=>'body_en', 'data'=> @ isset($testimonial) ? $testimonial->getTranslation('body','en'):'' ,'text'=>'body','placeholder'=>'Enter the body','icon'=>'fa-quote-right'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'rating', 'data'=> @ isset($testimonial) ?$testimonial->rating:'' , 'text'=>'rating','placeholder'=>'ادخل التقييم','icon'=>'fa-star'])
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
@endsection





