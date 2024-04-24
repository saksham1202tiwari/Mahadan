@extends('layouts.other')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif

    {!! Form::open(['route' => 'user.blogs.store', 'files' => true]) !!}

    <div class="mb-3">
        {{ Form::label('title', 'Title', ['class' => 'form-label']) }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('description', 'Description', ['class' => 'form-label']) }}
        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
    </div>

    <div class="mb-3">
        <label for="image">Display Image</label>
        <input type="file" class="form-control" name="image">
    </div>


    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}


@stop
