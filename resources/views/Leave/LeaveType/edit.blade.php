@extends('Admin.Layout.master')
@section('title', 'Edit Leave Types')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('leaveType.index')}}">Leave Types</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li class="active">Edit Leave Type</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <form class="user" method="post" action="{{route('leaveType.update',$type->id)}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-12">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Leave Type
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="leavetype" required placeholder="Enter Leave Type"
                                id="exampleInputUser" class="form-control   @error('leavetype') is-invalid @enderror"
                                value="{{old('leavetype',$type->leavetype)}}" />
                            @error('leavetype')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Allocated Days
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="leavedays" required
                                placeholder="Enter Allocated Days For the Type " id="exampleInputUser"
                                class="form-control   @error('leavedays') is-invalid @enderror"
                                value="{{old('leavedays',$type->leavedays)}}" />
                            @error('leavedays')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Description
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <textarea type="password" name="description" required
                                placeholder="Enter Leave Type Description" id="exampleInputText"
                                class="form-control  @error('description') is-invalid @enderror">{{old('description',$type->description)}}</textarea>
                            @error('description')
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
                    <a class="btn btn-secondary" href="{{route('leaveType.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection