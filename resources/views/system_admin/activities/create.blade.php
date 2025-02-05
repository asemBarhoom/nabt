@extends('layouts.admin')
@section('hor_menu')
    {{ Menu::renderHorMenu(getHeaderMenuItems()['activities']) }}
@endsection

@section('page_content')
    @component('components.AddEditCard',[
        'Disname'=> t('activities'),
        'Disinfo'=> isset($activity) ? t('edit') : t('add_activity'),
        'add_url'=> isset($activity) ? route('system.activities.update' , $activity->id) : route('system.activities.store'),
        'back_url'=>'system.activities.index',
        'action'=> isset($activity) ? 'EDIT' : 'add',
    ])
        <div class="row justify-content-center">


            <div class="col-md-7">
                <div class="row mb-3 image ">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">{{t('Image')}}</label>
                    <div class="col-sm-10">
                        <div class="mb-3">
                            <input  class="form-control image_input d-none" type="file" name="image" id="image_preview">
                            @include('layouts.image_preview',[
                                        'image'=>isset($activity)?App\Helpers\FileHelper::getFullPathSingleAsset(object_get($activity , 'image')):'',
                                        'id'=>'image_preview'
                                        ])

                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-6">
                @component('components.input',['name'=>'title', 'data'=> @ isset($activity) ?$activity->title:'' , 'text'=>'العنوان','placeholder'=>'ادخل العنوان','icon'=>'fa-circle'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'start_time', 'data'=> @ isset($activity) ?$activity->start_time:'' , 'text'=>'وقت بدء الفعالية','placeholder'=>'','icon'=>'fa-circle'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'end_time', 'data'=> @ isset($activity) ?$activity->end_time:'' , 'text'=>'وقت انتهاء الفعالية','placeholder'=>'','icon'=>'fa-circle'])
                @endcomponent
            </div>


            <div class="col-md-6">
                @component('components.input',['name'=>'end_time', 'data'=> @ isset($activity) ?$activity->date:'' , 'text'=>'ناريخ الفعالية','placeholder'=>'','icon'=>'fa-circle'])
                @endcomponent
            </div>




            <div class="col-md-6">
                @component('components.area',['name'=>'description', 'data'=> @ isset($activity) ?$activity->description:'' , 'text'=>'نص ','placeholder'=>'ادخل نص ','icon'=>'fa-quote-right'])
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





