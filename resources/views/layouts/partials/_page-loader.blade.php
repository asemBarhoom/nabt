{{-- Page Loader Types --}}

{{-- Default --}}
@if (get_layout_content()['page-loader']['type'] == 'default')
    <div class="page-loader">
        <div class="spinner spinner-primary"></div>
    </div>
@endif

{{-- Spinner Message --}}
@if (get_layout_content()['page-loader']['type'] == 'spinner-message')
    <div class="page-loader page-loader-base">
        <div class="blockui">
            <span>Please wait...</span>
            <span><div class="spinner spinner-primary"></div></span>
        </div>
    </div>
@endif

{{-- Spinner Logo --}}
@if (get_layout_content()['page-loader']['type'] == 'spinner-logo')
    <div class="page-loader page-loader-logo">
        <img alt="{{ env('APP_NAME') }}" src="{{ asset('admin/imgs/logo.png') }}"/>
        <div class="spinner spinner-primary"></div>
    </div>
@endif
