@extends('Admin.Layout.master')
@section('title', 'User Details')
@section('content')
<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('user.index')}}">Users</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">User Details</li>
    </ol>
</div>
<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 row">
            <div class="col-md-6">
                <h6 class="font-weight-bold text-primary">All Details</h6>
            </div>

        </div>
        <div class="card-body text-white text-center" style="background: rgba(136, 134, 134, 0.603)">
            <div class="form-group row">
                <label class="control-label col-md-2">User Name :
                </label>
                <div class="col-md-6">
                    {{$user->username}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">User Role :
                </label>
                <div class="col-md-6">
                    {{$user->roles['name']}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">User Email :
                </label>
                <div class="col-md-6">
                    {{$user->email}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Status :
                </label>
                <div class="col-md-6">
                    @if($user->status==1)
                    <span class="btn btn-success">Active</span>
                    @else
                    <span class="btn btn-danger">Inactive</span>
                    @endif
                </div>
            </div>
            <hr>
        </div>
    </div>

</div>

@endsection
