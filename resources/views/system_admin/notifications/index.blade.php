@extends('layouts.admin')
@section('head')
    <link rel="stylesheet" href="/front/assets/css/toastify.css">
@endsection

@section('hor_menu')
    {{ Menu::renderHorMenu(getHeaderMenuItems()['notifications']) }}
@endsection

@section('styles')

@endsection
@section('page_content')

    @component('components.ShowCard', [
        'Disname' => t('notifications'),
        'Disinfo' => t('manage_notifications'),
        'module' => 'notifications',
        'actions' => [

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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($notifications as $notification)
                        <tr>
                            <td class="LOOPIDS">{{ ($notifications->currentpage() - 1) * $notifications->perpage() + $loop->iteration }}</td>
                            <td style="text-align: center;vertical-align: middle;">
                                <label class="checkbox checkbox-outline checkbox-success justify-content-center">
                                    <input type="checkbox" value="{{ $notification->id }}" name="Item[]"
                                           class="CheckedItem" id="che_{{ $notification->id }}">
                                    <span></span>
                                </label>
                            </td>

                            <td class="text-center">
                                @foreach($notification->data as $key=>$value)
                                    <span class="text-info">{{$key}}</span> : {{$value}} <br>
                                @endforeach
                            </td>


                            <td class="text-center">
                                <a href="{{route('system.users.index')}}?user_id={{$notification->notifiable_id}}">
                                    {{$notification->notifiable->name}}
                                </a>
                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Modal for displaying tracking result -->
                <div class="modal fade" id="trackingModal" tabindex="-1" aria-labelledby="trackingModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="trackingModalLabel">{{ t('track_notification') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="trackingResultContent">
                                <!-- Dynamic content will be injected here -->
                            </div>
                        </div>
                    </div>
                </div>

                {!! $notifications->links('vendor.pagination.bootstrap-4') !!}
            </div>
        </div>
    @endcomponent

@endsection
@section('scripts')

@endsection
