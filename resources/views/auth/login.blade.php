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
                            <div class="alert alert-success alert-dismissible" id="messages">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong> Login Successfull</strong>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    Mahadan Login Form
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" placeholder="Email"
                                                name="email">
                                            @if ($errors->has('email'))
                                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <label for="password">Password</label>
                                                <i class="fas fa-eye" id="passwordIcon"></i>
                                            </div>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Password" name="password"
                                                onkeyup="validateLoginForm('password')">
                                            @if ($errors->has('password'))
                                                <p class="text-danger">{{ $errors->first('password') }}</p>
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block mb-2"><i
                                                class="fa-solid fa-right-to-bracket"></i>&nbsp;Login</button>
                                        <a href="{{ route('register') }}" class="alternate-action">Don't Have An Account ?
                                            Create New
                                            One</a><br />
                                        <a href="{{ route('password.request') }}" class="alternate-action">Forgor Password ?
                                            Reset Password</a>
                                    </form>
                                </div>
                                {{-- <div class="card-footer">
                                    <div class="or-section text-center">
                                        OR
                                    </div>
                                    <div class="social-media">
                                        <a href="" class="social-login-box"><i
                                                class="fa-brands fa-facebook"></i>&nbsp;<span>Facebook</span></a>
                                        <a href="" class="social-login-box"><i
                                                class="fa-brands fa-google"></i>&nbsp;<span>Google</span></a>
                                        <a href="" class="social-login-box"><i
                                                class="fa-brands fa-apple"></i>&nbsp;<span>Apple</span></a>
                                    </div> --}}
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
