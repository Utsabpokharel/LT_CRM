@extends('Admin.Layout.master')
@section('title', 'Edit Employee')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('employee.index')}}">Employees</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li class="active">Edit Employee</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <form class="user" method="post" action="{{route('employee.update',$employee->id)}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-6">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-4">Employee ID
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" name="employee_id" required placeholder="Enter Employee ID"
                                id="exampleInputEmail" class="form-control  @error('employee_id') is-invalid @enderror"
                                value="{{old('employee_id',$employee->employee_id)}}" />
                            @error('employee_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">First Name
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" name="firstname" required placeholder="Enter First Name"
                                id="exampleInputEmail" class="form-control  @error('firstname') is-invalid @enderror"
                                value="{{old('firstname',$employee->firstname)}}" />
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
                                value="{{old('lastname',$employee->lastname)}}" />
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
                                value="{{old('email',$employee->email)}}" />
                            @error('email')
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
                                value="{{old('contact_number',$employee->contact_number)}}" />
                            @error('contact_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Image
                            <span class="required text-danger"> </span>
                        </label>
                        <div class="col-md-8">
                            @if($employee->photo !=null)
                            <img height="auto" width="200px"
                                src="{{asset('Uploads/Employee/Image/'.$employee->photo)}}">
                            @else
                            <i>Image Not Uploaded</i>
                            @endif<br>
                            <input type="file" name="photo" id="exampleInputEmail"
                                class="form-control  @error('photo') is-invalid @enderror"
                                value="{{old('photo',$employee->photo)}}" />
                            @error('photo')
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
                            <select class="form-control  @error('gender') is-invalid @enderror" name="gender">
                                <option value="" disabled>-----Select Gender-----</option>
                                <option value="Male" @if($employee->gender=='Male')selected @endif>Male</option>
                                <option value="Female" @if($employee->gender=='Female')selected @endif>Female</option>
                                <option value="Others" @if($employee->gender=='Others')selected @endif>Others</option>
                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="control-label col-md-4">Department
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <select class="form-control  @error('department') is-invalid @enderror" name="department"
                                value="{{old('department', $employee->department)}}">
                                <option value="{{$employee->department}}" selected>{{$employee->department}}</option>
                                <option class="bg-secondary" disabled>-----Select Department-----</option>
                                @foreach($department as $depart)
                                <option value="{{$depart->name }}">{{$depart->name}}</option>
                                @endforeach
                            </select>
                            @error('department')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Title
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <select class="form-control  @error('title') is-invalid @enderror" name="title">
                                <option value="{{$employee->title}}" selected>{{$employee->title}}</option>
                                <option class="bg-secondary" disabled>-----Select Title-----</option>
                                @foreach($title as $title)
                                <option value="{{$title->titlename }}">{{$title->titlename}}</option>
                                @endforeach

                            </select>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Level
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <select class="form-control  @error('level') is-invalid @enderror" name="level">
                                <option value="{{$employee->level}}" selected>{{$employee->level}}</option>
                                <option class="bg-secondary" disabled>-----Select Level-----</option>
                                @foreach($level as $level)
                                <option value="{{$level->levelname }}">{{$level->levelname}}</option>
                                @endforeach

                            </select>
                            @error('level')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">PAN No.
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" name="pan" required placeholder="Enter PAN Number" id="exampleInputEmail"
                                class="form-control   @error('pan') is-invalid @enderror"
                                value="{{old('pan',$employee->pan)}}" />
                            @error('pan')
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
                    <a class="btn btn-secondary" href="{{route('employee.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection
