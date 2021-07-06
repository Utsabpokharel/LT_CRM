@extends('Admin.Layout.master')
@section('title', 'Employee Details')
@section('content')
<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('employee.index')}}">Employees</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li class="active">Employee Details</li>
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
                <label class="control-label col-md-2">Employee Name :
                </label>
                <div class="col-md-6">
                    {{$employee->firstname}} {{$employee->lastname}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Employee Id :
                </label>
                <div class="col-md-6">
                    {{$employee->staff_id}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Employee Email :
                </label>
                <div class="col-md-6">
                    {{$employee->email}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Image :
                </label>
                <div class="col-md-6">
                    @if($employee->photo !=null)
                    <img height="auto" width="200px" src="{{asset('Uploads/Employee/Image/'.$employee->photo)}}">
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
                    {{$employee->contact_number}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">PAN Number :
                </label>
                <div class="col-md-6">
                    {{$employee->pan}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Employee Department :
                </label>
                <div class="col-md-6">
                    {{$employee->department}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Employee Title :
                </label>
                <div class="col-md-6">
                    {{$employee->title}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Employee Level :
                </label>
                <div class="col-md-6">
                    {{$employee->level}}
                </div>
            </div>
            <hr>
        </div>
    </div>

</div>

@endsection
