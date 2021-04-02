@extends('Admin.Layout.master')
@section('title', 'Edit Leave')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('myLeaves')}}">Leaves</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Edit Leave</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->
    <form class="leave" method="post" action="{{route('leave.update',$leave->id)}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-12">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-2">Leave Type
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <select class="form-control  @error('leave_type') is-invalid @enderror" name="leave_type"
                                value="{{old('leave_type','')}}">
                                <option value="{{$leave->leave_type}}">{{$leave->leavetype['leavetype']}}</option>
                                <option class="bg-info" disabled>-----Select Leave Type-----
                                </option>
                                @foreach($leavetype as $type)
                                <option value="{{$type->id}}">{{$type->leavetype}}</option>
                                @endforeach
                            </select>
                            @error('leave_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Leave From
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6" data-date-format="yyyy-mm-dd">
                            <input type="date" name="from" required placeholder="Enter Leave Start Date"
                                id="exampleInputEmail" class="form-control @error('from') is-invalid @enderror"
                                value="{{old('from',$leave->from)}}" />
                            @error('from')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Upto
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6" data-date-format="yyyy-mm-dd">
                            <input type="date" name="to" required placeholder="Enter Leave End Date"
                                id="exampleInputEmail" class="form-control @error('to') is-invalid @enderror"
                                value="{{old('to',$leave->to)}}" />
                            @error('to')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Reason
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <textarea name="leave_reason" required placeholder="Enter Leave Reason"
                                id="exampleInputText" class="form-control   @error('leave_reason') is-invalid @enderror"
                                value="">{{old('leave_reason',$leave->leave_reason)}} </textarea>
                            @error('leave_reason')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- Applied By -->
                    <input type="hidden" class="form-control" value="0" required readonly name="applied_by" />
                    <!-- Employee_id -->
                    <input type="hidden" class="form-control" value="5" required readonly name="employee_id" />
                    <!-- Assigned date -->
                    <input type="hidden" class="form-control" value="{{$d}}" required readonly name="applied_on" />
                    <!-- status -->
                    <input type="hidden" class="form-control" value="Pending" required readonly name="status" />

                </div>
            </div>
        </div>
        <div class="form-actions p-3">
            <div class="row">
                <div class="offset-md-3 col-md-9">
                    <button type="submit" class="btn btn-success m-r-20">Update</button>
                    <a class="btn btn-secondary" href="{{route('myLeaves')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection
