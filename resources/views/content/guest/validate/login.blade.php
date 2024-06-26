@extends('components.validate')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">

                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url({{asset('assets/img/login.jpg')}})">
                            {{-- <img src="" class="img-fluid" > --}}
                        </div>
                        <div class="col-lg-6">
                            @include('layout.alert')
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form action="{{route('login.validate')}}" method="POST" class="user">
                                    @csrf
                                    <div class="form-group">
                                        @include('layout.input', [
                                            'type' => 'email',
                                            'class' => 'form-control form-control-user',
                                            'id' => 'email',
                                            'name' => 'email',
                                            'placeholder' => 'Please input Email',
                                            'required' => '',
                                            'value' => '',
                                        ])

                                    </div>
                                    <div class="form-group">
                                        @include('layout.input',[
                                            'type' => 'password',
                                            'class' => 'form-control form-control-user',
                                            'id' => 'password',
                                            'name' => 'password',
                                            'placeholder' => 'Please input Password',
                                            'required' => '',
                                            'value' => ''
                                        ])

                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <hr>
                                    <a href="index.html" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{route('register')}}">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
