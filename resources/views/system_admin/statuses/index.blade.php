@extends('layouts.admin')
@section('head')
    <link rel="stylesheet" href="/front/assets/css/toastify.css">
@endsection

@section('hor_menu')
    {{ Menu::renderHorMenu(getHeaderMenuItems()['statuses']) }}
@endsection

@section('styles')

@endsection
@section('page_content')

    @component('components.ShowCard', [
        'Disname' => t('statuses'),
        'Disinfo' => t('manage_statuses'),
        'add_url' => 'system.statuses.create',
        'module' => 'statuses',
        'actions' => [
            [
                'route'=>'system.statuses.activate',
                'icon'=>config('layout.icons.activate_icon'),
                'text'=>t('activate'),
                'role'=>"activate",
            ],
            [
                'route'=>'system.statuses.deactivate',
                'icon'=>config('layout.icons.deactivate_icon'),
                'text'=>t('deactivate'),
                'role'=>"deactivate",
            ],
            [
                'route'=>'system.statuses.delete',
                'icon'=>config('layout.icons.delete_icon'),
                'text'=>t('delete'),
                'role'=>"delete",
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
                        <th class="text-center">{{ t('user') }}</th>
                        <th class="text-center">{{ t('Related') }}</th>
                        <th class="text-center">{{ t('settings') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($statuses as $status)
                        <tr>
                            <td class="LOOPIDS">{{ ($statuses->currentpage() - 1) * $statuses->perpage() + $loop->iteration }}</td>
                            <td style="text-align: center;vertical-align: middle;">
                                <label class="checkbox checkbox-outline checkbox-success justify-content-center">
                                    <input type="checkbox" value="{{ $status->id }}" name="Item[]" class="CheckedItem" id="che_{{ $status->id }}">
                                    <span></span>
                                </label>
                            </td>

                            <td class="text-center">
                                {{$status->status}}
                            </td>

                            <td class="text-center">
                                <a href="{{route('system.users.index')}}?user_id={{$status->user_id}}">
                                    {{$status->user->name}}
                                </a>
                            </td>

                            <td class="text-center">
                                @if($status->statusable)
                                    @php
                                        $relatedType = class_basename($status->statusable_type); // Extract the class name
                                        $routeName = '';

                                        // Define dynamic routes based on the related type
                                        switch ($relatedType) {
                                            case 'Destination':
                                                $routeName =  route('system.destinations.index')."?destination_id=".$status->statusable->id."";
                                                break;
                                            case 'Accommodation':
                                                $routeName =  route('system.accommodations.index')."?accommodation_id=".$status->statusable->id."";
                                                break;
                                            case 'Tourevent':
                                            $routeName =  route('system.tourevents.index')."?tourevent_id=".$status->statusable->id."";
                                             case 'Booking':
                                            $routeName =  route('system.bookings.index')."?booking9_id=".$status->statusable->id."";
                                            break;
                                        }
                                    @endphp

                                    @if($routeName)
                                        <a href="{{ $routeName }}" class="text-primary">
                                            {{ $status->statusable->name ?? 'View Related' }}
                                        </a>
                                    @else
                                        Unknown Related Type
                                    @endif
                                @else
                                    N/A
                                @endif
                            </td>



                            <td class="text-center">
                            <span class="badge {{ $status->status==1 ? 'badge-success' : 'badge-danger' }}">
                                 {{ $status->status==1 ? 'Active' : 'Inactive' }}
                            </span>
                            </td>


                            <td class="text-center">
                                <ul class="list-inline">
                                    @cando('edit', 'statuses')
                                    <li>
                                        <a href="{{ route('system.statuses.edit', $status->id) }}"
                                           class="{{ config('layout.classes.edit') }}"
                                           data-toggle="tooltip" data-theme="dark" title="{{ t('edit') }}">
                                            <i class="{{ config('layout.icons.edit_icon') }}"></i> {{ t('Edit') }}
                                        </a>
                                    </li>

                                    @endcando
                                    @cando('delete', 'statuses')
                                    @if($status->can_del)
                                        <li>
                                            <button type="button"
                                                    data-id="{{ $status->id }}"
                                                    data-url="{{ route('system.statuses.delete') }}"
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
                                <h5 class="modal-title" id="trackingModalLabel">{{ t('track_status') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="trackingResultContent">
                                <!-- Dynamic content will be injected here -->
                            </div>
                        </div>
                    </div>
                </div>

                {!! $statuses->links('vendor.pagination.bootstrap-4') !!}
            </div>
        </div>
    @endcomponent

@endsection
@section('scripts')

@endsection
