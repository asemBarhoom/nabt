@extends('layouts.admin')
@push('panel_css')
    <link href="{{asset('panel/css/summernote.css')}}" rel="stylesheet" type="text/css"/>

    <style>
        .note-editor.note-frame .panel-heading.note-toolbar{
  z-index: 2;
}
    </style>
@endpush
@section('page_content')
    @php
        $item = isset($item) ? $item: null;
    @endphp
    @component('components.AddEditCard',[
        'Disname'=>'نصوص الموقع',
        'Disinfo'=>'نصوص الموقع',
        'add_url'=> route('texts.all.index'),
        'back_url'=> 'texts.all.index',
        'action'=> isset($item) ? 'EDIT' : 'add',
    ])


        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

    <!--begin::Form-->



    <div class="row">
        <div class="col-lg-8">
            <div class="kt-portlet m-portlet--tabs">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            نصوص الموقع
                        </h3>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active show" id="m_tabs_6_1" role="tabpanel">
                        <div class="kt-portlet m-portlet--tab">
                            <div class="kt-portlet__body" id="ajx">
                                @foreach($backupData as $k => $item)
                                @if($k=='جاهز لبدء محادثتك؟')
                                  <div class="form-group m-form__group row">
                                    <label class="col-3 col-form-label"
                                              readonly="readonly" required>{{$k}}</label>
                                        <textarea hidden class="form-control m-input col-3 col-form-label" type="text"
                                              name="keys[]"
                                              readonly="readonly" required>{{$k}}</textarea>
                                        <div class="col-9">
                                        <textarea class="form-control m-input" type="text" id="kt_inbox_reply_editor" name="values[]"
                                                  required>{{ $arData[$k]??"" }}</textarea>
                                        </div>
                                    </div>
                                @else

                                    <div class="form-group m-form__group row">
                                    <label class="col-3 col-form-label"
                                              readonly="readonly" required>{{$k}}</label>
                                        <textarea hidden class="form-control m-input col-3 col-form-label" type="text"
                                              name="keys[]"
                                              readonly="readonly" required>{{$k}}</textarea>
                                        <div class="col-9">
                                        <textarea class="form-control m-input" type="text" name="values[]"
                                                  required>{{ $arData[$k]??"" }}</textarea>
                                        </div>
                                    </div>
                                @endif
                                @endforeach


                            </div>
                        </div>
                    </div>


                </div>


            </div>


        </div>
        <div class="col-lg-4">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            الإجراءات
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" id="m_login_signin_submit" class="btn btn-success w-100"> حفظ
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group kt-form__group">
                <label for="exampleSelect1"> اختر اللغة  </label>
                <select class="form-control m-input text-center" name="lang" id="exampleSelect1">
                    <option value=""></option>
                    @foreach(locales() as $lang=>$lang_name)
                        <option value="{{$lang}}" {{@$_GET['lang']==$lang?'selected':''}}>{{$lang}}</option>
                    @endforeach
                </select>
            </div>
             {{--           --}}{{-- <div class="form-group kt-form__group">--}}
{{--                <label for="exampleSelect1"> {{ trans('dashboard.Select the language') }}  </label>--}}
{{--                <select class="form-control m-input" name="lang" id="exampleSelect1">--}}
{{--                  --}}{{----}}{{--  @foreach(locales() as $lang=>$lang_name)--}}
{{--                    <option value="{{$lang}}">{{__('translate.'.$lang)}}</option>--}}
{{--                  @endforeach--}}{{----}}{{----}}
{{--                    <option value="ar">العربية</option>--}}
{{--                </select>--}}
{{--            </div>--}}


        </div>
    </div>

            @endcomponent
@endsection

@section('scripts')
    {{--        {!! HTML::script('panel/js/jasny-bootstrap.min.js') !!}--}}

    {{--    {!! HTML::script('panel/js/jasny.js') !!}--}}

    <script src="{{asset('/panel/js/post.js')}}"></script>
    <script src="{{asset('/panel/js/summernote.js')}}"></script>


    <script>
        $(document).on('change','#exampleSelect1',function () {
            var route ="{{url()->current()}}";
            var lang=$(this).val();
            // alert(lang);
            $.ajax({
                type: 'GET',
                url: route,
                data: {'lang':lang},
                // contentType: false,
                // processData: false,
                success: function (data) {
                    $('#ajx').html(data.html);

                }
            }).fail(function (jqXhr) {
            }).always(function () {
            });
        })
    </script>
    <script>
        $('#kt_inbox_reply_editor').summernote({focus: true,  height: 300,});
    </script>
@endsection
