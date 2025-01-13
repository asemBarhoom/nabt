@extends('layouts.admin')
@section('head')
    <link rel="stylesheet" href="/front/assets/css/toastify.css">
@endsection

@section('hor_menu')
    {{ Menu::renderHorMenu(getHeaderMenuItems()['destinations']) }}
@endsection

@section('styles')

@endsection
@section('page_content')

    @component('components.ShowCard', [
        'Disname' => t('destinations'),
        'Disinfo' => t('manage_destinations'),
        'add_url' => 'system.destinations.create',
        'module' => 'destinations',
        'actions' => [
            [
                'route'=>'system.destinations.activate',
                'icon'=>config('layout.icons.activate_icon'),
                'text'=>t('activate'),
                'role'=>"activate",
            ],
            [
                'route'=>'system.destinations.deactivate',
                'icon'=>config('layout.icons.deactivate_icon'),
                'text'=>t('deactivate'),
                'role'=>"deactivate",
            ]
        ]
    ])
        <div class="row">
            <div class="col-lg-12">

                <div class="row">
                    <div class="col">
                        <form class="form-inline d-flex justify-content-start">

                            <div class="form-group mb-3">
                                @component('components.serach.inputwithsearch', ['inputs' => ['name' => t('Search')]])
                                @endcomponent
                            </div>
                        </form>
                    </div>
                </div>



                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th width="5%" style="text-align: center;vertical-align: middle;">
                            <label class="checkbox checkbox-outline justify-content-center checkbox-success">
                                <input type="checkbox" id="SelectAll">
                                <span></span>
                            </label>
                        </th>
                        <th class="text-center">{{ t('name') }}</th>
                        <th class="text-center">{{ t('category') }}</th>
                        <th class="text-center">{{ t('favorites') }}</th>
                        <th class="text-center">{{ t('images') }}</th>
                        <th class="text-center">{{ t('testimonials') }}</th>
                        <th class="text-center">{{ t('settings') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($destinations as $destination)
                        <tr>
                            <td class="LOOPIDS">{{ ($destinations->currentpage() - 1) * $destinations->perpage() + $loop->iteration }}</td>
                            <td style="text-align: center;vertical-align: middle;">
                                <label class="checkbox checkbox-outline checkbox-success justify-content-center">
                                    <input type="checkbox" value="{{ $destination->id }}" name="Item[]" class="CheckedItem" id="che_{{ $destination->id }}">
                                    <span></span>
                                </label>
                            </td>
                            <td class="text-center">
                                {{$destination->name}}
                            </td>
                            <td class="text-center">
                                <a href="{{route('system.categories.index')}}?category_id={{$destination->category->id}}">
                                    {{$destination->category->name}}
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{route('system.categories.index')}}?category_id={{$destination->category->id}}">
                                    {{$destination->favorites_count}}
                                </a>
                            </td>

                            <td class="text-center">
                                <a href="{{route('system.categories.index')}}?category_id={{$destination->category->id}}">
                                    {{$destination->images_count}}
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{route('system.categories.index')}}?category_id={{$destination->category->id}}">
                                    {{$destination->testimonials_count}}
                                </a>
                            </td>




                            <td class="text-center">
                                <ul class="list-inline">
                                    @cando('edit', 'destinations')
                                    <li>
                                        <a href="{{ route('system.destinations.edit', $destination->id) }}"
                                           class="{{ config('layout.classes.edit') }}"
                                           data-toggle="tooltip" data-theme="dark" title="{{ t('edit') }}">
                                            <i class="{{ config('layout.icons.edit_icon') }}"></i> {{ t('Edit') }}
                                        </a>
                                    </li>

                                    @endcando
                                    @cando('delete', 'destinations')
                                    @if($destination->can_del)
                                        <li>
                                            <button type="button"
                                                    data-id="{{ $destination->id }}"
                                                    data-url="{{ route('system.destinations.delete') }}"
                                                    data-token="{{ csrf_token() }}"
                                                    data-skin="dark"
                                                    data-tooltip="m-tooltip"
                                                    data-placement="top"
                                                    title="{{ t('delete') }}"
                                                    class="{{ config('layout.classes.delete') }} btn-del">
                                                <i class="{{ config('layout.icons.delete_icon') }}"></i>
                                                {{ t('delete') }}
                                            </button>
                                        </li>
                                    @else
                                        <li>
                                            <div type="button"
                                                 data-skin="dark"
                                                 data-toggle="tooltip"
                                                 data-theme="dark"
                                                 data-placement="top"
                                                 title="{{ t('cannot_delete') }}"
                                                 class="{{ config('layout.classes.delete') }} disabled">
                                                <i class="{{ config('layout.icons.delete_icon') }}"></i>
                                                {{ t('delete') }}
                                            </div>
                                        </li>
                                    @endif
                                    @endcando
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Modal for displaying tracking result -->
                <div class="modal fade" id="trackingModal" tabindex="-1" aria-labelledby="trackingModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="trackingModalLabel">{{ t('track_destination') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="trackingResultContent">
                                <!-- Dynamic content will be injected here -->
                            </div>
                        </div>
                    </div>
                </div>

                {!! $destinations->links('vendor.pagination.bootstrap-4') !!}
            </div>
        </div>
    @endcomponent

@endsection
@section('scripts')

@endsection
