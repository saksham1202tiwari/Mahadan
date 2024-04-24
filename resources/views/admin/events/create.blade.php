@extends('layouts.admin')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif

    {!! Form::open(['route' => 'admin.events.store', 'files' => true]) !!}

    <div class="mb-3">
        {{ Form::label('title', 'Title', ['class' => 'form-label']) }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('description', 'Description', ['class' => 'form-label']) }}
        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('target_amount', 'Target_amount', ['class' => 'form-label']) }}
        {{ Form::number('target_amount', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('amount_raised', 'Amount_raised', ['class' => 'form-label']) }}
        {{ Form::number('amount_raised', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('category_id', 'Category_id', ['class' => 'form-label']) }}
        {{ Form::select('category_id', App\Models\Category::pluck('name', 'id'), null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('user_id', 'Benificiary User', ['class' => 'form-label']) }}
        {{ Form::select('user_id', App\Models\User::pluck('name', 'id'), null, ['class' => 'form-control']) }}
    </div>

    <div class="mb-3">
        <label for="image">Display Image</label>
        <input type="file" class="form-control" name="image">
    </div>
    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}


@stop
