@extends('layouts.login')


@section('styles')
    <link href="{{asset('css/pages/login/classic/login-4.rtl.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')

    <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('{{asset('media/bg/bg-3.jpg')}}');">
            <div class="login-form text-center p-7 position-relative overflow-hidden">
                <!--begin::Login Header-->
                <div class="d-flex flex-center mb-15">
                    <a href="#">
                        <img src="{{asset('logos/logo.png')}}" class="max-h-75px" alt=""/>
                    </a>
                </div>
                <!--end::Login Header-->

                <!--begin::Login Sign in form-->
                <div class="login-signin">
                    <div class="mb-20">
                        <h3>{{t('login')}}</h3>
                        <div class="text-muted font-weight-bold">{{t('enter data')}}</div>
                    </div>
                        <form class="m-login__form m-form" id="kt_login_signin_form" method="post" action="{{route('system_admin.login')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text" style="text-align: center" placeholder="{{t('Email')}}" name="email" autocomplete="off" />
                            @show_error("email")
                        </div>
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="password" style="text-align: center" placeholder="{{t('Password')}}" name="password" />
                        </div>

                        <button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">
                            {{t('login')}}</button>
                    </form>
                </div>
                <!--end::Login Sign in form-->

            </div>
        </div>
    </div>


@endsection
