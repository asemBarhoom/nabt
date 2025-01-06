@if(get_layout_content()['self']['layout'] == 'blank')
    <div class="d-flex flex-column flex-root">
        @yield('content')
    </div>
@else

    @include('layouts.base._header-mobile')

    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">

            @if(get_layout_content()['aside']['self']['display'])
                @include('layouts.base._aside')
            @endif

            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                @include('layouts.base._header')

                <div class="content {{ Metronic::printClasses('content', false) }} d-flex flex-column flex-column-fluid" id="kt_content">

                    @if(get_layout_content()['subheader']['display'])
                        @if(array_key_exists(get_layout_content()['subheader']['layout'], get_layout_content()['subheader']['layouts']))
                            @include('layouts.partials.subheader._'.get_layout_content()['subheader']['layout'])
                        @else
                            @include('layouts.partials.subheader._'.array_key_first(get_layout_content()['subheader']['layouts']))
                        @endif
                    @endif

                    @include('layouts.base._content')
                </div>

                @if(get_layout_content()['footer']['display'])
                    @include('layouts.base._footer')
                @endif
            </div>
        </div>
    </div>

@endif

@if (get_layout_content()['self']['layout'] != 'blank')

    @if (get_layout_content()['extras']['search']['layout'] == 'offcanvas')
        @include('layouts.partials.extras.offcanvas._quick-search')
    @endif

    @if (get_layout_content()['extras']['notifications']['layout'] == 'offcanvas')
        @include('layouts.partials.extras.offcanvas._quick-notifications')
    @endif

    @if (get_layout_content()['extras']['quick-actions']['layout'] == 'offcanvas')
        @include('layouts.partials.extras.offcanvas._quick-actions')
    @endif

    @if (get_layout_content()['extras']['user']['layout'] == 'offcanvas')
        @include('layouts.partials.extras.offcanvas._quick-user')
    @endif

    @if (get_layout_content()['extras']['quick-panel']['display'])
        @include('layouts.partials.extras.offcanvas._quick-panel')
    @endif

    @if (get_layout_content()['extras']['toolbar']['display'])
        @include('layouts.partials.extras._toolbar')
    @endif

    @if (get_layout_content()['extras']['chat']['display'])
        @include('layouts.partials.extras._chat')
    @endif

    @include('layouts.partials.extras._scrolltop')

@endif
