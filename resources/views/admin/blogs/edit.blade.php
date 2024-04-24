@extends('layouts.admin')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif

    {{ Form::model($blog, ['route' => ['admin.blogs.update', $blog->id], 'method' => 'PUT', 'files' => true]) }}

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
        {{ Form::text('user_id', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('approved', 'Approved', ['class' => 'form-label']) }}
        {{ Form::checkbox('approved', null, $blog->approved) }}
    </div>

    <div class="mb-3">
        <label for="image">Display Image</label>

        <div class="image-box my-2">
            <img src="{{ $blog->getFirstMediaUrl() }}" alt="Image" width="100" height="100">
        </div>

        <input type="file" class="form-control" name="image">
    </div>

    {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}
@stop
