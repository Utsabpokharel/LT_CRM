@extends('Admin.Layout.master')
@section('title', 'Leaves Details')
@section('content')
<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('leave.index')}}">Leaves</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Leaves Details</li>
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
                <label class="control-label col-md-2">Applied By :
                </label>
                <div class="col-md-6">
                    <a href="{{ route('employee.show', $employee->id) }}">
                        {{$employee->firstname}}{{$employee->lastname}}</a>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Leave Reason :
                </label>
                <div class="col-md-6">
                    {{$leave->leave_reason}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Leave Date :
                </label>
                <div class="col-md-6">
                    {{$leave->from}} to {{$leave->to}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Leave Type :
                </label>
                <div class="col-md-6">
                    {{$leave->leavetype->leavetype}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Leave Applied On :
                </label>
                <div class="col-md-6">
                    {{$leave->applied_on}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Leave Status :
                </label>
                <div class="col-md-6">
                    {{$leave->status}}
                </div>
            </div>
            <hr>
            @if ($leave->checked_on != [])
            <div class="form-group row">
                <label class="control-label col-md-2">Checked On :
                </label>
                <div class="col-md-6">
                    {{$leave->checked_on}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Checked By :
                </label>
                <div class="col-md-6">
                    {{$leave->checked_by}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Admin Remarks :
                </label>
                <div class="col-md-6">
                    {{$leave->admin_remarks}}
                </div>
            </div>
            <hr>
            @endif
        </div>
    </div>

</div>

@endsection
