@extends('layouts.admin')
@section('head')
    <link rel="stylesheet" href="/front/assets/css/toastify.css">
@endsection

@section('hor_menu')
    {{ Menu::renderHorMenu(getHeaderMenuItems()['users']) }}
@endsection

@section('styles')

@endsection
@section('page_content')

    @component('components.ShowCard', [
        'Disname' => t('users'),
        'Disinfo' => t('manage_users'),
        'add_url' => 'system.users.create',
        'module' => 'users',
        'actions' => [
            [
                'route'=>'system.users.activate',
                'icon'=>config('layout.icons.activate_icon'),
                'text'=>t('activate'),
                'role'=>"activate",
            ],
            [
                'route'=>'system.users.deactivate',
                'icon'=>config('layout.icons.deactivate_icon'),
                'text'=>t('deactivate'),
                'role'=>"deactivate",
            ],
            [
                'route'=>'system.users.delete',
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

                        <th class="text-center">{{ t('image') }}</th>
                        <th class="text-center">{{ t('name') }}</th>
                        <th class="text-center">{{ t('bookings') }}</th>
                        <th class="text-center">{{ t('favorites') }}</th>
                        <th class="text-center">{{ t('notifications') }}</th>
                        <th class="text-center">{{ t('activities') }}</th>
                        <th class="text-center">{{ t('status') }}</th>
                        <th class="text-center">{{ t('settings') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="LOOPIDS">{{ ($users->currentpage() - 1) * $users->perpage() + $loop->iteration }}</td>
                            <td style="text-align: center;vertical-align: middle;">
                                <label class="checkbox checkbox-outline checkbox-success justify-content-center">
                                    <input type="checkbox" value="{{ $user->id }}" name="Item[]" class="CheckedItem" id="che_{{ $user->id }}">
                                    <span></span>
                                </label>
                            </td>
                            <td class="text-center">
                                <img src="{{ App\Helpers\FileHelper::getFullPathSingleAsset(object_get($user , 'image')) }}" alt="{{ $user->name }}" style="width: 50px; height: 50px; object-fit: cover;">
                            </td>
                            <td class="text-center">
                                {{$user->name}}
                            </td>

                            <td class="text-center">
                                <a href="{{route('system.bookings.index')}}?user_id={{$user->id}}">
                                    {{$user->bookings_count}}
                                </a>
                            </td>

                            <td class="text-center">
                                <a href="{{route('system.favorites.index')}}?user_id={{$user->id}}">
                                    {{$user->favorites_count}}
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{route('system.notifications.index')}}?user_id={{$user->id}}">
                                    {{$user->notifications_count}}
                                </a>
                            </td>

                            <td class="text-center">
                                <a href="{{route('system.activities.index')}}?user_id={{$user->id}}">
                                    {{$user->activities_count}}
                                </a>
                            </td>


                            <td class="text-center">
                            <span class="badge {{ $user->status==1 ? 'badge-success' : 'badge-danger' }}">
                                 {{ $user->status==1 ? 'Active' : 'Inactive' }}
                            </span>
                            </td>


                            <td class="text-center">
                                <ul class="list-inline">
                                    @cando('edit', 'users')
                                    <li>
                                        <a href="{{ route('system.users.edit', $user->id) }}"
                                           class="{{ config('layout.classes.edit') }}"
                                           data-toggle="tooltip" data-theme="dark" title="{{ t('edit') }}">
                                            <i class="{{ config('layout.icons.edit_icon') }}"></i> {{ t('Edit') }}
                                        </a>
                                    </li>

                                    @endcando
                                    @cando('delete', 'users')
                                    @if($user->can_del)
                                        <li>
                                            <button type="button"
                                                    data-id="{{ $user->id }}"
                                                    data-url="{{ route('system.users.delete') }}"
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
                                <h5 class="modal-title" id="trackingModalLabel">{{ t('track_user') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="trackingResultContent">
                                <!-- Dynamic content will be injected here -->
                            </div>
                        </div>
                    </div>
                </div>

                {!! $users->links('vendor.pagination.bootstrap-4') !!}
            </div>
        </div>
    @endcomponent

@endsection
@section('scripts')

@endsection
