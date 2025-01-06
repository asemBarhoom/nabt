{{-- Nav --}}
<ul class="navi navi-hover py-4">
    {{-- Item for English --}}
    <li class="navi-item @if(App::getLocale() == 'en') active @endif">
        <a href="{{ route('setLanguage') }}?lange=en" class="navi-link">
            <span class="symbol symbol-20 mr-3">
                <img src="{{ asset('media/svg/flags/226-united-states.svg') }}" alt=""/>
            </span>
            <span class="navi-text">English</span>
        </a>
    </li>

    {{-- Item for Arabic --}}
    <li class="navi-item @if(App::getLocale() == 'ar') active @endif">
        <a href="{{ route('setLanguage') }}?lange=ar" class="navi-link">
            <span class="symbol symbol-20 mr-3">
                <img src="{{ asset('media/svg/flags/008-saudi-arabia.svg') }}" alt=""/>
            </span>
            <span class="navi-text">Arabic</span>
        </a>
    </li>

    {{-- Item for Chinese --}}
    <li class="navi-item @if(App::getLocale() == 'zh') active @endif">
        <a href="{{ route('setLanguage') }}?lange=zh" class="navi-link">
            <span class="symbol symbol-20 mr-3">
                <img src="{{ asset('media/svg/flags/015-china.svg') }}" alt=""/>
            </span>
            <span class="navi-text">Chinese</span>
        </a>
    </li>
</ul>
