@extends('layouts.admin')

@section('page_content')

    {{-- Dashboard 1 --}}

    <div class="row justify-content-center">

        @foreach($counts as $c)
            @component('components.dash.card', [
                'url' => $c['url'],
                'icon' => is_null($c['icon']) ? 'fa fa-list' : $c['icon'],
                'name' => t($c['text']),  // Localized text for the card name
                'count' => $c['count'].$c['count_text'],
                'col' => 3
            ])
            @endcomponent
        @endforeach
    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
