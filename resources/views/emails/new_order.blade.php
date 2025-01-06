<table style="background-color:#fff;font-size: 15px;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

    <!-- START HEADER/BANNER -->

    <tbody>
    <tr>
        <td align="center">
            <table class="col-600" width="800" style="min-width: 600px;" border="0" align="center" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td align="center" valign="top" bgcolor="#0B1026"
                        style="background-size:cover; background-position:top;"
                        height="200">
                    <table class="col-600" width="800" height="250" border="0" align="center" cellpadding="0"
                           cellspacing="0">

                        <tbody>
                        <tr>
                            <td height="40"></td>
                        </tr>


                        <tr>
                            <td align="center" style="line-height: 0px;">
                                <a style="text-decoration: none;color:#C3A646;
                                            font-size: 50px;font-weight: bolder;"
                                   href="{{ config('app.url') }}">
                                   <img src="http://abaayah.com/admin/imgs/logo_abaya.png" width="150">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td align="center"
                                style="font-family: 'Raleway', sans-serif; font-size:37px; color:#ffffff; line-height:15px; font-weight: bold;">
                                طلب جديد
                            </td>
                        </tr>
                        <tr>
                            <td height="50"></td>
                        </tr>
                        </tbody>
                    </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <!-- END HEADER/BANNER -->


    <!-- START 3 BOX SHOWCASE -->

    <tr>
        <td align="center">
            <table class="col-600" width="800" border="0" align="center" cellpadding="0" cellspacing="0"
                   style="margin-left:20px; margin-right:20px; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
                <tbody>
                <tr>
                    <td height="35"></td>
                </tr>

                <tr>
                    <td align="center"
                        style="font-family: 'Raleway', sans-serif; font-size:22px; font-weight: bold; color:#2a3a4b;">تم اضافة طلب جديد على منتجاتك
                    </td>
                </tr>

                <tr>
                    <td height="10"></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td align="center">
            <table class="col-600" width="800" border="0" align="center" cellpadding="0" cellspacing="0"
                   style="margin-left:20px; margin-right:20px; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
                <tbody>
                <tr>
                    <td height="35"></td>
                </tr>

                <tr>
                    <td>
                        <table dir="rtl" style="border: 1px solid #dbd9d9;text-align: center;width: 100%;margin-left: auto;color: #000;">
                            <thead style="border: 1px solid #dbd9d9;">
                            <tr>
                                <th style="border: 1px solid #dbd9d9;" colspan="4">بيانات صاحب الطلب</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="border: 1px solid #dbd9d9;">الاسم</td>
                                <td style="border: 1px solid #dbd9d9;">{{ @$order->user->name }}</td>
                                <td style="border: 1px solid #dbd9d9;">تاريخ التقديم</td>
                                <td style="border: 1px solid #dbd9d9;">{{ @$order->created_at->toDateString() }}</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #dbd9d9;">طريقة الدفع</td>
                                <td style="border: 1px solid #dbd9d9;">{{ @$order->paymentType?$out->paymentType->name:'-' }}</td>
                                <td style="border: 1px solid #dbd9d9;">رقم الطلب</td>
                                <td style="border: 1px solid #dbd9d9;">{{@$order->order_number}} </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td height="10"></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    @if($order->address)
    <tr>
        <td align="center">
            <table class="col-600" width="800" border="0" align="center" cellpadding="0" cellspacing="0"
                   style="margin-left:20px; margin-right:20px; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
                <tbody>
                <tr>
                    <td height="35"></td>
                </tr>

                <tr>
                    <td>
                        <table dir="rtl" style="border: 1px solid #dbd9d9;text-align: center;width: 100%;margin-left: auto;color: #000;">
                            <thead style="border: 1px solid #dbd9d9;">
                            <tr>
                                <th style="border: 1px solid #dbd9d9;" colspan="4">عنوان التسليم</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="border: 1px solid #dbd9d9;">الدولة</td>
                                <td style="border: 1px solid #dbd9d9;">{{ @$order->address->country->name }}</td>
                                <td style="border: 1px solid #dbd9d9;">المدينة</td>
                                <td style="border: 1px solid #dbd9d9;">{{ @$order->address->gov->name }}</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #dbd9d9;">الحي</td>
                                <td style="border: 1px solid #dbd9d9;">{{ @$order->address->area->name }}</td>
                                <td style="border: 1px solid #dbd9d9;">الشارع</td>
                                <td style="border: 1px solid #dbd9d9;">{{@$order->address->street}} </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #dbd9d9;" colspan="2">ملاحظات</td>
                                <td style="border: 1px solid #dbd9d9;" colspan="2">{{@$order->address->full_address??'-'}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td height="10"></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    @endif

    @if($order->products()->count())
    <tr>
        <td align="center">
            <table class="col-600" width="800" border="0" align="center" cellpadding="0" cellspacing="0"
                   style="margin-left:20px; margin-right:20px; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
                <tbody>
                <tr>
                    <td height="35"></td>
                </tr>

                <tr>
                    <td>
                        <table dir="rtl" style="border: 1px solid #dbd9d9;text-align: center;width: 100%;margin-left: auto;color: #000;">
                            <thead style="border: 1px solid #dbd9d9;">
                            <tr>
                                <th style="border: 1px solid #dbd9d9;" colspan="6">المنتجات</th>
                            </tr>
                            <tr>
                                <th style="border: 1px solid #dbd9d9;">اسم المنتج</th>
                                <th style="border: 1px solid #dbd9d9;">نوع القماش</th>
                                <th style="border: 1px solid #dbd9d9;">المقاس</th>
                                <th style="border: 1px solid #dbd9d9;">الكمية</th>
                                <th style="border: 1px solid #dbd9d9;">السعر</th>
                                <th style="border: 1px solid #dbd9d9;">السعر في الطلب</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->products as $product)
                                <tr>
                                    <td style="border: 1px solid #dbd9d9;">{{$product->product->name}}</td>
                                    <td style="border: 1px solid #dbd9d9;">{{$product->product->textileType?$product->product->textileType->name:'-'}}</td>
                                    <td style="border: 1px solid #dbd9d9;">{{$product->size?$product->size->name:'-'}}</td>
                                    <td style="border: 1px solid #dbd9d9;">{{$product->qty}}</td>
                                    <td style="border: 1px solid #dbd9d9;">{{$product->item_price}} {{$order->storesCountry ? $order->storesCountry->currency :HELPER::set_if($config['currency_ar'])}}</td>
                                    <td style="border: 1px solid #dbd9d9;">{{$product->price}} {{$order->storesCountry ? $order->storesCountry->currency :HELPER::set_if($config['currency_ar'])}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td height="10"></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    @endif

    @if($order->size_orders()->count())
    <tr>
        <td align="center">
            <table class="col-600" width="800" border="0" align="center" cellpadding="0" cellspacing="0"
                   style="margin-left:20px; margin-right:20px; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
                <tbody>
                <tr>
                    <td height="35"></td>
                </tr>

                <tr>
                    <td>
                        <table dir="rtl" style="border: 1px solid #dbd9d9;text-align: center;width: 100%;margin-left: auto;color: #000;">
                            <thead style="border: 1px solid #dbd9d9;">
                            <tr>
                                <th style="border: 1px solid #dbd9d9;" colspan="5">المقاس الخاص</th>
                            </tr>
                            <tr>
                                <th style="border: 1px solid #dbd9d9;">اسم المنتج</th>
                                <th style="border: 1px solid #dbd9d9;">نوع القماش</th>
                                <th style="border: 1px solid #dbd9d9;">الطول</th>
                                <th style="border: 1px solid #dbd9d9;">عرض الاكتاف</th>
                                <th style="border: 1px solid #dbd9d9;">عرض الصدر</th>
                                <th style="border: 1px solid #dbd9d9;">طول الذراع</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->size_orders as $product)
                                <tr>
                                    <td style="border: 1px solid #dbd9d9;">{{$product->product->name}}</td>
                                    <td style="border: 1px solid #dbd9d9;">{{$product->textileType?$a->textileType->name:'-'}}</td>
                                    <td style="border: 1px solid #dbd9d9;">{{$product->length}} cm</td>
                                    <td style="border: 1px solid #dbd9d9;">{{$product->shoulder_width}} cm</td>
                                    <td style="border: 1px solid #dbd9d9;">{{$product->chest_width?$s->chest_width:$s->waist_width}} cm</td>
                                    <td style="border: 1px solid #dbd9d9;">{{$product->arm_length?$s->arm_length:$s->waist_width}} cm</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td height="10"></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    @endif
    <tr>
        <td align="center">
            <table class="col-600" width="800" border="0" align="center" cellpadding="0" cellspacing="0"
                   style="border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9; ">
                <tbody>
                <tr>
                    <td height="10"></td>
                </tr>
                <tr>
                    <td>


                        <table class="col-600" width="800" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tbody>
                            <tr>
                                <td height="30"></td>
                            </tr>
                            <tr>
                                <td>
                                    <table dir="rtl" style="border: 1px solid #dbd9d9;text-align: center;width: 100%;margin-left: auto;color: #000;">
                                        <tbody>
                                        @if($order->shippingCompany)
                                            <tr>
                                                <th style="border: 1px solid #dbd9d9;">شركة الشحن</th>
                                                <th style="border: 1px solid #dbd9d9;">{{$order->shippingCompany->name}}</th>
                                            </tr>
                                        @endif
                                        @if($order->products_price)
                                            <tr>
                                                <th style="border: 1px solid #dbd9d9;">مجموع سعر المنتجات</th>
                                                <th style="border: 1px solid #dbd9d9;">{{$order->products_price}} {{$order->storesCountry ? $order->storesCountry->currency :HELPER::set_if($config['currency_ar'])}}</th>
                                            </tr>
                                        @endif
                                        @if($order->tax_price)
                                            <tr>
                                                <th style="border: 1px solid #dbd9d9;">مبلغ الضريبة</th>
                                                <th style="border: 1px solid #dbd9d9;">{{$order->tax_price}} {{$order->storesCountry ? $order->storesCountry->currency :HELPER::set_if($config['currency_ar'])}}</th>
                                            </tr>
                                        @endif
                                        @if($order->coupon)
                                            <tr>
                                                <th style="border: 1px solid #dbd9d9;">كوبون الخصم({{$order->coupon->code}})</th>
                                                <th style="border: 1px solid #dbd9d9;">{{$order->discount_amount}} {{$order->storesCountry ? $order->storesCountry->currency :HELPER::set_if($config['currency_ar'])}}</th>
                                            </tr>
                                        @endif
                                        @if($order->delivery_price)
                                            <tr>
                                                <th style="border: 1px solid #dbd9d9;">مبلغ التوصيل</th>
                                                <th style="border: 1px solid #dbd9d9;">{{$order->delivery_price}} {{$order->storesCountry ? $order->storesCountry->currency :HELPER::set_if($config['currency_ar'])}}</th>
                                            </tr>
                                        @endif
                                        @if($order->admin_share)
                                            <tr>
                                                <th style="border: 1px solid #dbd9d9;">نسبة الادارة</th>
                                                <th style="border: 1px solid #dbd9d9;">{{$order->admin_share}} {{$order->storesCountry ? $order->storesCountry->currency :HELPER::set_if($config['currency_ar'])}}</th>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th style="border: 1px solid #dbd9d9;">المجموع الكلي</th>
                                            <th style="border: 1px solid #dbd9d9;">{{round($order->total_price,2)}} {{$order->storesCountry ? $order->storesCountry->currency :HELPER::set_if($config['currency_ar'])}}</th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>

                            </tr>
                            <tr>
                                <td height="30"></td>
                            </tr>
                            </tbody>
                        </table>

                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td height="5"></td>
    </tr>


    <tr>
        <td align="center">
            <table class="col-600" width="800" border="0" align="center" cellpadding="0" cellspacing="0"
                   style="margin-left:20px; margin-right:20px;">

                <tbody>

                <tr>
                    <td align="center">
                        <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0"
                               style=" border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
                            <tbody>
                            <tr>
                                <td height="50"></td>
                            </tr>
                            <tr>
                                <td align="center" bgcolor="0B1026"
                                    height="185">
                                    <table class="col-600" width="800" border="0" align="center" cellpadding="0"
                                           cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td height="25"></td>
                                        </tr>

                                        <tr>
                                            <td align="center"
                                                style="font-family: 'Raleway',  sans-serif; font-size:14px;  color:#fff;">
                                                <span>جميع الحقوق محفوظة.</span>
                                                <br>
                                                {{ config('app.name') }}© {{ date('Y') }}
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <!-- END FOOTER -->


    </tbody>
</table>