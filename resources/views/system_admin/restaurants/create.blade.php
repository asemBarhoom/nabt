@extends('layouts.admin')
@section('hor_menu')
    {{ Menu::renderHorMenu(getHeaderMenuItems()['restaurants']) }}
@endsection

@section('page_content')
    @component('components.AddEditCard',[
        'Disname'=> t('restaurants'),
        'Disinfo'=> isset($restaurant) ? t('edit') : t('add_restaurant'),
        'add_url'=> isset($restaurant) ? route('system.restaurants.update' , $restaurant->id) : route('system.restaurants.store'),
        'back_url'=>'system.restaurants.index',
        'action'=> isset($restaurant) ? 'EDIT' : 'add',
    ])
        <div class="row justify-content-center">




            <div class="col-md-6">
                @component('components.input',['name'=>'name_ar', 'data'=> @ isset($restaurant) ?$restaurant->getTranslation('name','ar'):'' , 'text'=>'العنوان','placeholder'=>'ادخل العنوان','icon'=>'fa-circle'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'name_en', 'data'=> @ isset($restaurant) ? $restaurant->getTranslation('name','en'):'' ,'text'=>'title','placeholder'=>'Enter the title','icon'=>'fa-circle'])
                @endcomponent
            </div>


            <div class="col-md-6">
                @component('components.input',['name'=>'title_ar', 'data'=> @ isset($restaurant) ?$restaurant->getTranslation('title','ar'):'' , 'text'=>'العنوان','placeholder'=>'ادخل العنوان','icon'=>'fa-circle'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'title_en', 'data'=> @ isset($restaurant) ? $restaurant->getTranslation('title','en'):'' ,'text'=>'title','placeholder'=>'Enter the title','icon'=>'fa-circle'])
                @endcomponent
            </div>


            <div class="col-md-6">
                @component('components.area',['name'=>'body_ar', 'data'=> @ isset($restaurant) ?$restaurant->getTranslation('body','ar'):'' , 'text'=>'نص ','placeholder'=>'ادخل نص ','icon'=>'fa-quote-right'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.area',['name'=>'body_en', 'data'=> @ isset($restaurant) ? $restaurant->getTranslation('body','en'):'' ,'text'=>'body','placeholder'=>'Enter the body','icon'=>'fa-quote-right'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'order','type'=>'number', 'data'=> @ isset($restaurant) ?$restaurant->order:'' , 'text'=>'رقم الخطوة','placeholder'=>'ادخل الترتيب','icon'=>'fa-circle'])
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





