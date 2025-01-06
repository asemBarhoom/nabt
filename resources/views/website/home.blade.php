@extends('website._layout')

@section('title', 'الرئيسية')

@section('page_content')


    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top" dir="rtl">
        <div class="container d-flex" style="padding:0px 50px;">

            <nav class="nav-menu d-none d-lg-block" >
                <ul dir="rtl" style="list-style-type:arabic-indic ;direction:RTL; text-align: right">
                    <li class="active"><a href="#header">الرئيسية</a></li>
                    <li><a href="#features">حول  التطبيق</a></li>
                    <li><a href="#gallery">صور التطبيق</a></li>
                    <li><a href="#download">حمّل التطبيق</a></li>
                    <li><a href="#contact">تواصل معنا</a></li>
                </ul>
            </nav><!-- .nav-menu -->
            <div class="get-started-cont"  style="position:absolute;left: 100px;margin-top: 4px;">
                <a class="get-started" href="{{route('store.login')}}" >تسجيل دخول</a>
                <a class="get-started" href="#JoinUs" >انشاء حساب</a>
            </div>

        </div>
    </header><!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex">

        <div class="container">
            <div class="row">
                <div class="col-lg-4 d-lg-flex flex-lg-column pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" >
                    <div class="hero-cont" style="text-align: center;height: 100%;">
                        <img src="{{asset('website/assets/img/iphone.png')}}" class="img-fluid hero-logo" style="max-width:90%;margin-top:20%" alt="">
                        <div >
                            <a href="{{$android}}" class="download-btn">

                                <div style="width: 20%;display: inline-block;">
                                    <img src="{{asset('website/assets/img/Google_Play.png')}}" style="width: 20px;">
                                </div>
                                <div style="width: 70%;display: inline-block;">
                                    <span style="display: block;font-size: 18px; font-family: 'Tajawal', sans-serif;">Play Store</span>
                                </div>

                            </a>
                            <a href="{{$ios}}" class="download-btn">

                                <div style="width: 20%;display: inline-block;">
                                    <img src="{{asset('website/assets/img/Apple.png')}}" style="width: 20px;">
                                </div>
                                <div style="width: 70%;display: inline-block;">
                                    <span style="display: block;font-size: 18px; font-family: 'Tajawal', sans-serif;">App Store</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img" data-aos="fade-up">
                    <div id="header_img">
                        <img  src="{{asset('website/assets/img/logo_abaya.png')}}" class="img-fluid hero-loge-img" alt="" style="width: 25%;margin-left: 22%;margin-top:10%;">
                        <img  src="{{asset('website/assets/img/abaya.png')}}" class="img-fluid hero-abaya-image" alt="" style="width:35%;margin-left: 10%;margin-top: 10%;">
                    </div>

                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= App Features Section ======= -->
        <section id="features" class="features" style="margin-top: 5%;">
            <div class="container">

                <div class="section-title">
                    <h2 style="max-width:270px;margin:auto;width:fit-content;color:#9195A4;font-size: 16px;padding-bottom: 15px">
                        حول التطبيق
                    </h2>
                    <h2 style="margin:auto;width:fit-content;color:#24355A;padding-bottom: 15px">
                        العديد من المزايا الرائعة في تطبيق عباية
                    </h2>
                </div>

                <div class="row no-gutters">
                    <div class="col-xl-12 align-items-stretch order-2 order-lg-1" style="margin: auto;">
                        <div class="content d-flex flex-column">
                            <div class="row">
                                <div class="col-md-4 feature-cont" style="text-align: center;padding: 15px;height: 300px;">
                                    <div style="margin:auto;margin-bottom:40px;width:100px;height:100px;padding:8%;text-align: center;border-radius: 10px;background-color: #fff;box-shadow: 0px 0px 30px rgba(169, 179, 203, 0.25);">
                                        <img src="{{asset('website/assets/img/3.png')}}" style="width:40px;">
                                    </div>
                                    <h4 style="padding-bottom:10px; ">العديد من طرق الدفع</h4>
                                    <p style="padding:10px;font-size:14px;color: #9195A4;text-align:justify;text-align-last: center;">يمكنك كمستخدم الدفع من خلال التطبيق بكل سهولة , وكأدمن يمكنك سحب رصيدك بسهولة أيضاً</p>
                                </div>
                                <div class="col-md-4 feature-cont" style="text-align: center;padding: 15px;height: 300px;">
                                    <div style="margin:auto;margin-bottom:40px;width:100px;height:100px;padding:8%;text-align: center;border-radius: 10px;background-color: #fff;box-shadow: 0px 0px 30px rgba(169, 179, 203, 0.25);">
                                        <img src="{{asset('website/assets/img/2.png')}}"  style="width:40px;">
                                    </div>
                                    <h4 style="padding-bottom:10px; ">العديد من تصنيفات العبايات</h4>
                                    <p style="padding:10px;font-size:14px;color: #9195A4;text-align:justify;text-align-last: center;">وجود العديد من التصنيفات الفاخرة والمميزة من العبايات العربية الخليجية. لا تترددي بطلبها
                                        الان عبر تطبيق عباية</p>
                                </div>
                                <div class="col-md-4 feature-cont" style="text-align: center;padding: 15px;height: 300px;">
                                    <div style="margin:auto;margin-bottom:40px;width:100px;height:100px;padding:8%;text-align: center;border-radius: 10px;background-color: #fff;box-shadow: 0px 0px 30px rgba(169, 179, 203, 0.25);">
                                        <img src="{{asset('website/assets/img/1.png')}}"  style="width:40px;">
                                    </div>
                                    <h4 style="padding-bottom:10px; ">سهولة استخدام التطبيق</h4>
                                    <p style="padding:10px;font-size:14px;color: #9195A4;text-align:justify;text-align-last: center;">يمكنك طلب عبايتك الخاصة بكل سهولة مع إمكانية تخصيص المقاسات مع إمكانية التوصيل لجميع مناطق المملكة العربية السعودية</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 feature-cont" style="text-align: center;padding: 15px;height: 300px;">
                                    <div style="margin:auto;margin-bottom:40px;width:100px;height:100px;padding:8%;text-align: center;border-radius: 10px;background-color: #fff;box-shadow: 0px 0px 30px rgba(169, 179, 203, 0.25);">
                                        <img src="{{asset('website/assets/img/6.png')}}" style="width:25px;">
                                    </div>
                                    <h4 style="padding-bottom:10px; ">استعراض احدث المنتجات بسهولة</h4>
                                    <p style="padding:10px;font-size:14px;color: #9195A4;text-align:justify;text-align-last: center;">تابع واستعرض احدث المنتجات سواء من المتاجر او المصممات الحرةً</p>
                                </div>
                                <div class="col-md-4 feature-cont" style="text-align: center;padding: 15px;height: 300px;">
                                    <div style="margin:auto;margin-bottom:40px;width:100px;height:100px;padding:8%;text-align: center;border-radius: 10px;background-color: #fff;box-shadow: 0px 0px 30px rgba(169, 179, 203, 0.25);">
                                        <img src="{{asset('website/assets/img/5.png')}}"  style="width:40px;">
                                    </div>
                                    <h4 style="padding-bottom:10px; ">امكانية الاشتراك كمصمة حرة</h4>
                                    <p style="padding:10px;font-size:14px;color: #9195A4;text-align:justify;text-align-last: center;">تطبيق عباية يتيح لك انشاء حساب مصممة وعرض تصاميمك ومنتجاتك للبيع </p>
                                </div>
                                <div class="col-md-4 feature-cont" style="text-align: center;padding: 15px;height: 300px;">
                                    <div style="margin:auto;margin-bottom:40px;width:100px;height:100px;padding:8%;text-align: center;border-radius: 10px;background-color: #fff;box-shadow: 0px 0px 30px rgba(169, 179, 203, 0.25);">
                                        <img src="{{asset('website/assets/img/4.png')}}"  style="width:40px;">
                                    </div>
                                    <h4 style="padding-bottom:10px; ">إمكانية الاشتراك كمتجر</h4>
                                    <p style="padding:10px;font-size:14px;color: #9195A4;text-align:justify;text-align-last: center;">يمكن الاشتراك بحساب متجر وعرض  المنتجات للبيع من خلال تطبيق عباية</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section><!-- End App Features Section -->

        <!-- ======= Join us Section ======= -->
        <section id="JoinUs" class="JoinUs" style="margin-top: 5%;">
            <div class="container">

                <div class="section-title">

                    <h2 style="font-weight:bold;margin:auto;width:fit-content;color:#201E28;padding-bottom: 15px">
                        الأشتراك في تطبيق عباية
                    </h2>
                    <h2 style="max-width:370px;margin:auto;width:fit-content;color:#9195A4;font-size: 14px;padding-bottom: 15px">
                        للأشتراك في تطبيق عباية الرجاء التأكد من صحة البيانات
                    </h2>
                </div>

                <div class="row no-gutters">
                    <div class="col-xl-12 align-items-stretch order-2 order-lg-1" style="margin: auto;">
                        <div class="content d-flex flex-column">
                            <div class="row" style="padding:15px;border-radius: 10px;background-color: #fff;box-shadow: 0px 0px 30px rgba(169, 179, 203, 0.25);">
                                <div class="col-md-5 join-img-cont" style="text-align: center;padding: 25px">
                                    <img src="{{asset('website/assets/img/join_background.png')}}" >

                                    <p style="padding:10px;font-size:14px;color: #9195A4;text-align:justify;text-align-last: center;">سيتم تفعيل التسجيل من قبل الإدارة وارسال معلومات الحساب
                                        إلى البريد الالكتروني</p>
                                </div>
                                <div class="col-md-6 join-forms-cont" style="text-align: center;padding: 15px;">
                                    <ul class="nav nav-pills" style="direction: rtl;border:none;padding-right:0px;">
                                        <li class="tab-head"><a data-toggle="tab" class="{{$errors->has('designer_name')||$errors->has('designer_mobile')||$errors->has('designer_email')?'':'active'}}" href="#StoreJoin">تسجيل كمتجر</a></li>
{{--                                        <li  class="tab-head"><a data-toggle="tab" class="{{$errors->has('designer_name')||$errors->has('designer_mobile')||$errors->has('designer_email')?'active':''}}" href="#DesignerJoin">تسجيل كمصممة</a></li>--}}
                                    </ul>

                                    <div class="tab-content" style="padding:15px;padding-top: 35px;">
                                        <div id="StoreJoin" class="tab-pane {{$errors->has('designer_name')||$errors->has('designer_mobile')||$errors->has('designer_email')?'':'active'}}">
                                            <form action="{{route('store.signup')}}" method="post">
                                                @csrf
                                                <div>
                                                    <input class="form-input" required type="text" name="store_name" id="store_name" value="{{old('store_name')}}" placeholder="الاسم">
                                                    <span class="input-span">
                                                     @show_error('store_name')
                                                     </span>
                                                </div>
                                                <div>
                                                    <input  class="form-input" required type="number" name="store_mobile" id="store_mobile" value="{{old('store_mobile')}}" placeholder="رقم الموبايل">
                                                    <span class="input-span">
                                                     @show_error('store_mobile')
                                                     </span>
                                                </div>
                                                <div>
                                                    <input  class="form-input" required type="email" name="store_email" id="store_email" value="{{old('store_email')}}" placeholder="البريد الالكتروني">
                                                    <span class="input-span">
                                                     @show_error('store_email')
                                                     </span>
                                                </div>
                                                <div>
                                                    <input  class="form-input" required type="text" name="store_address" id="store_address" value="{{old('store_address')}}" placeholder="العنوان">
                                                    <span class="input-span">
                                                     @show_error('store_address')
                                                     </span>
                                                </div>

                                                <div>
                                                     <select name="gov_id"  class="form-input"  required>
                                                         <option value="" selected disabled>اختر المنطقة</option>

                                                     @foreach($govs as $ket=>$gov)
                                                             <option value="{{$gov->id}}" {{old('gov_id')==$gov->id?'selected':''}}>{{$gov->name_ar}}</option>
                                                         @endforeach
                                                     </select>
                                                    <span class="input-span">
                                                     @show_error('gov_id')
                                                     </span>
                                                </div>

                                                <div>
                                                    <select name="area_id"  class="form-input"  required>
                                                        <option value="" selected disabled>اختر المدينة</option>

                                                        @foreach($areas as $ket=>$area)
                                                            <option value="{{$area->id}}" {{old('area_id')==$area->id?'selected':''}}>{{$area->name_ar}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="input-span">
                                                     @show_error('area_id')
                                                     </span>
                                                </div>




                                                <div>
                                                    <input class="form-input" required type="password" name="store_password" id="store_password" value="" placeholder="كلمة المرور">
                                                    <span class="input-span">
                                                     @show_error('store_password')
                                                     </span>
                                                </div>

                                                <div>
                                                    <input class="form-input" required type="password" name="store_password_confirmation" id="store_password_confirmation" value="" placeholder="تأكيد كلمة المرور">
                                                    <span class="input-span">
                                                    @show_error('store_password_confirmation')
                                                     </span>
                                                </div>
                                                <input class="form-submit" type="submit" value="الاشتراك الآن">
                                            </form>
                                        </div>
{{--
                                        <div id="DesignerJoin" class="tab-pane {{$errors->has('designer_name')||$errors->has('designer_mobile')||$errors->has('designer_email')?'active':''}}">
                                            <form action="{{route('designer.signup')}}" method="post">
                                                @csrf
                                                <div>
                                                    <input class="form-input" required type="text" name="designer_name" id="designer_name" value="{{old('designer_name')}}" placeholder="الاسم">
                                                    <span class="input-span">
                                                     @show_error('designer_name')
                                                     </span>
                                                </div>
                                                <div>
                                                    <input  class="form-input" required type="number" name="designer_mobile" id="designer_mobile" value="{{old('designer_mobile')}}" placeholder="رقم الموبايل">
                                                    <span class="input-span">
                                                     @show_error('designer_mobile')
                                                     </span>
                                                </div>
                                                <div>
                                                    <input  class="form-input" required type="email" name="designer_email" id="designer_email" value="{{old('designer_email')}}" placeholder="البريد الالكتروني">
                                                    <span class="input-span">
                                                     @show_error('designer_email')
                                                     </span>
                                                </div>
                                                <div>
                                                    <input  class="form-input" required type="number" name="number_of_products" id="number_of_products" value="{{old('number_of_products')}}" placeholder="عدد المنتجات المتاحة للبيع">
                                                    <span class="input-span">
                                                     @show_error('number_of_products')
                                                     </span>
                                                </div>
                                                <input class="form-submit" type="submit" value="الاشتراك الآن">
                                            </form>
                                        </div>

--}}
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section><!-- End Join Section -->

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery" style="margin-top: 20px;">
            <div class="container">
                <div class="section-title">
                    <h2 style="font-weight:bold;margin:auto;width:fit-content;color:#201E28;padding-bottom: 15px">
                       صور التطبيق
                    </h2>
                </div>
                <div class="owl-carousel gallery-carousel" data-aos="fade-up">
                    <a href="{{asset('website/assets/img/gallery/1.png')}}" class="venobox" data-gall="gallery-carousel"><img src="{{asset('website/assets/img/gallery/1.png')}}" style="width:90%;" alt=""></a>
                    <a href="{{asset('website/assets/img/gallery/2.png')}}" class="venobox" data-gall="gallery-carousel"><img src="{{asset('website/assets/img/gallery/2.png')}}" style="width:90%;" alt=""></a>
                    <a href="{{asset('website/assets/img/gallery/3.png')}}" class="venobox" data-gall="gallery-carousel"><img src="{{asset('website/assets/img/gallery/3.png')}}" style="width:90%;" alt=""></a>
                    <a href="{{asset('website/assets/img/gallery/4.png')}}" class="venobox" data-gall="gallery-carousel"><img src="{{asset('website/assets/img/gallery/4.png')}}" style="width:90%;" alt=""></a>
                    <a href="{{asset('website/assets/img/gallery/5.png')}}" class="venobox" data-gall="gallery-carousel"><img src="{{asset('website/assets/img/gallery/5.png')}}" style="width:90%;" alt=""></a>
                </div>


            </div>
        </section><!-- End Gallery Section -->
        <!-- ======= Download Section ======= -->
        <section id="download" class="download" style="background-color: #F6F6F6;height:320px;">
            <div class="container">
                <div class="row justify-content-center" >
                    <div class="col-md-5 join-img-cont" style="text-align: center;padding: 25px">
                        <img src="{{asset('website/assets/img/download_background.png')}}" style="width: 30%">
                    </div>
                    <div class="col-md-6 join-img-cont" style="text-align: center;padding: 25px">
                      <div style="margin-top: 10%;">
                          <h2 style="color:#152C3A;margin-bottom: 40px;font-weight: bold;vertical-align: middle;">حمل تطبيق عباية الآن</h2>
                          <div>
                              <a href="{{$android}}" class="download-btn">

                                  <div style="width: 20%;display: inline-block;">
                                      <img src="{{asset('website/assets/img/Google_Play.png')}}" style="width: 20px;">
                                  </div>
                                  <div style="width: 70%;display: inline-block;">
                                      <span style="display: block;font-size: 18px; font-family: 'Tajawal', sans-serif;">Play Store</span>
                                  </div>

                              </a>
                              <a href="{{$ios}}" class="download-btn">

                                  <div style="width: 20%;display: inline-block;">
                                      <img src="{{asset('website/assets/img/Apple.png')}}" style="width: 20px;">
                                  </div>
                                  <div style="width: 70%;display: inline-block;">
                                      <span style="display: block;font-size: 18px; font-family: 'Tajawal', sans-serif;">App Store</span>
                                  </div>
                              </a>
                          </div>
                      </div>

                    </div>
                </div>

            </div>
        </section><!-- End Download Section -->
        <!-- ======= contact Section ======= -->
        <section id="contact" class="contact" style="margin-top: 1%;">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-xl-12" style="margin-bottom:20px; ">
                        <h2 style="border-bottom:2px solid #C9923D;float:right;font-weight:bold;margin:auto;width:fit-content;color:#201E28;padding-bottom: 15px">
                            ابقى على تواصل
                        </h2>
                    </div>
                    <div class="col-xl-12 align-items-stretch order-2 order-lg-1" style="margin: auto;">
                        <div class="content d-flex flex-column">
                            <div class="row" style="direction: rtl">
                                <div class="col-md-3 contact-cont" style="text-align: right;">
                                     <h5>نسعد بتواصلك المباشر  معنا</h5>
                                     <h5 style="margin-bottom: 15px;">من خلال البينات التالية:</h5>
                                     <p style="color: #B8B8B8;">السعودية ، الرياض</p>
                                     <p style="color: #B8B8B8;">{{$whatsapp}}</p>
                                     <p style="color: #B8B8B8;">{{$email}}</p>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <h5>لا تتردد في التواصل</h5>
                                    <form action="{{route('website.do.contact')}}" method="post">
                                        @csrf
                                        <div  class="form-input-contact half">
                                            <input  required type="text" name="name" id="contact_name" value="{{old('name')}}" placeholder="الاسم">
                                            <span class="input-span">
                                                 @show_error('name')
                                            </span>

                                        </div>
                                        <div class="form-input-contact half" >
                                            <input  required type="email" name="email" id="contact_email" value="{{old('email')}}" placeholder="البريد الالكتروني">
                                            <span class="input-span">
                                            @show_error('email')
                                                </span>
                                        </div>
                                        <div class="col-md-12 form-input-contact">
                                            <input   required type="text" name="message" id="contact_message" value="{{old('message')}}" placeholder="الرسالة">
                                            <span class="input-span">
                                            @show_error('message')
                                                 </span>
                                        </div>




                                        <button class="form-submit-contact" type="submit">
                                            <i class="fa fa-envelope"></i>
                                            ارسال
                                        </button>
                                    </form>
                                </div>
                                <div class="col-md-3 contact-link-cont" style="text-align: right;padding: 20px;">
                                    <a class="contact-link" href="{{$twitter}}"><i class="fa fa-twitter"></i></a>
                                    <a class="contact-link" href="{{$facebook}}"><i class="fa fa-facebook"></i></a>
                                    <a class="contact-link" href="https://wa.me/{{$whatsapp}}"><i class="fa fa-whatsapp"></i></a>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section><!-- End contact Section -->
        <section id="footer" class="" style="height:70px;color:#fff;background:linear-gradient(to right, #050505, #747474);">
            <div class="container py-4">
                <div class="copyright">
                    جميع الحقوق محفوظة لصالح تطبيق عباية  &copy; {{date("Y")}}.
                </div>
            </div>
        </section><!-- End Footer -->
    </main><!-- End #main -->

@endsection

@section('custom_scripts')
    @if( $errors->has('email')||$errors->has('mobile')||$errors->has('message'))
    <script>
        $(document).ready(function () {
            $('html, body').animate({
                scrollTop: $("#contact").offset().top
            }, 2000);
        });
    </script>
    @endif
    @if( $errors->has('designer_name')||$errors->has('designer_mobile')||$errors->has('designer_email'))
    <script>
        $(document).ready(function () {
            $('html, body').animate({
                scrollTop: $("#JoinUs").offset().top
            }, 2000);
        });
    </script>
    @endif
    @if( count($errors) && !($errors->has('designer_name')||$errors->has('designer_mobile')||$errors->has('designer_email')) && !($errors->has('email')||$errors->has('mobile')||$errors->has('message')))
    <script>
        $(document).ready(function () {
            $('html, body').animate({
                scrollTop: $("#JoinUs").offset().top
            }, 2000);
        });
    </script>
    @endif
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(Session::has('d_message'))

    <script>
        $(document).ready(function () {
            swal({
                title: "{{Session::get('d_message')}}",
                text: "{{Session::get('d_message')}}",
                icon: "success",
                button: "تم!",
            });
        });
    </script>
    @endif
    @if(Session::has('s_message'))
    <script>
        $(document).ready(function () {
            swal({
                title: "تمت عملية التسجيل بنجاح",
                text: "{{Session::get('s_message').'\n'}}"+"{{Session::get('m_message')}}",
                icon: "success",
                button: "تم!",
            });
            $('div.swal-text').attr('style','text-align:center!important');
        });
    </script>
    @endif
@endsection


