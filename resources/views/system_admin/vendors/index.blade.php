@extends('layouts.admin')
@section('hor_menu')
    {{ Menu::renderHorMenu(config('menu_header.vendors')) }}
@endsection
@section('page_content')
    @component('components.ShowCard',[
    'Disname'=>'البائعون',
    'Disinfo'=>'ادارة البائعون',
    'module'=>'vendors',
    'actions'=>[
       [
           'route'=>'system.vendors.delete',
           'icon'=>config('layout.icons.delete_icon'),
           'text'=>'حذف',
           'role'=>"delete",
       ],
       [
           'route'=>'system.vendors.activate',
           'icon'=>config('layout.icons.activate_icon'),
           'text'=>'تفعيل',
           'role'=>"activate",
       ],
       [
           'route'=>'system.vendors.deactivate',
           'icon'=>config('layout.icons.deactivate_icon'),
           'text'=>'تعطيل',
           'role'=>"activate",
       ],
    ]
    ])

        <div class="row" style="margin-bottom: 1.22rem;margin-top: -.88rem;">
            <div class="col">
                <form class="form-inline" style="float: right">
                    <div class="form-group m-form__group">
                        <div class="input-group">
                            <select name="status"class="autoSubmit" id="" >
                                <option {{  is_null(request('status')) || request('status') == -1 ?'selected':'selected'}}  value="-1">بحث حسب الحالة</option>
                                <option {{  !is_null(request('status')) && request('status') == 1?'selected':''}} value="1">مفعل</option>
                                <option {{  !is_null(request('status')) && request('status') == 0?'selected':''}} value="0">معطل</option>
                            </select>
                        </div>

                        <div class="input-group" >
                            <input type="text" name="mobile" class="form-control m-input m-input--pill" placeholder="بحسب الجوال" value="{{ request('mobile') }}">
                            <input type="text" name="email" class="form-control m-input m-input--pill" placeholder="بحسب الايميل" value="{{ request('email') }}">
                            <input type="text" name="name" class="form-control m-input m-input--pill" placeholder="بحسب الاسم" value="{{ request('name') }}">
                            <div class="input-group-append">
                                <button class=" btn m-btn--pill btn-outline-info m-btn" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>


        </div>
        @if(isset($out) && count($out) > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr >


                        <th>#</th>
                        <th width="5%" style="text-align: center;vertical-align: middle;">
                            <label class="m-checkbox m-checkbox--solid m-checkbox--success m-size-table">
                                <input type="checkbox" id="SelectAll">
                                <span></span>
                            </label>

                        </th>
                        <th class="text-center">الإسم</th>
                        <th class="text-center">بيانات التواصل</th>
                        <th class="text-center">التصنيف</th>
                        <th class="text-center">الحالة</th>
                        <th class="text-center">التوصيل</th>
                        <th class="text-center">عدد المنتجات</th>
                        <th class="text-center">تاريخ التسجيل</th>
                        <th class="text-center">الإعدادات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($out as $o)
                        <tr id="TR_{{$o->id}}">

                            <td class="LOOPIDS">{{ ($out->currentpage()-1) * $out ->perpage() + $loop->index + 1 }}</td>
                            <td style="text-align: center;vertical-align: middle;">
                                <label class="m-checkbox m-checkbox--solid m-checkbox--success m-size-table">
                                    <input type="checkbox" value="<?= $o->id ?>" name="Item[]" class="CheckedItem" id="che_{{$o->id}}">
                                    <span></span>
                                </label>
                            </td>
                            <td class="text-center"><a href="{{route('system.vendors.details',$o->id)}}">{{str_limit($o->title, 30)}}</a></td>
                            <td class="text-center">
                            <p><b>الايميل : </b>{{$o->email}}</p>
                            <p><b>الجوال : </b>{{$o->mobile}}</p>
                            </td>
                            <td class="text-center">
                            <p>{{@$o->category->name}}</p>
                            </td>

                            <td class="text-center">
                                @if($o->status == 1)
                                    <span class="m--font-success"> مفعل </span>
                                @elseif($o->status == 0)
                                    <span class="m--font-danger"> غير مفعل </span>
                                @endif
                            </td>

                            <td class="text-center">
                            @if($o->has_delivery==1)
                                <span class="btn btn-success"> موجود </span>
                            @else
                                    <span class="btn btn-danger">غير موجود </span>
                            @endif
                            </td>

                            <td class="text-center">
                                <a href="{{route('system.vendors.details',$o->id)}}">
                             {{$o->products->count()}}
                                </a>
                            </td>
                            <td class="text-center"> {{$o->created_at->format('d-m-Y')}}</td>
                            <td class="text-center">

                                <ul class="list-inline">

                                    @cando('delete','vendors')

                                    <li>
                                        <?php if ($o->can_del) { ?>
                                        <button class="{{config('layout.classes.delete')}} btn-del"
                                                data-id="<?= $o->id ?>"
                                                data-toggle="tooltip" data-theme="dark"
                                                data-url="{{route('system.vendors.delete')}}"
                                                data-token="{{csrf_token()}}"
                                                title="حذف"><i class="fa fa-trash"> </i>حذف
                                        </button>
                                        <?php }else{ ?>
                                        <div style="display: inline-block;" data-skin="dark" data-tooltip="m-tooltip" data-placement="top"
                                             title="لا يمكن حذف البائع لوجود منتجات تابعة له">
                                            <a class="{{config('layout.classes.delete')}}"
                                               style="pointer-events: none;cursor: default;opacity: 0.7;color: #f4516c;"
                                               data-skin="dark" data-tooltip="m-tooltip" data-placement="top"
                                               title=" ">
                                                <i class="fa fa-trash"></i>حذف
                                            </a>
                                        </div>

                                        <?php } ?>


                                    </li>
                                    @endcando
                                </ul>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {!! $out->links() !!}
        @else
            <div class="note note-info">
                <h4 class="block">لا يوجد بيانات للعرض</h4>
            </div>
        @endif


    @endcomponent




@endsection
