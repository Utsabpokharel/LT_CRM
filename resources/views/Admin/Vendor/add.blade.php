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
             
            <form class="user" method="post" action="{{route('user.store')}}" enctype="multipart/form-data"> 
             @csrf
            <div class="row">              
                <div class="col-md-12">
                    <div class="p-4">    
                    <div class="form-group row">
                                    <label class="control-label col-md-2">Email
                                        <span class="required text-danger"> * </span>
                                    </label>
                                    <div class="col-md-6">
                                        <select class="form-control  @error('email') is-invalid @enderror"
                                            name="email">
                                            <option value="" disabled selected>-----Select Email-----</option>
                                           @foreach($role as $roles)
                                            <option value="{{$roles->id}}">{{$roles->id}}</option>
                                           @endforeach
                                        </select>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>                                        
                            <div class="form-group row">
                                    <label class="control-label col-md-2">User Name
                                        <span class="required text-danger"> * </span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="username" required placeholder="Enter User Name" id="exampleInputEmail"
                                            class="form-control   @error('username') is-invalid @enderror"
                                            value="{{old('username','')}}" />
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                            </div>
                             <div class="form-group row">
                                    <label class="control-label col-md-2">User Role
                                        <span class="required text-danger"> * </span>
                                    </label>
                                    <div class="col-md-6">
                                        <select class="form-control  @error('role') is-invalid @enderror"
                                            name="role">
                                            <option value="" disabled selected>-----Select Role-----</option>
                                           @foreach($role as $roles)
                                            <option value="{{$roles->id}}">{{$roles->name}}</option>
                                           @endforeach
                                        </select>
                                        @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>                                                       
                        
                                         
                           <div class="form-group row">
                                    <label class="control-label col-md-2">Password
                                        <span class="required text-danger"> * </span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="password" name="password" required placeholder="Enter Password" id="exampleInputEmail"
                                            class="form-control  @error('password') is-invalid @enderror"
                                            value="{{old('password','')}}" />
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                            </div>         
                            <div class="form-group row">
                                    <label class="control-label col-md-2">Confirm Password
                                        <span class="required text-danger"> * </span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="password" name="confirm_password" required placeholder="Re-Enter Password" id="exampleInputEmail"
                                            class="form-control  @error('confirm_password') is-invalid @enderror"
                                            value="{{old('confirm_password','')}}" />
                                        @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                            </div>  
                             <div class="form-group row">
                                    <label class="control-label col-md-2">Status
                                        <span class="required text-danger"> * </span>
                                    </label>
                                    <div class="col-md-6">
                                        <select class="form-control  @error('status') is-invalid @enderror"
                                            name="status">
                                            <option value="1" selected>Active</option>                                          
                                            <option value="0">Inactive</option>
                                          
                                        </select>
                                        @error('status')
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
