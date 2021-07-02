@extends('layouts.app')
@section('content')
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-md-5 m-5">
            <div class="card o-hidden border-0 shadow-lg bg-transparent text-white">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Welcome Back !</h1>
                        </div>
                        <form class="user" method="post" action="{{route('login')}}">
                            @csrf
                            @if ($errors->any())
                            <div class="text-danger">
                                @foreach ($errors->all() as $error)
                                <h3>{{ $error }}</h3>
                                @endforeach
                            </div>
                            @endif
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                    required aria-describedby="emailHelp" placeholder="Enter Email Address..."
                                    name="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                                    required placeholder="Password" name="password">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label" for="customCheck">Remember
                                        Me</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-user btn-block">Login</button>
                            </div>
                            <hr>
                            <a href="#" class="btn btn-secondary btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Login with Google
                            </a>
                            <a href="#" class="btn btn-primary btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                            </a>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="#">Forgot Password ?</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>
@endsection
