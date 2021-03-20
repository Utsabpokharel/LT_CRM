@extends('Admin.Layout.master')
@section('content')

            <div class="page-title-breadcrumb pull-left">                
                <ol class="breadcrumb page-breadcrumb ">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('user.index')}}">Users</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Add User</li>
                </ol>                               
            </div>   
             
        <div class="card-body p-0 border-0 shadow-lg">
            <!-- Nested Row within Card Body -->
             
            <form class="user"> 
            <div class="row">              
                <div class="col-lg-6">
                    <div class="p-2">                               
                            <div class="form-group row">
                                    <label class="control-label col-md-3">User Name
                                        <span class="required text-danger"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" name="emp_id" required placeholder="Enter User Name" id="exampleInputEmail"
                                            class="form-control   @error('emp_id') is-invalid @enderror"
                                            value="{{old('emp_id','')}}" />
                                        @error('emp_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                            </div>
                             <div class="form-group row">
                                    <label class="control-label col-md-3">User Role
                                        <span class="required text-danger"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <select class="form-control  @error('role_id') is-invalid @enderror"
                                            name="role_id">
                                            <option value="" disabled selected>Select Role</option>
                                           
                                            <option value="">1111</option>
                                           
                                        </select>
                                        @error('role_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>                                                       
                        
                    </div>
                </div>                           
                <div class="col-lg-6">
                    <div class="p-2">                        
                           <div class="form-group row">
                                    <label class="control-label col-md-3">Password
                                        <span class="required text-danger"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" name="emp_id" required placeholder="Enter Password" id="exampleInputEmail"
                                            class="form-control  @error('emp_id') is-invalid @enderror"
                                            value="{{old('emp_id','')}}" />
                                        @error('emp_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                            </div>         
                            <div class="form-group row">
                                    <label class="control-label col-md-3">Confirm Password
                                        <span class="required text-danger"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" name="emp_id" required placeholder="Re-Enter Password" id="exampleInputEmail"
                                            class="form-control  @error('emp_id') is-invalid @enderror"
                                            value="{{old('emp_id','')}}" />
                                        @error('emp_id')
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
                                            <a class="btn btn-secondary" href="{{route('user.index')}}">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                </form>
            
        </div>
    
@endsection
