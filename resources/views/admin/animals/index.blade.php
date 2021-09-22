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
            <table id="animals-table" class="table" style="width:100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>{{ __('common.name') }}</th>
                    <th>{{ __('common.age') }}</th>
                    <th>{{ __('common.type') }}</th>
                    <th>{{ __('common.status') }}</th>
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
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="float-right">{{ $animals->links() }}</div>

@stop
