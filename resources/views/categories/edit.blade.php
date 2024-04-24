@extends('default')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif

    {{ Form::model($category, ['route' => ['admin.categories.update', $category->id], 'method' => 'PUT']) }}

    <div class="mb-3">
        {{ Form::label('name', 'Name', ['class' => 'form-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>

    {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}
@stop
