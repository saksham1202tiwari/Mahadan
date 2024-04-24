@extends('layouts.admin')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif

    {!! Form::open(['route' => 'admin.blogs.store', 'files' => true]) !!}

    <div class="mb-3">
        {{ Form::label('title', 'Title', ['class' => 'form-label']) }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('description', 'Description', ['class' => 'form-label']) }}
        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('user_id', 'User_id', ['class' => 'form-label']) }}
        {{ Form::select('user_id', App\Models\User::pluck('name', 'id'), null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('approved', 'Approved', ['class' => 'form-label']) }}
        {{ Form::checkbox('approved', null, ['class' => 'form-control']) }}
    </div>

    <div class="mb-3">
        <label for="image">Display Image</label>
        <input type="file" class="form-control" name="image">
    </div>



    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}


@stop
