@extends('layouts.admin')
@section('hor_menu')
    {{ Menu::renderHorMenu(getHeaderMenuItems()['users']) }}
@endsection

@section('page_content')
    @component('components.AddEditCard',[
        'Disname'=> t('users'),
        'Disinfo'=> isset($user) ? t('edit') : t('add_user'),
        'add_url'=> isset($user) ? route('system.users.update' , $user->id) : route('system.users.store'),
        'back_url'=>'system.users.index',
        'action'=> isset($user) ? 'EDIT' : 'add',
    ])
        <div class="row justify-content-center">

            <div class="col-md-7">

                @include('layouts.image_preview', [
                        'id' => 'image',
                        'label' => 'Select or Upload Image',
                        'image'=>isset($user)?App\Helpers\FileHelper::getFullPathSingleAsset(object_get($user , 'image')):'',                 ])

            </div>


            <div class="col-md-6">
                @component('components.input',['name'=>'name', 'data'=> @ isset($user) ?$user->name:'' , 'text'=>t('name'),'placeholder'=>t('name'),'icon'=>'fa-circle'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'email', 'data'=> @ isset($user) ?$user->email:'' , 'text'=>t('email'),'placeholder'=>t('email'),'icon'=>'fa-circle','not_req'=>true])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'password', 'data'=> null , 'text'=>t('password'),'placeholder'=>t('password'),'icon'=>'fa-circle','not_req'=>true])
                @endcomponent
            </div>



            <div class="col-md-6">
                @component('components.input',['name'=>'prefix', 'data'=> @ isset($user) ?$user->prefix:'' , 'text'=>t('prefix'),'placeholder'=>t('prefix'),'icon'=>'fa-circle'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'phone', 'data'=> @ isset($user) ?$user->phone:'' , 'text'=>t('phone'),'placeholder'=>t('phone'),'icon'=>'fa-circle'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'age', 'data'=> @ isset($user) ?$user->age:'' , 'text'=>t('age'),'placeholder'=>t('age'),'icon'=>'fa-circle','not_req'=>true])
                @endcomponent
            </div>


            <div class="col-md-6">
                @component('components.selectArr',['name'=>'country_id','data'=> @ isset($user) ?$user->country_id:'', 'select' => \App\Models\Country::query()->get()->pluck('name','id')->toArray(), 'text' => t('country'), 'icon'=>'fa-list'])
                @endcomponent
            </div>



            <div class="col-md-6">
                @component('components.selectArr',['name'=>'city_id','data'=> @ isset($user) ?$user->city_id:'', 'select' => \App\Models\City::query()->get()->pluck('name','id')->toArray(), 'text' => t('city'), 'icon'=>'fa-list'])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'address', 'data'=> @ isset($user) ?$user->address:'' , 'text'=>t('address'),'placeholder'=>t('address'),'icon'=>'fa-circle','not_req'=>true])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'job', 'data'=> @ isset($user) ?$user->job:'' , 'text'=>t('job'),'placeholder'=>t('job'),'icon'=>'fa-circle','not_req'=>true])
                @endcomponent
            </div>

            <div class="col-md-6">
                @component('components.input',['name'=>'dob', 'data'=> @ isset($user) ?$user->dob:'' , 'text'=>t('dob'),'placeholder'=>t('dob'),'icon'=>'fa-circle','not_req'=>true])
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





