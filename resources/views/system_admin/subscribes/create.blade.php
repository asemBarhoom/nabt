@extends('layouts.admin')
@section('hor_menu')
    {{ Menu::renderHorMenu(getHeaderMenuItems()['subscribes']) }}
@endsection

@section('page_content')
    @component('components.AddEditCard',[
        'Disname'=> t('subscribes'),
        'Disinfo'=> isset($subscribe) ? t('edit') : t('add_subscribe'),
        'add_url'=> isset($subscribe) ? route('system.subscribes.update' , $subscribe->id) : route('system.subscribes.store'),
        'back_url'=>'system.subscribes.index',
        'action'=> isset($subscribe) ? 'EDIT' : 'add',
    ])
        <div class="row justify-content-center">




            <div class="col-md-12">
                @component('components.input', [
                    'name' => 'email',
                    'data' => isset($subscribe) ? $subscribe->email : '',
                    'text' => 'Email',
                    'placeholder' => 'Enter your email',
                    'icon' => 'fa-envelope'
                ])
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





