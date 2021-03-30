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
                    <li class="active">Edit User</li>
                </ol>                               
            </div>   
             
        <div class="card-body p-0 border-0 shadow-lg">
            <!-- Nested Row within Card Body -->
             
            <form class="user" method="post" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data"> 
             {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT">
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
                                            <option value="{{$user->email}}"  selected>{{$user->email}}</option>
                                          <option class="bg-secondary" disabled>-----Select Email-----</option>
                                           @foreach($employee as $employees)
                                            <option value="{{$employees->email}}">{{$employees->email}}</option>
                                           @endforeach
                                            @foreach($customer as $customers)
                                            <option value="{{$customers->email}}">{{$customers->email}}</option>
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
                                            value="{{old('username',$user->username)}}" />
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
                                            <option value="{{$user->role}}"  selected>{{$user->roles['name']}}</option>
                                             <option class="bg-secondary" disabled>-----Select Role-----</option>
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
                                    <label class="control-label col-md-2">Status
                                        <span class="required text-danger"> * </span>
                                    </label>
                                    <div class="col-md-6">
                                        <select class="form-control  @error('status') is-invalid @enderror"
                                            name="status" value="{{old('status', $user->status)}}">
                                            <option value="1" @if($user->status=='1')selected @endif>Active</option>
                                            <option value="0" @if($user->status=='0')selected @endif>Inactive</option>
                                          
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
                                            <button type="submit" class="btn btn-success m-r-20">Update</button>
                                            <a class="btn btn-secondary" href="{{route('user.index')}}">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                </form>
            
        </div>
    
@endsection
