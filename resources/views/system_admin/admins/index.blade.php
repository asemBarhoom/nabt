@extends('layouts.admin')
@section('hor_menu')
    {{ Menu::renderHorMenu(getHeaderMenuItems()['admins']) }}
@endsection
@section('page_content')

    @component('components.ShowCard', [
        'Disname' => t('admin'),
        'Disinfo' => t('admin_info'),
        'add_url' => 'system.admin.create',
        'module' => 'admins',
        'actions' => [
            [
                'route' => 'system.admin.delete',
                'icon' => config('layout.icons.delete_icon'),
                'text' => t('delete'),
                'role' => "delete",
            ]
        ]
    ])
        <div class="row">

            <div class="row">
                <div class="col">
                    <form class="form-inline" style="float: right">
                        <div class="form-group m-form__group">
                            @component('components.serach.inputwithsearch', ['inputs' => ['name' => 'name']])
                            @endcomponent
                        </div>
                    </form>
                </div>
            </div>

            @if(isset($out) && count($out) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="text-center table-td-small">#</th>
                            <th class="text-center table-td-small">
                                <label class="checkbox checkbox-outline justify-content-center checkbox-success">
                                    <input type="checkbox" id="SelectAll">
                                    <span></span>
                                </label>
                            </th>
                            <th class="text-right">{{ t('name') }}</th>
                            <th class="text-center">{{ t('username') }}</th>
                            <th class="text-center">{{ t('mobile') }}</th>
                            <th class="text-center">{{ t('settings') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($out as $o)
                            <tr id="TR_{{$o->id}}">
                                <td class="text-center table-td-small LOOPIDS">{{$loop->iteration}}</td>
                                <td class="text-center table-td-small">
                                    @if($o->id !=1)
                                        <label class="checkbox checkbox-outline checkbox-success justify-content-center">
                                            <input type="checkbox" value="{{ $o->id }}" name="Item[]" class="CheckedItem" id="che_{{ $o->id }}">
                                            <span></span>
                                        </label>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <img src="{{ $o->image_url }}" class="img_table" alt="">
                                    {{ $o->name }}
                                </td>
                                <td class="text-center">{{ $o->email }}</td>
                                <td class="text-center">{{ $o->mobile }}</td>
                                <td class="text-center">
                                    @if($o->id !=1)
                                        <ul class="list-inline">
                                            @cando('edit','admins')
                                            <li>
                                                <a href="{{ route('system.admin.update', $o->id) }}" class="{{ config('layout.classes.edit') }}" data-toggle="tooltip" data-theme="dark" title="{{ t('update_data') }}">
                                                    <i class="fa fa-edit"></i> {{ t('edit') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('system.admin.password', $o->id) }}" class="{{ config('layout.classes.black') }}" data-toggle="tooltip" data-theme="dark" title="{{ t('edit_password') }}">
                                                    <i class="fa fa-lock"></i> {{ t('password') }}
                                                </a>
                                            </li>
                                            @endcando
                                            @cando('delete','admins')
                                            <li>
                                                <button type="button" data-id="{{ $o->id }}" data-url="{{ route('system.admin.delete') }}" data-token="{{ csrf_token() }}" data-toggle="tooltip" data-theme="dark" title="{{ t('delete') }}" class="{{ config('layout.classes.delete') }} btn-del">
                                                    <i class="{{ config('layout.icons.delete_icon') }}"></i> {{ t('delete') }}
                                                </button>
                                            </li>
                                            @endcando
                                        </ul>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                {!! $out->links() !!}
            @else
                <div class="note note-info">
                    <h4 class="block">{{ t('no_data') }}</h4>
                </div>
            @endif
        </div>
    @endcomponent

@endsection
