@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            @include('admin.users.form')
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
@stop

@section('js')

@stop
