@extends('layouts.admin')
@section('hor_menu')
    {{ Menu::renderHorMenu(config('menu_header.vendors')) }}
@endsection
@section('head')

    <style>
        .details-header {
            background: #fff;

            box-shadow: 0 0 30px 0 rgba(82, 63, 105, .05);
        }

        .details-body {
            background: #fff;
            /*margin-top: 20px;*/
            box-shadow: 0 0 30px 0 rgba(82, 63, 105, .05);
            padding: 20px;
        }

        .details-header h1 {
            color: #114B5F;
            margin-bottom: 1rem;
        }

        .header_list {
            list-style: none;
            padding: 0;
            margin-bottom: 0;
        }

        .header_list li {
            display: inline-block;
            margin: 0 0 0 20px;
        }

        .right-part {
            padding: 10px !important;
        }

        .top-Bar {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #ddd;
        }

        .bottom-Bar {
            padding: 10px;
            border-right: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%;
        }

        .user {

            display: flex;
            align-items: center;
        }

        .user img {
            border-radius: 50%;
            border: 3px solid #ddd;
            width: 50px;
            height: 50px;
        }

        .img-cc {
            border-radius: 50%;
            border: 3px solid #ddd;
        }

        .user p {
            margin: 0 10px;
        }

        .side_list {
            list-style: none;
            padding: 0;
        }

        .side_list li {
            display: block;
            width: 100%;
        }

        .side_list li a.nav-link {
            background: #FBFBFB;
            color: #000000;
            display: block !important;
            width: 100%;
            padding: 12px 15px;
            margin: 8px 0;
            box-shadow: 0 0 2px 0 rgba(82, 63, 105, .05);
            border: 0;

        }

        .nav .nav-link.active, .nav .nav-link.active .nav-icon i, .nav .nav-link.active .nav-text, .nav .nav-link.active::after, .nav .nav-link:hover:not(.disabled), .nav .nav-link:hover:not(.disabled) .nav-icon i, .nav .nav-link:hover:not(.disabled) .nav-text, .nav .nav-link:hover:not(.disabled)::after, .nav .show > .nav-link, .nav .show > .nav-link .nav-icon i, .nav .show > .nav-link .nav-text, .nav .show > .nav-link::after {
            -webkit-transition: color .15s ease, background-color .15s ease, border-color .15s ease, -webkit-box-shadow .15s ease;
            transition: color .15s ease, background-color .15s ease, border-color .15s ease, box-shadow .15s ease;
            transition: color .15s ease, background-color .15s ease, border-color .15s ease, box-shadow .15s ease, -webkit-box-shadow .15s ease;
            color: #F5B733;
        }

        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            color: #F5B733;
            background-color: #FBFBFB;
            border: 0;
        }

        .nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
            border: 0;
        }

        .nav-tabs {
            border-bottom: 0;
        }

        .side_list li a i {
            float: left;
        }

        .side_list li a span {

            margin-right: 10px;
        }

        .data_item p {
            margin-bottom: 3px;
            width: 100%;
        }

        .data_item b {
            padding-right: 1rem;
            width: 100%;
        }

        .data_item {
            margin: 10px 0;
            border-right: 3px solid #ddd;
            padding-right: 15px;
            display: flex;
            flex-wrap: wrap;
            width: 100%;
        }

        .det-title {
            color: #114B5F;
            font-weight: 600;
            padding: 0px 10px 20px;
            border-bottom: 1px solid #EDF0F3;
            font-size: 1.4rem;

        }
    </style>
@endsection

