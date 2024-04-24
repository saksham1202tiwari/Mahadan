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
                            <div class="card">
                                <div class="card-header">
                                    Register Form
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name"
                                                placeholder="Full Name" name="name">
                                            @if ($errors->has('name'))
                                                <p class="text-danger">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" placeholder="Email"
                                                name="email">
                                            @if ($errors->has('email'))
                                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="user_type">User Type</label>
                                            <select name="user_type" id="user_type" class="form-control">
                                                @foreach (App\Models\User::$roles as $key => $role)
                                                    @if ($key > 1)
                                                        <option value="{{ $key }}">{{ $role }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Password" name="password">
                                            @if ($errors->has('password'))
                                                <p class="text-danger">{{ $errors->first('password') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm_password">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirm_password"
                                                placeholder="Confirm Password" name="password_confirmation">
                                            @if ($errors->has('password_confirmation'))
                                                <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                                            @endif
                                        </div>
                                        <button class="btn btn-success btn-block mb-2"><i
                                                class="fa-solid fa-right-to-bracket"></i>&nbsp;Register</button>
                                        <a href="{{ route('login') }}" class="alternate-action">Already Have An Account ?
                                            Login</a>
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
                                                class="fa-brands fa-apple"></i>&nbsp;<span>Apple</span></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Section of Register Body Ends  -->
@endsection
