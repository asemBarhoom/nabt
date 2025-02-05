@extends('layouts.admin')
@section('hor_menu')
    {{ Menu::renderHorMenu(getHeaderMenuItems()['comments']) }}
@endsection

@section('page_content')
    @component('components.AddEditCard',[
        'Disname'=> t('comments'),
        'Disinfo'=> isset($comment) ? t('edit') : t('add_comment'),
        'add_url'=> isset($comment) ? route('system.comments.update' , $comment->id) : route('system.comments.store'),
        'back_url'=>'system.comments.index',
        'action'=> isset($comment) ? 'EDIT' : 'add',
    ])
        <div class="row justify-content-center">




            <div class="col-md-6">
                @component('components.input',['name'=>'name_ar', 'data'=> @ isset($comment) ?$comment->getTranslation('name','ar'):'' , 'text'=>'العنوان','placeholder'=>'ادخل العنوان','icon'=>'fa-circle'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'name_en', 'data'=> @ isset($comment) ? $comment->getTranslation('name','en'):'' ,'text'=>'title','placeholder'=>'Enter the title','icon'=>'fa-circle'])
                @endcomponent
            </div>


            <div class="col-md-6">
                @component('components.input',['name'=>'title_ar', 'data'=> @ isset($comment) ?$comment->getTranslation('title','ar'):'' , 'text'=>'العنوان','placeholder'=>'ادخل العنوان','icon'=>'fa-circle'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'title_en', 'data'=> @ isset($comment) ? $comment->getTranslation('title','en'):'' ,'text'=>'title','placeholder'=>'Enter the title','icon'=>'fa-circle'])
                @endcomponent
            </div>


            <div class="col-md-6">
                @component('components.area',['name'=>'body_ar', 'data'=> @ isset($comment) ?$comment->getTranslation('body','ar'):'' , 'text'=>'نص ','placeholder'=>'ادخل نص ','icon'=>'fa-quote-right'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.area',['name'=>'body_en', 'data'=> @ isset($comment) ? $comment->getTranslation('body','en'):'' ,'text'=>'body','placeholder'=>'Enter the body','icon'=>'fa-quote-right'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'order','type'=>'number', 'data'=> @ isset($comment) ?$comment->order:'' , 'text'=>'رقم الخطوة','placeholder'=>'ادخل الترتيب','icon'=>'fa-circle'])
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





