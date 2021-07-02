@extends('Admin.Layout.master')
@section('title', 'Customer Details')
@section('content')
<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('customer.index')}}">Customers</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li class="active">Customer Details</li>
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
                <label class="control-label col-md-2">Customer Name :
                </label>
                <div class="col-md-6">
                    {{$customer->firstname}} {{$customer->lastname}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Customer Type :
                </label>
                <div class="col-md-6">
                    {{$customer->customer_type}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Customer Email :
                </label>
                <div class="col-md-6">
                    {{$customer->email}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Image :
                </label>
                <div class="col-md-6">
                    @if($customer->photo !=null)
                    <img height="auto" width="200px" src="{{asset('Uploads/Customer/Image/'.$customer->photo)}}">
                    @else
                    <i class="text-danger">Image Not-Uploaded</i>
                    @endif
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Contact Number:
                </label>
                <div class="col-md-6">
                    {{$customer->contact_number}}
                </div>
            </div>
            <hr>
        </div>
    </div>

</div>

@endsection
