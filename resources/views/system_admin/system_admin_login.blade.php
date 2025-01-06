<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>    تسجيل الدخول</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Montserrat:300,400,500,600,700","Roboto:300,400,500,600,700","Cairo:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Web font -->

    <link href="{{asset('admin/assets/vendors/base/vendors.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/demo/demo3/base/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('admin/admin.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END THEME LAYOUT STYLES -->
    <link href="{{asset('admin/nice-select.css')}}" rel="stylesheet" type="text/css"/>


    <link rel="shortcut icon" type="image/png" href="{{asset('admin/imgs/logo.png')}}"/>
    <!--end::Global Theme Styles -->
    @yield('head')
</head>

<!-- end::Head -->

<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login">
        <div class="m-grid__item m-grid__item--fluid m-login__wrapper">
            <div class="m-login__container">
                <div class="m-login__logo">
                    <a href="#">
                        <img src="{{asset('admin/imgs/logo.png')}}">
                    </a>
                </div>
                <div class="m-login__signin">
                    <div class="m-login__head">
                        <h3 class="m-login__title">تسجيل الدخول (الإدارة)</h3>
                    </div>
                    <form class="m-login__form m-form" method="post" action="{{route('system_admin.login')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group m-form__group">

                            <input class="form-control m-input" type="text" placeholder="اسم المستخدم" name="email" autocomplete="off">
                            @show_error("email")
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="كلمة المرور" name="password"  autocomplete="off">
                        </div>

                        <div class="m-login__form-action">
                            <button class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">تسجيل الدخول</button>
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>
</div>


<script src="{{asset('admin/assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/demo/demo3/base/scripts.bundle.js')}}" type="text/javascript"></script>

@include('flash::message')

</body>



