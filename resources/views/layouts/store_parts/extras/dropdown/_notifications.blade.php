{{-- Header --}}
@if (config('layout.extras.notifications.dropdown.style') == 'light')
    <div class="d-flex flex-column pt-12 bg-dark-o-5 rounded-top">
        {{-- Title --}}
        <h4 class="d-flex flex-center">
            <span class="text-dark">الاشعارات</span>
            <span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">0</span>
        </h4>
        <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-primary mt-3 px-8" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications"  >Alerts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#topbar_notifications_events"  >Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs"  >Logs</a>
            </li>
        </ul>
    </div>
@else
    <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url('{{ asset('media/misc/bg-1.jpg') }}')">
        {{-- Title --}}
        <h4 class="d-flex flex-center rounded-top">
            <span class="text-white">الاشعارات</span>
            <span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2"  id="NotificationCount">0</span>
        </h4>
        <ul class=" mt-3 px-8" style="height: 20px" role="tablist">

        </ul>
    </div>
@endif

{{-- Content --}}
<div class="tab-content">
    {{-- Tabpane --}}
    <div class="tab-pane active show p-8" id="topbar_notifications_notifications" role="tabpanel">
        {{-- Scroll --}}
        <div class="scroll pr-7 mr-n7" data-scroll="true" data-height="300" data-mobile-height="200"  id="NotificationItems">
            {{-- Item --}}



        </div>
    </div>

</div>
