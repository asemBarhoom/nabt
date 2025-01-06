@extends('layouts.admin')
@section('hor_menu')
    {{ Menu::renderHorMenu(getHeaderMenuItems()['admins']) }}
@endsection
@section('page_content')



    @component('components.AddEditCard',[
'Disname'=>'الادارة',
'Disinfo'=>'تغيير كلمة المرور',
'add_url'=>route('system.admin.do.profile.password'),
'back_url'=>'system.admin.index',
'action'=>'edit',


])
        <div class="row">
            <div class="col-6">
                @component('components.input',['name'=>'old_password','text'=>'كلمة المرور الحالية','placeholder'=>'كلمة المرور الحالية','icon'=>'fa-lock'])
                @endcomponent
            </div>
            <div class="w-100"></div>
            <div class="col">

                @component('components.input',['name'=>'password','text'=>'كلمة المرور الجديدة','placeholder'=>'كلمة المرور الجديدة','icon'=>'fa-lock'])
                @endcomponent

            </div>
            <div class="col">
                @component('components.input',['name'=>'password_confirmation','text'=>'تأكيد كلمة المرور الجديدة','placeholder'=>'تأكيد كلمة المرور الجديدة','icon'=>'fa-lock'])
                @endcomponent
            </div>
        </div>

    @endcomponent


@endsection