@section('page_content')

    <div class="card">
        <div class="card-head"></div>
        <div class="card-body">
            <div class="m-content">
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="m-portlet m-portlet--full-height  ">
                            <div class="m-portlet__body">
                                <div class="m-card-profile">
                                    <div class="m-card-profile__title m--hide">
                                        بيانات البائع
                                    </div>
                                    <div class="m-card-profile__pic">
                                        <div class="m-card-profile__pic-wrapper">
                                            <img src="{{$out->image_thumbnail}}" style="height: 130px;width: 130px;" alt="" />
                                        </div>
                                    </div>
                                    <div class="m-card-profile__details" style="position: relative">
                                        <span title="@if($out->status == 1) {{'مفعل'}}@else {{'معطل'}} @endif" class="@if($out->status == 1) {{'badge-success'}}@else {{'badge-danger'}} @endif " style="padding: 5px;border-radius: 50%; display: inline-block;"></span>
                                        <p class="m-card-profile__name"><b>الاسم: </b>{{$out->title}}</p>
                                        <p class="m-card-profile__email m-link"><b>البريد الالكتروني: </b>{{$out->email}}</p>
                                        <p class="m-card-profile__email m-link"><b>الجوال: </b>{{$out->mobile}}</p>
                                        <p class="m-card-profile__email m-link"><b>المستخدم: </b><a href="{{route('system.users.details',$out->user->id)}}">{{$out->user->name}}</a></p>
                                        <p class="m-card-profile__email m-link"><b>نبذة: </b>{{$out->bio}}</p>
                                        <p class="m-card-profile__email m-link"><b>التصنيف: </b>{{$out->category->name}}</p>
                                        <p class="m-card-profile__email m-link"><b>سناب شات: </b>{{$out->snapchat??'---'}}</p>
                                        <p class="m-card-profile__email m-link"><b>انستجرام: </b>{{$out->Instagram??'---'}}</p>
                                        <p class="m-card-profile__email m-link"><b>فيسبوك: </b>{{$out->facebook??'---'}}</p>
                                        <p class="m-card-profile__email m-link"><b>تويتر: </b>{{$out->twitter??'---'}}</p>
                                        <p class="m-card-profile__email m-link"><b>التوصيل: </b>  @if($out->has_delivery==1)
                                                <span class="btn btn-success"> موجود </span>
                                            @else
                                                <span class="btn btn-danger">غير موجود </span>
                                            @endif</p>
                                         <br>
                                        <hr>
                                        <div class="profile-userbuttons">
                                            <button type="button" data-toggle="modal" data-target="#modalLoginForm"class="btn btn-circle btn-danger btn-md send_notify">ارسال اشعار</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="m-portlet__body-separator"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-tools">
                                    <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                                <i class="flaticon-cart m--hide"></i>
                                                منتجات البائع
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="m_user_profile_tab_1">
                                    <div class="container" style="margin-top: 20px">
                                        @if(isset($out->products) && count($out->products) > 0)
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr >


                                                        <th>#</th>

                                                        <th class="text-center">صورة المنتج</th>
                                                        <th class="text-center">اسم المنتج</th>
                                                        <th class="text-center">التصنيف</th>
                                                         <th class="text-center">المعجبين</th>
                                                        <th class="text-center">الحالة</th>
                                                        <th class="text-center">تاريخ الرفع</th>
                                                        <th class="text-center">عرض</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($out->products as $o)
                                                        <tr id="TR_{{$o->id}}">

                                                            <td class="LOOPIDS">{{$loop->iteration}}</td>

                                                            <td class="text-center">
                                                                <img src="{{$o->image_thumbnail  }}" class="img_table" alt="">


                                                            </td>
                                                            <td class="text-center">
                                                                <a href="{{route('system.products.details',$o->id)}}">
                                                                    {{$o->title}}
                                                                </a>
                                                            </td>
                                                            <td class="text-center"> {{@$o->sub_category->name}}</td>

                                                            <td class="text-center"> {{$o->favorite()->count()}} معجب</td>

                                                            <td class="text-center">
                                                                @if($o->status == 1)
                                                                    <span class="m--font-success"> مفعل </span>
                                                                @elseif($o->status == 2)
                                                                    <span class="m--font-danger"> معطل </span>
                                                                @elseif($o->status == 0)
                                                                    <span class="m--font-warning"> غير مؤكد </span>

                                                                @else
                                                                    <span class="m--font-warning"> متجر جديد </span>
                                                                @endif
                                                            </td>
                                                            <td class="text-center"> {{@$o->created_at->toDateString()}}</td>
                                                            <td class="text-center">

                                                                <ul class="list-inline">
                                                                    <li>
                                                                        <a href="{{route('system.products.details',$o->id)}}"
                                                                           class="btn m-btn--pill btn-sm m-btn--air btn-outline-dark m-btn m-btn--custom"
                                                                           data-skin="dark" data-tooltip="m-tooltip"
                                                                           data-placement="top" title="عرض البيانات"
                                                                        >
                                                                            <i class="fa fa-eye"></i> عرض </a>
                                                                    </li>

                                                                    {{--                                        @cando('edit','products')--}}
                                                                    {{--                                        <li>--}}
                                                                    {{--                                            <a href="{{route('system.products.edit',$o->id)}}"--}}
                                                                    {{--                                               class="btn m-btn--pill btn-sm m-btn--air btn-outline-info m-btn m-btn--custom"--}}
                                                                    {{--                                               data-skin="dark" data-tooltip="m-tooltip"--}}
                                                                    {{--                                               data-placement="top" title="تعديل البيانات"--}}
                                                                    {{--                                            >--}}
                                                                    {{--                                                <i class="fa fa-edit"></i> تعديل </a>--}}
                                                                    {{--                                        </li>--}}

                                                                    {{--                                        @endcando--}}
                                                                    {{--                                        @cando('delete','products')--}}
                                                                    {{--                                        @if($o->can_del)--}}
                                                                    {{--                                            <li>--}}
                                                                    {{--                                                <button type="button"--}}
                                                                    {{--                                                        data-id="<?= $o->id ?>"--}}
                                                                    {{--                                                        data-url="{{route('system.products.delete')}}"--}}
                                                                    {{--                                                        data-token="{{csrf_token()}}"--}}
                                                                    {{--                                                        data-skin="dark" data-tooltip="m-tooltip"--}}
                                                                    {{--                                                        data-placement="top" title="حذف"--}}
                                                                    {{--                                                        class="btn m-btn--pill btn-sm m-btn--air btn-outline-danger m-btn m-btn--custom btn-del">--}}
                                                                    {{--                                                    <i class="fa fa-trash "></i>--}}
                                                                    {{--                                                    حذف--}}
                                                                    {{--                                                </button>--}}


                                                                    {{--                                            </li>--}}
                                                                    {{--                                        @else--}}
                                                                    {{--                                            <li>--}}
                                                                    {{--                                                <button type="button"--}}
                                                                    {{--                                                        data-skin="dark" data-tooltip="m-tooltip"--}}
                                                                    {{--                                                        data-placement="top" title="لا يمكن الحذف"--}}
                                                                    {{--                                                        disabled--}}
                                                                    {{--                                                        class="btn m-btn--pill btn-sm m-btn--air btn-outline-danger m-btn m-btn--custom disabled">--}}
                                                                    {{--                                                    <i class="fa fa-trash "></i>--}}
                                                                    {{--                                                    حذف--}}
                                                                    {{--                                                </button>--}}


                                                                    {{--                                            </li>--}}

                                                                    {{--                                        @endif--}}
                                                                    {{--                                        @endcando--}}
                                                                </ul>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        @else
                                            <div class="note note-info">
                                                <h4 class="block">لا يوجد بيانات للعرض</h4>
                                            </div>
                                        @endif
                                    </div>


                                </div>
                                <div class="tab-pane " id="m_user_profile_tab_2">
                                    <div class="container" style="margin-top: 20px">

                                        @if(isset($out->notifies) && count($out->notifies) > 0)
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th class="text-center">العنوان</th>
                                                        <th class="text-center">النص</th>
                                                        <th class="text-center">الحالة</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($out->notifies()->orderBy('id','DESC')->get() as $a)

                                                        <tr id="TR_{{$a->id}}">
                                                            <td class="LOOPIDS order_old">{{$loop->iteration}}</td>

                                                            <td class="text-center">{{$a->title}}</td>
                                                            <td class="text-center">{{$a->message}}</td>
                                                            <td class="text-center">{{$a->is_seen == 1?'تمت المشاهدة':'جديد'}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            <div class="note note-info">
                                                <h4 class="block">لا يوجد بيانات للعرض</h4>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection


@section('custom_scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">ارسال اشعار لهذا البائع</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('system.notifications.send.global')}}">
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">عنوان الاشعار</label>
                            <input type="text" id="defaultForm-email" class="form-control validate title">
                        </div>

                        <div class="md-form mb-4">
                            <label data-error="wrong" data-success="right" for="defaultForm-pass">محتوى الاشعار</label>
                            <input type="text" id="defaultForm-pass" class="form-control validate message">
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button"  data-id="<?= $out->id ?>"
                                data-url="{{route('system.notifications.send.global')}}"
                                data-token="{{csrf_token()}}" class="btn btn-success send_notification">ارسال</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $("body").on('click','.send_notification',
                function () {
                    var desc=$(this).data('desc')?$(this).data('desc'):'';
                    var Id = $(this).data('id');
                    var url = $(this).data('url');
                    var token = $(this).data('token');
                    var title = $('.title').val();
                    var message = $('.message').val();
                    var thisF=$(this);
                    swal.fire(
                        {
                            title:"هل انت متأكد ؟",
                            text:"هل أنت متأكد من أنك ترييد ارسال اشعار لهذا البائع؟",
                            type:"warning",
                            showCancelButton:1,
                            confirmButtonText:"نعم , قم بالارسال !",
                            cancelButtonText:"لا, الغي العملية !",
                            reverseButtons:1
                        }).then(function(e){

                        if(e.value){

                            $.post(url,
                                {
                                    _token: token,
                                    id: Id,
                                    title:title,
                                    message:message,
                                    type:'vendors'
                                },
                                function (data, status) {
                                    if (data.done == 1) {
                                        swal.fire({
                                            title: 'تم الارسال بنجاح',
                                            text: 'تم الارسال بنجاح',
                                            type: 'success',
                                            timer: 2000,
                                            showConfirmButton: false
                                        }).then(
                                            function () {
                                                $('#modalLoginForm').modal('hide');
                                                window.location.reload();
                                            }
                                        )
                                    } else {

                                        swal.fire({
                                            title: 'حدث خطأ ما',
                                            text: 'تأكد من تعبئة كافه الحقول',
                                            type: 'error',
                                            timer: 4000,
                                            showConfirmButton: false
                                        })

                                    }
                                }).fail(function(data2,status) {
                                var data2=data2.responseJSON;
                                swal.fire({
                                    title: 'خطأ',
                                    text: data2.response_message,
                                    type: 'error',
                                    timer: 4000,
                                    showConfirmButton: false
                                })
                            });

                        }else{
                            e.dismiss&&swal.fire("تم الالغاء","لم يتم عمل اي تغيير","error");

                        }
                    });

                });
        });
    </script>
@endsection
