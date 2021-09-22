@extends('adminlte::page')

@section('title', 'users')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <a class="btn btn-success float-right" href="{{ route('admin.users.create') }}">{{ __('common.add_user') }}</a>
            <h3 class="box-title">{{ __('common.users_list') }}</h3>
        </div>
        <div class="card-body">
            <table id="users-table" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>{{ __('common.name') }}</th>
                    <th>{{ __('common.user_animals') }}</th>
                    <th style="width:5%">{{ __('common.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            <a class="btn btn-xs btn-link" data-placement="top" data-title="{{ __('common.user_animals') }}" data-toggle="modal" data-target="#modal-secondary-{{ $user->id }}">
                                {{ __('common.user_animals') }}
                            </a>
                            <div class="modal fade show" id="modal-secondary-{{ $user->id }}" style="display: none; padding-right: 17px;" aria-modal="true">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-default">
                                        <div class="modal-header">
                                            <h4 class="modal-title">{{ __('common.user_animals') }}</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <table>
                                                <thead>
                                                <tr>
                                                    <th>{{ __('common.name') }}</th>
                                                    <th>{{ __('common.age') }}</th>
                                                    <th>{{ __('common.type') }}</th>
                                                    {{--                    <th style="width:5%">{{ __('common.actions') }}</th>--}}
                                                </tr>
                                                </thead>
                                                <tbody>
{{--                                                @foreach($user->animals as $animal)--}}
{{--                                                    <tr>--}}
{{--                                                        <td>{{ $animal->name }}</td>--}}
{{--                                                        <td>{{ $animal->age }}</td>--}}
{{--                                                        <td>{{ $animal->type->name }}</td>--}}
{{--                                                    </tr>--}}
{{--                                                @endforeach--}}
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-info" data-dismiss="modal">{{ __('common.close') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a class="btn btn-xs btn-link" data-placement="top" data-title="{{ __('common.give_out') }}" data-toggle="modal" data-target="#modal-secondary2-{{ $user->id }}">
                                {{ __('common.give_out') }}
                            </a>
                            <div class="modal fade show" id="modal-secondary2-{{ $user->id }}" style="display: none; padding-right: 17px;" aria-modal="true">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-default">
                                        <div class="modal-header">
                                            <h4 class="modal-title">{{ __('common.user_animals') }}</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <select class="form-control">
                                                <option value="0">{{ __('common.random_type') }}</option>
                                                @foreach($animalTypes as $type)
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-info" data-dismiss="modal">{{ __('common.close') }}</button>
                                            <button type="submit" class="btn btn-success">{{ __('common.give_out') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
{{--                        <td>
                            <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top" data-title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="btn btn-xs btn-danger" data-placement="top" data-title="Delete" data-toggle="modal" data-target="#modal-secondary-{{ $user->id }}">
                                <i class="fa fa-trash-alt"></i>
                            </a>
                        </td>--}}

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="float-right">{{ $users->links() }}</div>

@stop
