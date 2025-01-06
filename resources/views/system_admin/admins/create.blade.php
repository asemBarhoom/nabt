@extends('layouts.admin')
@section('hor_menu')
    {{ Menu::renderHorMenu(getHeaderMenuItems()['admins']) }}
@endsection
@section('head')

@endsection
@section('page_content')

    @component('components.AddEditCard',[
'Disname'=>t('admins'),
'Disinfo'=>'',
'add_url'=>route('system.admin.do.create'),
'back_url'=>'system.admin.index',
'action'=>'add',


])

        <div class="row justify-content-center align-items-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6">
                        @component('components.input',['name'=>'name','text'=>t('name'),'placeholder'=>'','icon'=>'fa-user-alt'])
                        @endcomponent


                    </div>
                    <div class="col-md-6">
                        @component('components.input',['name'=>'username','text'=>t('email'),'placeholder'=>'','icon'=>'fa-user-alt'])
                        @endcomponent

                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-6">

                        @component('components.input',['name'=>'mobile','text'=>t('mobile'),'placeholder'=>'','icon'=>'fa-phone'])
                        @endcomponent

                    </div>
                    <div class="col">

                        @component('components.input',['name'=>'password','type'=>'password','text'=>t('password'),'placeholder'=>'','icon'=>'fa-lock'])
                        @endcomponent
                    </div>
                    <div class="w-100"></div>
                </div>

            </div>
            {{--                <div class="col-md-2">--}}
            {{--                    @component('components.upload_image',['name'=>'image','text'=>'صورة الحساب','hint'=>'100 * 100 بيكسل'])--}}
            {{--                    @endcomponent--}}
            {{--                </div>--}}

            <div class="col-md-7">
                @component('components.upload_image_no_crop',['name'=>'image', 'data'=> @ isset($category) ?$category->image:'' , 'text'=>t('image'),'hint'=>''])
                @endcomponent
            </div>

            <div class="clearfix"></div>
        </div>




    @endcomponent

@endsection





@section('custom_scripts')
    <script>
        $(function () {
            $('#form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'abs_error help-block has-error',
                rules: {
                    price: {
                        required: true,
                        number: true
                    }
                }

            }).init();


        })

    </script>

@endsection


