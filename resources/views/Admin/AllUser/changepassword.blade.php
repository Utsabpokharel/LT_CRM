@extends('Admin.Layout.master')
@section('title', 'Change Password')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('dashboard')}}">Settings</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Password</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <form class="user" method="post" action="{{route('password.update')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-12">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-2">Current Password
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="password" name="old_password" required placeholder="Enter Current Password"
                                id="exampleInputEmail"
                                class="form-control   @error('old_password') is-invalid @enderror"
                                value="{{old('old_password','')}}" />
                            @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">New Password
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="password" name="new_password" required placeholder="Enter New Password"
                                id="exampleInputEmail"
                                class="form-control   @error('new_password') is-invalid @enderror"
                                value="{{old('new_password','')}}" />
                            @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Confirm New Password
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="password" name="new_confirm_password" required
                                placeholder="Enter Confirm New Password" id="exampleInputEmail"
                                class="form-control   @error('new_confirm_password') is-invalid @enderror"
                                value="{{old('new_confirm_password','')}}" />
                            @error('new_confirm_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions p-3">
            <div class="row">
                <div class="offset-md-3 col-md-9">
                    <button type="submit" class="btn btn-success m-r-20">Submit</button>
                    <a class="btn btn-secondary" href="{{route('dashboard')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
