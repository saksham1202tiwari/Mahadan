@extends('layouts.other')

@section('content')

    <div class="d-flex justify-content-end mb-3"><a href="{{ route('user.blogs.create') }}" class="btn btn-info">Create</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>description</th>
                <th>user</th>
                <th>approved</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->description }}</td>
                    <td>{{ $blog->user->name }}</td>
                    <td>{{ $blog->approved ? 'Approved' : 'Pending' }}</td>


                    <td>
                        <div class="d-flex gap-2">
                            {{-- <a href="{{ route('user.blogs.show', [$blog->id]) }}" class="btn btn-info">Show</a> --}}
                            <a href="{{ route('user.blogs.edit', [$blog->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['user.blogs.destroy', $blog->id]]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
