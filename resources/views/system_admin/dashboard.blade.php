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
    <div class="row">

        <div class="col-lg-6 col-xxl-4">
            @include('components.dash.graph1', [
                'class' => 'card-stretch card-stretch-half gutter-b',
                'card_title' => t('shipments_by_containers'), // Localized title
                'card_description' => t('shipment_distribution_by_containers'), // Localized description
                'card_count' => count($shipmentCounts),
                'bg_color' => 'primary',
                'id' => 'G6',
                'name' => t('number_of_shipments'),
                'values' => $shipmentCounts,
                'axis' => $containerNames,
                'formatter' => t('shipment')
            ])
        </div>

        <div class="col-lg-6 col-xxl-4">
            @include('components.dash.graph1', [
                'class' => 'card-stretch card-stretch-half gutter-b',
                'card_title' => t('beneficiaries_by_containers'),
                'card_description' => t('beneficiaries_by_containers_description'),
                'card_count' => count($containerNames),
                'bg_color' => 'warning',
                'id' => 'G7',
                'name' => t('number_of_beneficiaries'),
                'values' => $beneficiariesCount->toArray(),
                'axis' => $containerNames->toArray(),
                'formatter' => t('beneficiary')
            ])
        </div>

        <div class="col-lg-6 col-xxl-4">
            @include('components.dash.graph1', [
                'class' => 'card-stretch card-stretch-half gutter-b',
                'card_title' => t('shipments_by_date'),
                'card_description' => t('shipments_per_day'),
                'card_count' => count($dates),
                'bg_color' => 'info',
                'id' => 'G8',
                'name' => t('number_of_shipments'),
                'values' => $shipmentCounts2->toArray(),
                'axis' => $dates->toArray(),
                'formatter' => t('shipment')
            ])
        </div>
    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
