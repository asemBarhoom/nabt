<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#fff" color="#000">

    <!-- START HEADER/BANNER -->

    <tbody>
    <!-- START 3 BOX SHOWCASE -->


    <tr style="">
        <td align="center" >
            <table class="col-600" width="600" style="min-width: 600px;" border="0" align="center" cellpadding="0" cellspacing="0"
            >
                <tr style="background:#0B1026;">
                    <td align="center" style="line-height: 0px;padding:15px;">
                        <a href="{{ config('app.url') }}"><img src="http://abaayah.com/admin/imgs/logo_abaya.png" width="120">
                        </a>
                    </td>

                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="20"></td>
    </tr>
    <tr>
        <td align="center">
            <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0"
                   style="margin-left:20px; margin-right:20px;">
                <tbody>
                <tr>
                    <td height="15"></td>
                </tr>

                <tr style="">
                    <td align="right"
                        style="font-family: 'Raleway', sans-serif; font-size:22px; font-weight: bold;">أهلا بك في تطبيق عباية
                    </td>
                </tr>
                <tr style="">
                    <td align="right"
                        style="font-family: 'Raleway', sans-serif; font-size:22px; font-weight: bold;">قامت ادارة تطبيق عباية باضافتك للنظام
                    </td>
                </tr>
                <tr>
                    <td height="10"></td>
                </tr>
                <tr>
                    <td align="right"
                        style="font-family: 'Raleway', sans-serif; font-size:14px;">
                        <table dir="rtl" style="text-align: right;width: 100%;margin-left: auto;color: #2a3a4b;">

                            <tbody>

                            <tr>
                                <td style="text-align: right;width:5%;min-width: 40px;">مرحبا</td>
                                <td colspan="3" style="text-align: right;">{{$store->name}},</td>
                            </tr>
                            </tbody>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td height="10"></td>
                </tr>
                <tr>
                    <td align="right"
                        style="font-family: 'Raleway', sans-serif; font-size:14px;">هذه هي بيانات الدخول
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
            <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0"
                   style="">
                <tbody>
                <tr>
                    <td height="10"></td>
                </tr>
                <tr>
                    <td>


                        <table class="col-600" width="600" border="0" align="right" cellpadding="0" cellspacing="0">
                            <tbody>

                            <tr>
                                <table dir="rtl" style="text-align: right;width: 100%;margin-left: auto;color: #2a3a4b;">

                                    <tbody>

                                    <tr>
                                        <td style="text-align: right;width:20%;min-width: 70px;">البريد الالكتروني:</td>
                                        <td colspan="3" style="text-align: right;">{{$store->email}}</td>
                                    </tr>
                                    <tr>
                                        <td  style="text-align: right;min-width: 70px;">كلمة السر:</td>
                                        <td colspan="3" style="text-align: right;">{{$password}}</td>
                                    </tr>
                                    <tr>
                                        <td height="15"></td>
                                    </tr>
                                    <tr>
                                        <td colspan=4  style="text-align: right;">يمكنك استخدام البيانات المرفقة في الأعلى للدخول الى حسابك عبر الرابط التالي</td>
                                    </tr>
                                    <tr>
                                        <td colspan=4  style="text-align: right;"><a href="{{route('store.showLogin')}}">انقر هنا لتسجيل الدخول</a></td>
                                    </tr>
                                    <tr>
                                        <td height="15"></td>
                                    </tr>
                                    <tr>
                                        <td colspan=4  style="text-align: right;">شكرا,</td>
                                    </tr>
                                    <tr>
                                        <td colspan=4  style="text-align: right;">تطبيق عباية</td>
                                    </tr>
                                    </tbody>
                                </table>


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
        <td height="20"></td>
    </tr>
    <tr style="">
        <td align="center" >
            <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0"
            >
                <tr style="background:#0B1026;">
                    <td align="center"
                        style="font-family: 'Raleway',  sans-serif; font-size:14px;  color:#fff;">
                        <span>جميع الحقوق محفوظة.</span>
                        <br>
                        {{ config('app.name') }}© {{ date('Y') }}
                    </td>

                </tr>
            </table>
        </td>
    </tr>
    </tbody>
</table>
