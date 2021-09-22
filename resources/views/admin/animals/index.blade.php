@extends('adminlte::page')

@section('title', 'Animals')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <a class="btn btn-success float-right" href="{{ route('admin.animals.create') }}">{{ __('common.add_animal') }}</a>
            <h3 class="box-title">{{ __('common.animals_list') }}</h3>
        </div>
        <div class="card-body">
            <table id="animals-table" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>{{ __('common.name') }}</th>
                    <th>{{ __('common.age') }}</th>
                    <th>{{ __('common.type') }}</th>
                    <th>{{ __('common.status') }}</th>
{{--                    <th style="width:5%">{{ __('common.actions') }}</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($animals as $animal)
                    <tr>
                        <td>{{ $animal->id }}</td>
                        <td>{{ $animal->name }}</td>
                        <td>{{ $animal->age }}</td>
                        <td>{{ $animal->type->name }}</td>
                        <td>{{ $animal->status->name }}</td>
{{--                        <td>
                            <a href="{{ route('admin.animals.edit', ['animal' => $animal->id]) }}" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top" data-title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="btn btn-xs btn-danger" data-placement="top" data-title="Delete" data-toggle="modal" data-target="#modal-secondary-{{ $animal->id }}">
                                <i class="fa fa-trash-alt"></i>
                            </a>
                        </td>--}}
                    </tr>

                    {{--<form method="POST" action="{{ route('admin.animals.destroy', ['animal' => $animal->id]) }}" enctype="multipart/form-data">
                        @method('delete')
                        @csrf
                        <div class="modal fade show" id="modal-secondary-{{ $animal->id }}" style="display: none; padding-right: 17px;" aria-modal="true">
                            <div class="modal-dialog">
                                <div class="modal-content bg-default">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete this animal?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>This action cannot be undone</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>--}}
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="float-right">{{ $animals->links() }}</div>

@stop
