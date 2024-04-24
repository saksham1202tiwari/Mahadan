@extends('layouts.guest')
@section('content')
    <section id="authentication">
        <div class="container">
            <div class="row main-row">
                <div class="col-md-12 border">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-6 hero-section">
                            <img src="{{ asset('images/login.png') }}" alt="Login Register Hero" class="img-fluid">
                        </div>
                        <div class="col-md-6 login-register-section">
                            <div class="alert alert-success alert-dismissible ml-3 mr-3" id="messages">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Email Sent Successfully</strong>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    Reset Your Password
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('password.email') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" placeholder="Email"
                                                name="email">
                                            @if ($errors->has('name'))
                                                <p class="text-danger">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>

                                        <button type="submit" class="btn btn-success btn-block mb-2"><i
                                                class="fa-solid fa-right-to-bracket"></i>&nbsp;Reset Password</button>
                                        <a href="{{ route('register') }}" class="alternate-action">Don't Have An Account ?
                                            Create New
                                            One</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Section of Login Body Ends -->
@endsection
