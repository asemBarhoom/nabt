<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      {{ Metronic::printAttrs('html') }}
      {{ Metronic::printClasses('html') }}
      dir="{{ get_layout_content()['self']['rtl'] ? 'rtl' : 'ltr' }}"
      style="direction: {{ get_layout_content()['self']['rtl'] ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8"/>

    {{-- Title Section --}}
    <title>{{ env('APP_NAME') }} | @yield('title', $page_title ?? '')</title>

    {{-- Meta Data --}}
    <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('uploads/'.settings()->valueOf('logo')) }}" />

    {{-- Fonts --}}
    {{ Metronic::getGoogleFontsInclude() }}

    {{-- Bootstrap Style --}}
    <link rel="stylesheet" href="/front/assets/css/bootstrap{{ get_layout_content()['self']['rtl'] ? '.rtl' : '' }}.min.css"/>

    {{-- Global Theme Styles --}}
    @foreach (get_layout_content()['resources']['css'] as $style)
        <link href="{{ asset(get_layout_content()['self']['rtl'] ? Metronic::rtlCssPath($style) : $style) }}" rel="stylesheet" type="text/css"/>
    @endforeach

    {{-- Layout Themes --}}
    @foreach (Metronic::initThemes() as $theme)
        <link href="{{ asset(get_layout_content()['self']['rtl'] ? Metronic::rtlCssPath($theme) : $theme) }}" rel="stylesheet" type="text/css"/>
    @endforeach

    {{-- Additional Styles --}}
    <link href="{{ asset('admin/admin.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('croper/cropper.min.css') }}" rel="stylesheet">

    {{-- Customizable CSS --}}
    @yield('styles')
    @yield('head')
    <style>
        .navi-item.active .navi-link {
            background-color: #f0f0f0; /* Or any color */
            color: #007bff; /* Or any color */
            font-weight: bold;
        }

    </style>
</head>

<body {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }}>

{{-- Page Loader --}}
@if (get_layout_content()['page-loader']['type'] != '')
    @include('layouts.partials._page-loader')
@endif

{{-- Main Layout --}}
@include('layouts.base._layout')

{{-- Bootstrap Scripts --}}
<script src="/front/assets/js/bootstrap.bundle.min.js"></script>

{{-- Global Config for JS --}}
<script>
    var HOST_URL = "{{ route('system_admin.quick-search') }}";
    var UrlForScripts = '{{ url('/') }}';
    var UrlForAssets = '{{ url('/') }}';
    var KTAppSettings = {!! json_encode(get_layout_content()['js'], JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
</script>

{{-- Global Theme Scripts --}}
@foreach (get_layout_content()['resources']['js'] as $script)
    <script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach

{{-- Custom Scripts --}}
<script>


    @if(count($errors->all()))
    @php
        $err='<ul class="text-right mb-5" style="padding:0 20px;">';
        foreach ($errors->all() as $e){
            $err.='<li>'.$e.'</li>';
        }
        $err.='</ul>'
    @endphp
    Swal.fire({
        toast:true,
        html: '{!! $err !!}',
        icon: 'error',
        timer: 60000,
        position:'bottom-start',
        timerProgressBar: true,
        showConfirmButton: false,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    @endif
</script>

{{-- Plugin Scripts --}}
<script src="{{ asset('croper/cropper.min.js') }}"></script>
<script src="{{ asset('admin/jquery-validation/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="{{ asset('admin/main.min.js') }}"></script>

{{-- Additional Scripts --}}
@yield('scripts')
@yield('custom_scripts')
@yield('upload1_scripts')
@yield('upload2_scripts')
@yield('area_scripts')
@yield('graph_js')
</body>
</html>
