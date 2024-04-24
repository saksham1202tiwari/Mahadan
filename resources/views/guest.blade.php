@extends('layouts.other')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ App\Models\User::$roles[auth()->user()->user_type] }} Panel
                    </div>
                    <div class="card-body">
                        Welcome to dashboard {{ auth()->user()->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
