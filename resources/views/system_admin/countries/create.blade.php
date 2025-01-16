@extends('layouts.admin')
@section('hor_menu')
    {{ Menu::renderHorMenu(getHeaderMenuItems()['countries']) }}
@endsection

@section('page_content')
    @component('components.AddEditCard',[
        'Disname'=> t('countries'),
        'Disinfo'=> isset($country) ? t('edit') : t('add_country'),
        'add_url'=> isset($country) ? route('system.countries.update' , $country->id) : route('system.countries.store'),
        'back_url'=>'system.countries.index',
        'action'=> isset($country) ? 'EDIT' : 'add',
    ])
        <div class="row justify-content-center">

            <div class="col-md-7">

                @include('layouts.image_preview', [
                        'id' => 'image',
                        'label' => 'Select or Upload Image',
                        'image'=>isset($country)?App\Helpers\FileHelper::getFullPathSingleAsset(object_get($country , 'flag')):'',                 ])

            </div>


            <div class="col-md-6">
                @component('components.input',['name'=>'name_ar', 'data'=> @ isset($country) ?$country->getTranslation('name','ar'):'' , 'text'=>'العنوان','placeholder'=>'ادخل العنوان','icon'=>'fa-circle'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'name_en', 'data'=> @ isset($country) ? $country->getTranslation('name','en'):'' ,'text'=>'title','placeholder'=>'Enter the title','icon'=>'fa-circle'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'prefix', 'data'=> @ isset($country) ?$country->prefix:'' , 'text'=>t('prefix'),'placeholder'=>t('prefix'),'icon'=>'fa-circle','not_req'=>true])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'alpha_3', 'data'=> @ isset($country) ?$country->alpha_3:'' , 'text'=>t('alpha_3'),'placeholder'=>t('alpha_3'),'icon'=>'fa-circle','not_req'=>true])
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





