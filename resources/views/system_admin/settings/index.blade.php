@extends('layouts.admin')

@php
    $Disname = t('settings');
    $Disinfo = t('site_settings');
@endphp
@section('title',  $Disname)
@section('head')

@endsection
@section('page_content')


    <div class="card card-custom">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">{{ $Disname }}
                    <div class="text-muted pt-2 font-size-sm">{{ $Disinfo }}</div>
                </h3>
            </div>
            <div class="card-toolbar">


                <ul class="nav nav-tabs nav-bold nav-tabs-line">


                    <li class="nav-item m-tabs__item" >
                        <a class="nav-link {{$errors->has('mobile')||$errors->has('email')||$errors->has('whatsapp')||$errors->has('instagram')||$errors->has('facebook')||$errors->has('twitter') || count($errors)==0||$errors->has('currency_ar')||$errors->has('currency_en')||$errors->has('ios')||$errors->has('android')||$errors->has('bank_name')||$errors->has('iban')?'active':''}}" data-toggle="tab" href="#tab2">
                            {{ t('contact_settings') }}
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



                                <div class="tab-pane active {{$errors->has('mobile')||$errors->has('email')||$errors->has('whatsapp')||$errors->has('address')||$errors->has('facebook')||$errors->has('twitter')?'active':''}}" id="tab2" role="tabpanel">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            @component('components.upload_image_no_crop',['name'=>'logo', 'data'=>HELPER::set_if($page['logo']) , 'text'=>t('logo'),'hint'=>' '])
                                            @endcomponent
                                        </div>

                                        <div class="col-md-6">
                                            @component('components.upload_image_no_crop',['name'=>'background', 'data'=>HELPER::set_if($page['background']) , 'text'=>t('first_section_background'),'hint'=>' '])
                                            @endcomponent
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            @component('components.input',['name'=>'mobile','data'=>HELPER::set_if($page['mobile']),'text'=>t('mobile'),'placeholder'=>t('enter_mobile'),'icon'=>'fa-phone'])
                                            @endcomponent
                                        </div>
                                        <div class="col-md-6">
                                            @component('components.input',['name'=>'email','data'=>HELPER::set_if($page['email']),'text'=>t('email'),'placeholder'=>t('enter_email'),'icon'=>'fa-envelope'])
                                            @endcomponent
                                        </div>



                                        <div class="w-100"></div>

                                        <div class="col-md-4">
                                            @component('components.input',['name'=>'title_ar','data'=>HELPER::set_if($page['title_ar']),'text'=>t('title_ar'),'placeholder'=>t('enter_title_ar'),'icon'=>'fa-circle'])
                                            @endcomponent
                                        </div>

                                        <div class="col-md-4">
                                            @component('components.input',['name'=>'title_en','data'=>HELPER::set_if($page['title_en']),'text'=>t('title_en'),'placeholder'=>t('enter_title_en'),'icon'=>'fa-circle'])
                                            @endcomponent
                                        </div>

                                        <div class="col-md-4">
                                            @component('components.input',['name'=>'title_zh','data'=>HELPER::set_if($page['title_zh']),'text'=>t('title_zh'),'placeholder'=>t('enter_title_zh'),'icon'=>'fa-circle'])
                                            @endcomponent
                                        </div>
                                        <div class="w-100"></div>

                                        <div class="col-md-4">
                                            @component('components.input',['name'=>'location_ar','data'=>HELPER::set_if($page['location_ar']),'text'=>t('location_ar'),'placeholder'=>t('enter_location_ar'),'icon'=>'fa-circle'])
                                            @endcomponent
                                        </div>

                                        <div class="col-md-4">
                                            @component('components.input',['name'=>'location_en','data'=>HELPER::set_if($page['location_en']),'text'=>t('location_en'),'placeholder'=>t('enter_location_en'),'icon'=>'fa-circle'])
                                            @endcomponent
                                        </div>

                                        <div class="col-md-4">
                                            @component('components.input',['name'=>'location_zh','data'=>HELPER::set_if($page['location_zh']),'text'=>t('location_zh'),'placeholder'=>t('enter_location_zh'),'icon'=>'fa-circle'])
                                            @endcomponent
                                        </div>

                                        <div class="w-100"></div>

                                        <div class="col-md-4">
                                            @component('components.input',['name'=>'working_hours_ar','data'=>HELPER::set_if($page['working_hours_ar']),'text'=>t('working_hours_ar'),'placeholder'=>t('enter_working_hours_ar'),'icon'=>'fa-circle'])
                                            @endcomponent
                                        </div>

                                        <div class="col-md-4">
                                            @component('components.input',['name'=>'working_hours_en','data'=>HELPER::set_if($page['working_hours_en']),'text'=>t('working_hours_en'),'placeholder'=>t('enter_working_hours_en'),'icon'=>'fa-circle'])
                                            @endcomponent
                                        </div>

                                        <div class="col-md-4">
                                            @component('components.input',['name'=>'working_hours_zh','data'=>HELPER::set_if($page['working_hours_zh']),'text'=>t('working_hours_zh'),'placeholder'=>t('enter_working_hours_zh'),'icon'=>'fa-circle'])
                                            @endcomponent
                                        </div>

                                        <div class="col-md-2">
                                            @component('components.input',['name'=>'facebook','data'=>HELPER::set_if($page['facebook']),'text'=>t('facebook'),'icon_pre'=>'fab','icon'=>'fa-facebook'])
                                            @endcomponent
                                        </div>
                                        <div class="col-md-2">
                                            @component('components.input',['name'=>'linkedin','data'=>HELPER::set_if($page['linkedin']),'text'=>t('linkedin'),'icon_pre'=>'fab','icon'=>'fa-linkedin'])
                                            @endcomponent
                                        </div>
                                        <div class="col-md-2">
                                            @component('components.input',['name'=>'twitter','data'=>HELPER::set_if($page['twitter']),'text'=>t('twitter_link'),'placeholder'=>t('enter_twitter_link'),'icon_pre'=>'fab ','icon'=>'fa-twitter'])
                                            @endcomponent
                                        </div>
                                        <div class="col-md-2">
                                            @component('components.input',['name'=>'whatsapp','data'=>HELPER::set_if($page['whatsapp']),'text'=>t('whatsapp'),'icon_pre'=>'fab','icon'=>'fa-whatsapp'])
                                            @endcomponent
                                        </div>
                                        <div class="col-md-2">
                                            @component('components.input',['name'=>'instagram','data'=>HELPER::set_if($page['instagram']),'text'=>t('instagram'),'icon_pre'=>'fab','icon'=>'fa-instagram'])
                                            @endcomponent
                                        </div>
                                        <div class="col-md-2">
                                            @component('components.input',['name'=>'youtube','data'=>HELPER::set_if($page['youtube']),'text'=>t('snapchat'),'icon_pre'=>'fab','icon'=>'fa-snapchat'])
                                            @endcomponent
                                        </div>
                                        <div class="col-md-2">
                                            @component('components.input',['name'=>'instagram','data'=>HELPER::set_if($page['instagram']),'text'=>t('instagram'),'icon_pre'=>'fab','icon'=>'fa-instagram'])
                                            @endcomponent
                                        </div>
                                        <div class="w-100"></div>


                                        <div class="col-md-4">
                                            @component('components.input',['name'=>'copy_rights_ar','data'=>HELPER::set_if($page['copy_rights_ar']),'text'=>t('copy_rights_ar'),'icon_pre'=>'fas','icon'=>'fa-copyright'])
                                            @endcomponent
                                        </div>
                                        <div class="col-md-4">
                                            @component('components.input',['name'=>'copy_rights_en','data'=>HELPER::set_if($page['copy_rights_en']),'text'=>t('copy_rights_en'),'icon_pre'=>'fas','icon'=>'fa-copyright'])
                                            @endcomponent
                                        </div>

                                        <div class="col-md-4">
                                            @component('components.input',['name'=>'copy_rights_zh','data'=>HELPER::set_if($page['copy_rights_zh']),'text'=>t('copy_rights_zh'),'icon_pre'=>'fas','icon'=>'fa-copyright'])
                                            @endcomponent
                                        </div>

                                    </div>
                                    <div class="w-100"></div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            @component('components.input', ['name' => 'company_description_ar', 'data' => HELPER::set_if($page['company_description_ar']), 'text' => 'وصف الشركة (العربية)'])
                                            @endcomponent
                                        </div>
                                        <div class="col-md-4">
                                            @component('components.input', ['name' => 'company_description_en', 'data' => HELPER::set_if($page['company_description_en']), 'text' => 'Company Description (English)'])
                                            @endcomponent
                                        </div>
                                        <div class="col-md-4">
                                            @component('components.input', ['name' => 'company_description_zh', 'data' => HELPER::set_if($page['company_description_zh']), 'text' => '公司描述（中文）'])
                                            @endcomponent
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            @component('components.input', ['name' => 'shipping_description_ar', 'data' => HELPER::set_if($page['shipping_description_ar']), 'text' => 'وصف الشحن (العربية)'])
                                            @endcomponent
                                        </div>
                                        <div class="col-md-4">
                                            @component('components.input', ['name' => 'shipping_description_en', 'data' => HELPER::set_if($page['shipping_description_en']), 'text' => 'Shipping Description (English)'])
                                            @endcomponent
                                        </div>
                                        <div class="col-md-4">
                                            @component('components.input', ['name' => 'shipping_description_zh', 'data' => HELPER::set_if($page['shipping_description_zh']), 'text' => '运输描述（中文）'])
                                            @endcomponent
                                        </div>
                                    </div>

