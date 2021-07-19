@extends('Admin.Layout.master')
@section('title', 'Edit Reassign')
@section('content')
<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('todo.index')}}">Tasks</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Edit Task</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <form class="user" method="post" action="{{route('updateReassign',$todo->id)}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-12">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Re-Assigned To
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <select
                                class="form-control title_id col-12 input-append @error('reAssignedTo') is-invalid @enderror"
                                required name="reAssignedTo[]">
                                <option selected>{{$todo->reAssignedTo}}</option>
                                <option class="bg-info" disabled>--Select Staffs--</option>
                                @if(isset($employee))
                                @foreach($employee as $employee_data)
                                {{-- {{dd($employee)}} --}}
                                <option value="{{$employee_data->id}}">{{$employee_data->firstname}}
                                    {{$employee_data->lastname}}</option>
                                @endforeach
                                @endif
                            </select>
                            @error('reAssignedTo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Deadline
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6" data-date-format="yyyy-mm-dd">
                            <input type="date" name="reDeadline" required placeholder="Enter Re-Deadline"
                                id="exampleInputEmail" class="form-control @error('reDeadline') is-invalid @enderror"
                                value="{{old('reDeadline',$todo->reDeadline)}}" />
                            @error('reDeadline')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Reason for Re-Assign
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <textarea name="reason" required placeholder="Enter Reason for Re-Assigning"
                                id="exampleInputText"
                                class="form-control  ckeditor @error('reason') is-invalid @enderror"> {{old('reason',$todo->reason)}}</textarea>
                            @error('reason')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- User Id -->
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" class="form-control" value="{{$d}}" required readonly name="reAssignedDate" />
        <input type="hidden" class="form-control" value="{{Auth::user()->id}}" required readonly name="ReUser_id" />
        <input type="hidden" class="form-control" value="{{Auth::user()->username}}" required readonly
            name="ReAssignedBy" />
        <div class="form-actions p-3">
            <div class="row">
                <div class="offset-md-3 col-md-9">
                    <button type="submit" class="btn btn-success m-r-20">Re-Assign</button>
                    <a class="btn btn-secondary" href="{{route('todo.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
