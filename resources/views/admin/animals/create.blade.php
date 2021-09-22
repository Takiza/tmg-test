@extends('adminlte::page')

@section('title', 'Animals')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="card card-outline card-success">

        <div class="card-body">
            <form method="post" action="{{ route('admin.animals.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <div class="form-group">
                        <label>{{ __('common.name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter the name..." value="">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label>{{ __('common.age') }}</label>
                        <input type="number" class="form-control @error('age') is-invalid @enderror" name="age" placeholder="Enter the age..." value="">

                        @error('age')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label>{{ __('common.type') }}</label>
                        <select class="form-control"  name="type_id">
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>

                        <label>{{ __('common.status') }}</label>
                        <select class="form-control"  name="status_id">
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <button type="submit" class="btn btn-success">{{ __('common.add') }}</button>
            </form>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
@stop