{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-4">--}}
{{--                                            @component('components.input', ['name' => 'learn_more_ar', 'data' => HELPER::set_if($page['learn_more_ar']), 'text' => 'تعرف على المزيد (العربية)'])--}}
{{--                                            @endcomponent--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-4">--}}
{{--                                            @component('components.input', ['name' => 'learn_more_en', 'data' => HELPER::set_if($page['learn_more_en']), 'text' => 'Learn More (English)'])--}}
{{--                                            @endcomponent--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-4">--}}
{{--                                            @component('components.input', ['name' => 'learn_more_zh', 'data' => HELPER::set_if($page['learn_more_zh']), 'text' => '了解更多（中文）'])--}}
{{--                                            @endcomponent--}}
{{--                                        </div>--}}
{{--                                    </div>--}}



                                    <div class="row">
                                        <div class="col-md-4">
                                            @component('components.area_editor',['name'=>'body_ar', 'data'=>HELPER::set_if($page['body_ar']),'text'=>'التفاصيل '])
                                            @endcomponent

                                        </div>
                                        <div class="col-md-4">
                                            @component('components.area_editor',['name'=>'body_en', 'data'=> HELPER::set_if($page['body_en']),'text'=>'details'])
                                            @endcomponent

                                        </div>

                                        <div class="col-md-4">
                                            @component('components.area_editor',['name'=>'body_zh', 'data'=> HELPER::set_if($page['body_zh']),'text'=>'details zh'])
                                            @endcomponent

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            @component('components.area_editor',['name'=>'footer_ar', 'data'=>HELPER::set_if($page['footer_ar']),'text'=>'العبارة في التذييل '])
                                            @endcomponent

                                        </div>
                                        <div class="col-md-4">
                                            @component('components.area_editor',['name'=>'footer_en', 'data'=> HELPER::set_if($page['footer_en']),'text'=>'Statment in footer'])
                                            @endcomponent

                                        </div>

                                        <div class="col-md-4">
                                            @component('components.area_editor',['name'=>'footer_zh', 'data'=> HELPER::set_if($page['footer_zh']),'text'=>'Statment in footer zh'])
                                            @endcomponent

                                        </div>

                                    </div>

                                   <div class="row">
                                       <div class="col-md-4">
                                           @component('components.area_editor',['name'=>'executive_content_ar', 'data'=>HELPER::set_if($page['executive_content_ar']),'text'=>'executive content ar'])
                                           @endcomponent

                                       </div>
                                       <div class="col-md-4">
                                           @component('components.area_editor',['name'=>'executive_content_en', 'data'=> HELPER::set_if($page['executive_content_en']),'text'=>'executive content en'])
                                           @endcomponent

                                       </div>

                                       <div class="col-md-4">
                                           @component('components.area_editor',['name'=>'executive_content_zh', 'data'=> HELPER::set_if($page['executive_content_zh']),'text'=>'executive content zh'])
                                           @endcomponent

                                       </div>
                                   </div>
                                    <div class="w-100"></div>

                                    <div class="form-group">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">{{ t('save_changes') }}</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            @csrf
                        </form>

                    </div>
                    <!--end::Portlet-->
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
