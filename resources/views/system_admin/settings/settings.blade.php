@extends('layouts.admin')

@php
    $Disname='الاعدادات';
    $Disinfo='الاعدادات الخاصة بالتطبيق ';
@endphp
@section('title',  $Disname)
@section('head')

@endsection
@section('page_content')


    <div class="card card-custom">
        <div class="card-header  card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">{{$Disname}}
                    <div class="text-muted pt-2 font-size-sm">{{$Disinfo}}</div>
                </h3>
            </div>
            <div class="card-toolbar">


                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                    <li class="nav-item ">
                        <a class="nav-link  {{count($errors)==0||$errors->has('currency_ar')||$errors->has('currency_en')||$errors->has('ios')||$errors->has('android')||$errors->has('bank_name')||$errors->has('iban')?'active':''}}" data-toggle="tab" href="#tab1">
                            اعدادات التطبيق
                        </a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link {{$errors->has('mobile')||$errors->has('email')||$errors->has('whatsapp')||$errors->has('instagram')||$errors->has('facebook')||$errors->has('twitter')?'active':''}}" data-toggle="tab" href="#tab2">
                            اعدادات التواصل
                        </a>

                    </li>
                    <li class="nav-item m-tabs__item disabled">
                        <a class="nav-link disabled {{$errors->has('bage')?'active':''}}" data-toggle="tab" href="#tab3">
                            اعدادات اللاند بيج
                        </a>

                    </li>
                </ul>
            </div>

        </div>

        <div class="card-body">

        <div class="m-content">
        <div class="row">
            <div class="col-lg-12">

                <!--begin::Portlet-->


                        <form action="{{route('system.settings.add')}}" method="post" id="form" >



                            <div class="tab-content">

                                <div class="tab-pane {{count($errors)==0||$errors->has('currency_ar')||$errors->has('currency_en')||$errors->has('ios')||$errors->has('android')||$errors->has('bank_name')||$errors->has('iban')?'active':''}}" id="tab1" role="tabpanel">

                                    <div class="row">
                                        <div class="col-md-6">
                                            @component('components.input',['name'=>'currency_ar','data'=>HELPER::set_if($page['currency_ar']),'text'=>'العملة ','placeholder'=>'ادخل العملة','icon'=>'fa-dollar-sign'])
                                            @endcomponent
                                        </div>
                                        <div class="col-md-6">
                                            @component('components.input',['name'=>'currency_en','data'=>HELPER::set_if($page['currency_en']),'text'=>'Currency in English','placeholder'=>'Enter currency','icon'=>'fa-dollar-sign'])
                                            @endcomponent
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col-md-6">
                                            @component('components.input',['name'=>'ios','data'=>HELPER::set_if($page['ios']),'text'=>'رابط التطبيق ايفون ','icon'=>'fa-globe'])
                                            @endcomponent
                                        </div>
                                        <div class="col-md-6">
                                            @component('components.input',['name'=>'android','data'=>HELPER::set_if($page['android']),'text'=>'رابط التطبيق اندرويد','icon'=>'fa-globe'])
                                            @endcomponent
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col-md-6">
                                            @component('components.input',['name'=>'bank_name','data'=>HELPER::set_if($page['bank_name']),'text'=>'اسم البنك','icon'=>'fa-dollar-sign'])
                                            @endcomponent
                                        </div>
                                        <div class="col-md-6">
                                            @component('components.input',['name'=>'iban','data'=>HELPER::set_if($page['iban']),'text'=>'اي بان','icon'=>'fa-dollar-sign'])
                                            @endcomponent
                                        </div>


                                    </div>
                                </div>

                                <div class="tab-pane {{$errors->has('mobile')||$errors->has('email')||$errors->has('whatsapp')||$errors->has('address')||$errors->has('facebook')||$errors->has('twitter')?'active':''}}" id="tab2" role="tabpanel">

                                    <div class="row">
                                        <div class="col-md-6">
                                            @component('components.input',['name'=>'mobile','data'=>HELPER::set_if($page['mobile']),'text'=>'جوال','placeholder'=>'ادخل جوال','icon'=>'fa-phone'])
                                            @endcomponent
                                        </div>
                                        <div class="col-md-6">
                                            @component('components.input',['name'=>'email','data'=>HELPER::set_if($page['email']),'text'=>'ايميل','placeholder'=>'ادخل الايميل','icon'=>'fa-envelope'])
                                            @endcomponent
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col-md-6">
                                            @component('components.input',['name'=>'whatsapp','data'=>HELPER::set_if($page['whatsapp']),'text'=>'whatsapp','icon'=>'fa-phone'])
                                            @endcomponent
                                        </div>
                                        <div class="col-md-6">
                                            @component('components.input',['name'=>'address','data'=>HELPER::set_if($page['address']),'text'=>'العنوان','placeholder'=>'ادخل العنوان','icon'=>'fa-map'])
                                            @endcomponent
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col-md-6">
                                            @component('components.input',['name'=>'facebook','data'=>HELPER::set_if($page['facebook']),'text'=>'فيس بوك','icon_pre'=>'fab ','icon'=>'fa-facebook'])
                                            @endcomponent
                                        </div>
                                        <div class="col-md-6">
                                            @component('components.input',['name'=>'twitter','data'=>HELPER::set_if($page['twitter']),'text'=>'رابط تويتر','placeholder'=>'ادخل رابط تويتر','icon_pre'=>'fab ','icon'=>'fa-twitter'])
                                            @endcomponent
                                        </div>

                                        <div class="w-100"></div>

                                    </div>
                                </div>

                                <div class="tab-pane disabled {{$errors->has('about_text')?'active':''}}" id="tab3" role="tabpanel">

{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-12">--}}
{{--                                            @component('components.area',['name'=>'about_text','data'=>HELPER::set_if($page['about_text']),'text'=>'نص تعرف معنا علي شركة ساري'])--}}
{{--                                            @endcomponent--}}
{{--                                        </div>--}}
{{--                                        <div class="w-100"></div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>

                            @csrf

                            <div class="clearfix"></div>
                            <br>

                            <div class="col">
                                <button type="submit" class="{{config('layout.classes.submit')}}">
                                    <i class="fa fa-check"></i>
                                    <span>تعديل</span>
                                </button>
                                <a href="{{route('system_admin.dashboard')}}" class="{{config('layout.classes.cancel')}}">
                                    <i class="la la-times"></i>
                                    <span>الغاء</span>
                                </a>
                            </div>

                            <div class="clearfix"></div>
                        </form>



            </div>
        </div>
    </div>
        </div>

    </div>

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

@endsection
