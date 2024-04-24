@extends('layouts.admin')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif

    {{ Form::model($event, ['route' => ['admin.events.update', $event->id], 'method' => 'PUT', 'files' => true]) }}

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

        {{ Form::select('category_id', App\Models\Category::pluck('name', 'id'), $event->category_id, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('user_id', 'Benefiary User', ['class' => 'form-label']) }}
        {{ Form::select('user_id', App\Models\User::pluck('name', 'id'), $event->user_id, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        <label for="image">Display Image</label>

        <div class="image-box my-2">
            <img src="{{ $event->getFirstMediaUrl() }}" alt="Image" width="100" height="100">
        </div>

        <input type="file" class="form-control" name="image">
    </div>

    {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}
@stop
