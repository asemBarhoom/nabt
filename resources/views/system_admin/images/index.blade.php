@extends('layouts.admin')
@section('head')
    <link rel="stylesheet" href="/front/assets/css/toastify.css">
@endsection

@section('hor_menu')
    {{ Menu::renderHorMenu(getHeaderMenuItems()['images']) }}
@endsection

@section('styles')

@endsection
@section('page_content')

    @component('components.ShowCard', [
        'Disname' => t('images'),
        'Disinfo' => t('manage_images'),
        'add_url' => 'system.images.create',
        'module' => 'images',
        'actions' => [
            [
                'route'=>'system.images.activate',
                'icon'=>config('layout.icons.activate_icon'),
                'text'=>t('activate'),
                'role'=>"activate",
            ],
            [
                'route'=>'system.images.deactivate',
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
                        <th class="text-center">{{ t('image') }}</th>


                        <th class="text-center">{{ t('settings') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($images as $image)
                        <tr>
                            <td class="LOOPIDS">{{ ($images->currentpage() - 1) * $images->perpage() + $loop->iteration }}</td>
                            <td style="text-align: center;vertical-align: middle;">
                                <label class="checkbox checkbox-outline checkbox-success justify-content-center">
                                    <input type="checkbox" value="{{ $image->id }}" name="Item[]" class="CheckedItem" id="che_{{ $image->id }}">
                                    <span></span>
                                </label>
                            </td>
                            <td class="text-center">
                                <img src="{{ App\Helpers\FileHelper::getFullPathSingleAsset(object_get($image , 'image_path')) }}" alt="{{ $image->id }}" style="width: 50px; height: 50px; object-fit: cover;">
                            </td>





                            <td class="text-center">
                                <ul class="list-inline">
                                    @cando('edit', 'images')
                                    <li>
                                        <a href="{{ route('system.images.edit', $image->id) }}"
                                           class="{{ config('layout.classes.edit') }}"
                                           data-toggle="tooltip" data-theme="dark" title="{{ t('edit') }}">
                                            <i class="{{ config('layout.icons.edit_icon') }}"></i> {{ t('Edit') }}
                                        </a>
                                    </li>

                                    @endcando
                                    @cando('delete', 'images')
                                    @if($image->can_del)
                                        <li>
                                            <button type="button"
                                                    data-id="{{ $image->id }}"
                                                    data-url="{{ route('system.images.delete') }}"
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
                                <h5 class="modal-title" id="trackingModalLabel">{{ t('track_image') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="trackingResultContent">
                                <!-- Dynamic content will be injected here -->
                            </div>
                        </div>
                    </div>
                </div>

                {!! $images->links('vendor.pagination.bootstrap-4') !!}
            </div>
        </div>
    @endcomponent

@endsection
@section('scripts')

@endsection
