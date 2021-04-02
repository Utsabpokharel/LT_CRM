@extends('Admin.Layout.master')
@section('title', 'Edit Customer')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('user.index')}}">Customers</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Edit Customer</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <form class="user" method="post" action="{{route('customer.update',$customer->id)}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-6">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-4">First Name
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" name="firstname" required placeholder="Enter First Name"
                                id="exampleInputEmail" class="form-control  @error('firstname') is-invalid @enderror"
                                value="{{old('firstname',$customer->firstname)}}" />
                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Last Name
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" name="lastname" required placeholder="Enter Last Name"
                                id="exampleInputEmail" class="form-control   @error('lastname') is-invalid @enderror"
                                value="{{old('lastname',$customer->lastname)}}" />
                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Email
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <input type="email" name="email" required placeholder="Enter Email Address"
                                id="exampleInputEmail" class="form-control   @error('email') is-invalid @enderror"
                                value="{{old('email',$customer->email)}}" />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-4">Gender
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <select class="form-control  @error('gender') is-invalid @enderror" name="gender"
                                value="{{old('gender', $customer->gender)}}">
                                <option value="" disabled>-----Select Gender-----</option>
                                <option value="Male" @if($customer->gender=='Male')selected @endif>Male</option>
                                <option value="Female" @if($customer->gender=='Female')selected @endif>Female</option>
                                <option value="Others" @if($customer->gender=='Others')selected @endif>Others</option>
                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="control-label col-md-4">Contact No.
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" name="contact_number" required placeholder="Enter Contact Number"
                                id="exampleInputEmail"
                                class="form-control   @error('contact_number') is-invalid @enderror"
                                value="{{old('contact_number',$customer->contact_number)}}" />
                            @error('contact_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-4">Customer Type
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <select class="form-control  @error('customer_type') is-invalid @enderror"
                                name="customer_type" value="{{old('customer_type',$customer->customer_type)}}">
                                <option value="" disabled>-----Select Customer Type-----</option>
                                <option value="Organization" @if($customer->customer_type=='Organization')selected
                                    @endif>Organization</option>
                                <option value="Individual" @if($customer->customer_type=='Individual')selected
                                    @endif>Individual</option>

                            </select>
                            @error('customer_type')
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
                    <button type="submit" class="btn btn-success m-r-20">Update</button>
                    <a class="btn btn-secondary" href="{{route('customer.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection