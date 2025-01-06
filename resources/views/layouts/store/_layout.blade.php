@if(config('layout.self.layout') == 'blank')
    <div class="d-flex flex-column flex-root">
        @yield('content')
    </div>
@else

    @include('layouts.store._header-mobile')

    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">

            @if(config('layout.aside.self.display'))
                @include('layouts.store._aside')
            @endif

            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                @include('layouts.store._header')

                <div class="content {{ Metronic::printClasses('content', false) }} d-flex flex-column flex-column-fluid" id="kt_content">

                    @if(config('layout.subheader.display'))
                        @if(array_key_exists(config('layout.subheader.layout'), config('layout.subheader.layouts')))
                            @include('layouts.store_parts.subheader._'.config('layout.subheader.layout'))
                        @else
                            @include('layouts.store_parts.subheader._'.array_key_first(config('layout.subheader.layouts')))
                        @endif
                    @endif

                    @include('layouts.store._content')
                </div>

                @if(config('layout.footer.display'))
                @include('layouts.store._footer')
                    @endif
            </div>
        </div>
    </div>

@endif

@if (config('layout.self.layout') != 'blank')

    @if (config('layout.extras.search.layout') == 'offcanvas')
        @include('layouts.store_parts.extras.offcanvas._quick-search')
    @endif

    @if (config('layout.extras.notifications.layout') == 'offcanvas')
        @include('layouts.store_parts.extras.offcanvas._quick-notifications')
    @endif

    @if (config('layout.extras.quick-actions.layout') == 'offcanvas')
        @include('layouts.store_parts.extras.offcanvas._quick-actions')
    @endif

    @if (config('layout.extras.user.layout') == 'offcanvas')
        @include('layouts.store_parts.extras.offcanvas._quick-user')
    @endif

    @if (config('layout.extras.quick-panel.display'))
        @include('layouts.store_parts.extras.offcanvas._quick-panel')
    @endif

    @if (config('layout.extras.toolbar.display'))
        @include('layouts.store_parts.extras._toolbar')
    @endif

    @if (config('layout.extras.chat.display'))
        @include('layouts.store_parts.extras._chat')
    @endif

    @include('layouts.store_parts.extras._scrolltop')

@endif
