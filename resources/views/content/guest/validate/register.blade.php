@extends('components.validate')

@section('content')
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form action="{{ route('register.validate') }}" method="POST" class="user">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    @include('layout.input', [
                                        'type' => 'text',
                                        'class' => 'form-control form-control-user',
                                        'id' => 'name',
                                        'name' => 'name',
                                        'placeholder' => 'Please input Name',
                                        'required' => '',
                                        'value' => '',
                                    ])
                                </div>
                            </div>
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
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    @include('layout.input', [
                                        'type' => 'password',
                                        'class' => 'form-control form-control-user',
                                        'id' => 'password',
                                        'name' => 'password',
                                        'placeholder' => 'Please input Password',
                                        'required' => '',
                                        'value' => '',
                                    ])
                                </div>
                                <div class="col-sm-6">
                                    @include('layout.input', [
                                        'type' => 'password',
                                        'class' => 'form-control form-control-user',
                                        'id' => 'password_confirmation',
                                        'name' => 'password_confirmation',
                                        'placeholder' => 'Repeat Password',
                                        'required' => '',
                                        'value' => '',
                                    ])

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                            <hr>
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
